<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<form action="{{ route('import-users') }}" method="POST" class="m-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="formFile" class="form-label">Input CSV File Here</label>
      <input name="csv_file" class="form-control" type="file" id="formFile">
    </div>
    <button class="btn btn-primary" type="submit">Import Users</button>
    <a href="{{ asset('template/template-csv.csv') }}">Klik Disini Untuk Mendownload Template CSV</a>
  </form>
  

<table class="table m-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $index => $user)
    <tr>
      <th scope="row">{{ $index += 1 }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>