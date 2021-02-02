<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


    <title>Posyandu</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><b>POSYANDU</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halamaninput">Data Balita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=halamanhasil>Hasil Status Gizi</a>
        </li>
        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>      </ul>
    </div>
  </div>
  </nav>
  <h1 style="margin-left:35%">Data Balita POSYANDU</h1>
  <div class="card mt-3" style="width: 90%;margin-left:auto;margin-right:auto; border-radius:1.5rem">
<div class="container">
  <div class="row">
  <table id="table" class="table table-hover" style="margin-top: 2%;width:100%">
<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-2"  id="new-customer" data-toggle="modal" data-bs-target="#exampleModal">Add</a>
                <!-- Modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
      </div>
      <div class="modal-body">
        <form name="custForm" action="{{ route('admin.home.store') }}" method="POST">
        <input type="hidden" name="cust_id" id="cust_id" >
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Nama:</strong>
              <input type="text" name="name" id="name" class="form-control" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Jenis Kelamin:</strong>
              <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Berat Badan (Kg):</strong>
              <input type="numeric" name="berat_badan" id="berat_badan" class="form-control">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Tinggi Badan (Cm):</strong>
              <input type="numeric" name="tinggi_badan" id="tinggi_badan" class="form-control">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Usia (Bulan):</strong>
              <input type="numeric" name="usia" id="usia" class="form-control" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Status Gizi:</strong>
              <input type="text" name="status_gizi" id="status_gizi" class="form-control">
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btn-save" class="btn btn-primary" >Submit</button>
            <a href="{{ route('halamaninput') }}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<thead>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Berat Badan</th>
    <th>Tinggi Badan</th>
    <th>Usia</th>
    <th>Status Gizi</th>
    <th>Action</th>
  </tr>
</thead>
  <tbody>
    @foreach($pos as $row)
  <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->nama}}</td>
    <td>{{$row->jenis_kelamin}}</td>
    <td>{{$row->berat_badan}}</td>
    <td>{{$row->tinggi_badan}}</td>
    <td>{{$row->usia}}</td>
    <td>{{$row->status_gizi}}</td>
    <td>
    <form action="{{ route('admin.home.destroy',$row->id) }}" method="POST">
    <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $row->id }}">Edit </a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php
    if($row->is_admin == "1")
    echo" ";
    else
    echo"<a id='delete-customer' data-id='$row->id' class='btn btn-danger delete-user'>Delete</a></td>";
    ?>
    </form>
    </td>
  </tr>
  
  <div class="modal fade" id="crud-modal-edit" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
      </div>
      <div class="modal-body">
        <form name="custForm" action="{{ route('halamaninput.store') }}" method="POST">
        <input type="hidden" name="id" id="id" >
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Nama:</strong>
              <input type="text" name="nama" id="nama" class="form-control" value="{{$row->nama}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Jenis Kelamin:</strong>
              <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{$row->jenis_kelamin}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Berat Badan (Kg):</strong>
              <input type="numeric" name="berat_badan" id="berat_badan" class="form-control" value= "{{$row->berat_badan}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Tinggi Badan (Cm):</strong>
              <input type="numeric" name="tinggi_badan" id="tinggi_badan" class="form-control" value= "{{$row->tinggi_badan}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Usia (Bulan):</strong>
              <input type="numeric" name="usia" id="usia" class="form-control" value= "{{$row->usia}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Status Gizi:</strong>
              <input type="text" name="status_gizi" id="status_gizi" class="form-control" value="{{$row->status_gizi}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btn-save" class="btn btn-primary" >Submit</button>
            <a href="{{ route('halamaninput') }}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
  @foreach($pos as $row)
  <?php
  if($row->id9 <= 50){
    $a=100+$row->id9;
  echo"<tr>
  <td>$a</td>
  <td>{$row->nama9}</td>
  <td>{$row->jk9}</td>
  <td>{$row->bb9}</td>
  <td>{$row->tb9}</td>
  <td>{$row->usia9}</td>
  <td>{$row->sg9}</td>
  <td>
  <form action='{{ route('admin.home.destroy',$row->id) }}' method='POST'>
  <a href='javascript:void(0)' class='btn btn-success' id='edit-customer' data-toggle='modal' data-id='{{ $row->id }}'>Edit </a>
  <meta name='csrf-token' content='{{ csrf_token() }}'>";
  
  if($row->is_admin == "1")
  echo" ";
  else{
  echo"<a id='delete-customer' data-id='$row->id' class='btn btn-danger delete-user'>Delete</a></td>";
  };
  echo"
  </form>
  </td>
</tr>
";
  }
  else
  echo" ";
  ?>
</div>
    @endforeach
</tbody>
</table>
<a class="btn btn-success mb-3" href="halamanhasil">Olah Data</a>
  </div>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
$(document).ready( function () {
    $('#table').DataTable();
} );
</script>
<script>
  $(document).ready(function () {

  /* When click New customer button */
  $('#new-customer').click(function () {
  $('#crud-modal').modal('show');
  $('#btn-save').val("create-customer");
  $('#customer').trigger("reset");
  $('#customerCrudModal').html("Tambah Data Balita");
  });

  /* Edit customer */
  $('body').on('click', '#edit-customer', function () {
  $('#crud-modal-edit').modal('show');
  var id = $(this).data('id');
  $('#customerCrudModal').html("Edit Data Balita");
  $('#btn-update').val("Update");
  $('#btn-save').prop('disabled',false);
  $('#id').val(data('id'));
  $('#nama').val(data.nama);
  $('#jenis_kelamin').val(data.jenis_kelamin);
  $('#berat_badan').val(data.berat_badan);
  $('#tinggi_badan').val(data.tinggi_badan);
  $('#usia').val(data.usia);
  $('#status_gizi').val(data.status_gizi);
  });

/* Delete customer */
  $('body').on('click', '#delete-customer', function () {
  var id = $(this).data('id');
  var token = $("meta[name='csrf-token']").attr("content");
  confirm("Are You sure want to delete !");

  $.ajax({
  type: "DELETE",
  url: "http://127.0.0.1:8000/halamaninput"+id,
  data: {
  "id": id,
  "_token": token,
  },
  success: function (data) {
  $('#msg').html('Customer entry deleted successfully');
  $("#id_" + id).remove();
  },
  error: function (data) {
  console.log('Error:', data);
  }
  });
  });
  });

</script>

</html>