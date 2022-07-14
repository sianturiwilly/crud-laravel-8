<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD LARAVEL 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success">Tambah +</a>

            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                  <form action="/pegawai" method="GET">
                      <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                  </form>    
                </div>
            </div>

            <div class="row">
            {{-- @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
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
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>
                              <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;">
                            </td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>{{ $row->notelepon }}</td>
                            <td>{{ $row->created_at->format('D M Y') }}</td>
                            <td>
                              <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                              <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                      
                    </tbody>
                  </table>
                  {{ $data->links() }}
            </div>
        </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Apakah kamu yakin?",
            text: "Kamu akan menghapus data pegawai nama "+nama+".",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/"+pegawaiid+""
                swal("Data berhasil dihapus.", {
                icon: "success",
                });
            } else {
                swal("Data tidak jadi dihapus.");
            }
        });
    });
</script>

<script>
  @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
  @endif
  </script>
</html>