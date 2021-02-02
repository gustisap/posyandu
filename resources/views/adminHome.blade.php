@extends('layouts.headeradmin')

@section('content')
<ul class="nav nav-tabs" style="width:100%">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="admin.home">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../posyandu01">Posyandu 01</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../posyandu09" >Posyandu 09</a>
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
<div  style="margin-bottom:1%; width:100%">
<a href="javascript:void(0)" class="btn btn-primary mb-2" style="width:100%" id="new-customer" data-toggle="modal" data-bs-target="#exampleModal">Add</a>
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
              <strong>Name:</strong>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email:</strong>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Password(hash):</strong>
              <input type="password" name="password" id="password" class="form-control" placeholder= "Password"  >
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Level(admin=1/user=0):</strong>
              <input type="text" name="is_admin" id="is_admin" class="form-control" placeholder="Level"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btn-save" class="btn btn-primary" >Submit</button>
            <a href="{{ route('admin.home') }}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<table id="table" class="table table-hover">
<thead>
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email Address</th>
    <th>Password</th>
    <th>Level</th>
    <th>Action</th>
  </tr>
</thead>
  <tbody>
    @foreach($admin as $row)
  <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->name}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->password}}</td>
    <?php
    if($row->is_admin == "1")
    echo"<td>Admin</td>";
    else
    echo"<td>User</td>";
    ?>
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
        <form name="custForm" action="{{ route('admin.home.store') }}" method="POST">
        <input type="hidden" name="cust_id" id="cust_id" >
        @csrf
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Name:</strong>
              <input type="text" name="name" id="name" class="form-control" placeholder="{{$row->name}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email:</strong>
              <input type="text" name="email" id="email" class="form-control" placeholder="{{$row->email}}" >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Password(hash):</strong>
              <input type="password" name="password" id="password" class="form-control" placeholder= "{{$row->password}}"  >
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Level(admin=1/user=0):</strong>
              <input type="text" name="is_admin" id="is_admin" class="form-control" placeholder="{{$row->is_admin}}"  >
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="btn-save" name="btn-save" class="btn btn-primary" >Submit</button>
            <a href="{{ route('admin.home') }}" class="btn btn-danger">Cancel</a>
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
$('#customerCrudModal').html("Add New User");
});

/* Edit customer */
$('body').on('click', '#edit-customer', function () {
  $('#crud-modal-edit').modal('show');
var id = $(this).data('id');
$('#customerCrudModal').html("Edit customer");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#id').val(data('id'));
$('#name').val(data.name);
$('#email').val(data.email);
$('#is_admin').val(data.is_admin);
});

/* Delete customer */
$('body').on('click', '#delete-customer', function () {
  var id = $(this).data('id');
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "http://127.0.0.1:8000/admin/home/"+id,
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
