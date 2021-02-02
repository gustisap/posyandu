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
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js  "></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

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
<h1 style="margin-left:30%">Hasil Penentuan Status Gizi</h1>
<div class="card mt-5" style="width: 90%;margin-left:auto;margin-right:auto; border-radius:1.5rem">
<div class="container mt-3">
  <div class="row">
  <table id="table" class="table table-hover" style="margin-top: 2%;width:100%">
<thead>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Berat Badan</th>
    <th>Tinggi Badan</th>
    <th>Usia</th>
    <th>Status Gizi</th>
    <th>Status Gizi Baru</th>
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
    <?php  if($row->usia <= "12"){
    if($row->berat_badan >="3" && $row->berat_badan <= "5")
    echo"<td> NORMAL </td>";
    else
    echo"<td> BURUK </td>";
    }
if($row->usia > "12" && $row->usia <= "36" ){
        if($row->berat_badan >="5" && $row->berat_badan <= "10")
        echo"<td> NORMAL </td>";
        else
        echo"<td> BURUK </td>";
    }
    if($row->usia > "36" && $row->usia <= "60" ){
        if($row->berat_badan >="11" && $row->berat_badan <= "30")
        echo"<td> NORMAL </td>";
        else
        echo"<td> BURUK </td>";
    }
    ?>
  </tr>
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
  <td>{$row->sg9}</td>";
  if($row->usia <= "12"){
    if($row->berat_badan >="3" && $row->berat_badan <= "5")
    echo"<td> NORMAL </td>";
    else
    echo"<td> BURUK </td>";
    }
    if($row->usia > "12" && $row->usia <= "36" ){
        if($row->berat_badan >="5" && $row->berat_badan <= "10")
        echo"<td> NORMAL </td>";
        else
        echo"<td> BURUK </td>";
    }
    if($row->usia > "36" && $row->usia <= "60" ){
        if($row->berat_badan >="11" && $row->berat_badan <= "30")
        echo"<td> NORMAL </td>";
        else
        echo"<td> BURUK </td>";
    }
    ;
  echo"
</tr>
";
  }
  ?>
</div>
    @endforeach
</tbody>
</table>
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
    $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: { orthogonal: 'export' }
            }
        ]
    });
} );
</script>

</html>