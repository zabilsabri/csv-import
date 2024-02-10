<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index() {
        $data = User::all();
        return view('welcome', compact('data'));
    }

    public function importUsers(Request $request) {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        // Retrieve the uploaded file
        $file = $request->file('csv_file');

        // Read the CSV file using League\Csv\Reader
        $reader = Reader::createFromPath($file->getPathname(), 'r');
        $reader->setHeaderOffset(0); // Assumes the first row contains the headers

        foreach ($reader as $row) {

            // Assuming the column names in the CSV are 'name' and 'email'
            $name = $row['name'];
            $email = ($row['email']);

            // Create or update user based on email
            User::updateOrCreate(['email' => $email], ['name' => $name]);
        }

        return redirect()->back();
    }
}
