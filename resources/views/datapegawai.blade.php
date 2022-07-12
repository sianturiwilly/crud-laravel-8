<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>CRUD LARAVEL 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>
            <div class="row">
              @if ($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                      {{ $message }}
                  </div>
              @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $row->id }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>{{ $row->notelepon }}</td>
                            <td>{{ $row->created_at->format('D M Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Hapus</button>
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>