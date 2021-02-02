@extends('layouts.headeradmin')

@section('content')
<ul class="nav nav-tabs" style="width:100%">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="admin/home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="posyandu01">Posyandu 01</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="posyandu09" >Posyandu 09</a>
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
                            </li>
</ul>

<!-- js&css datatables-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

<div class="main" style="margin-top:2%">
<div  style="margin-bottom:1%;">
</div>
<table id="table" class="table table-hover" style="margin-top: 2%;width:100%">
<a href="javascript:void(0)" class="btn btn-primary mb-2"  id="new-customer" data-toggle="modal" data-bs-target="#exampleModal">Add</a>
                <!-- Modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
      </div>
      <div class="modal-body">
        <form name="custForm" action="{{ route('posyandu09.store') }}" method="POST">
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
            <a href="posyandu01" class="btn btn-danger">Cancel</a>
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
        <form name="custForm" action="{{ route('posyandu01.store') }}" method="POST">
        <input type="hidden" name="cust_id" id="cust_id" >
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Nama:</strong>
              <input type="text" name="name" id="name" class="form-control" placeholder="{{$row->nama}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Jenis Kelamin:</strong>
              <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="{{$row->jenis_kelamin}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Berat Badan (Kg):</strong>
              <input type="numeric" name="berat_badan" id="berat_badan" class="form-control" placeholder= "{{$row->berat_badan}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Tinggi Badan (Cm):</strong>
              <input type="numeric" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder= "{{$row->tinggi_badan}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Usia (Bulan):</strong>
              <input type="numeric" name="usia" id="usia" class="form-control" placeholder= "{{$row->usia}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Status Gizi:</strong>
              <input type="text" name="status_gizi" id="status_gizi" class="form-control" placeholder="{{$row->status_gizi}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btn-save" class="btn btn-primary" >Submit</button>
            <a href="posyandu01" class="btn btn-danger">Cancel</a>
          </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
    @endforeach
</tbody>
</table>


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
  url: "http://127.0.0.1:8000/posyandu01"+id,
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

  @endsection