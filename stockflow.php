<?php 
session_start();
// Create database connection using config file
include_once("db_connect.php");
$database = new database();
 
// ngambil data barang di left join sama jumlah
$result = mysqli_query($database->koneksi, "SELECT HistoryNO, history.kodebarang, barang.namabarang, history.satuan, tanggal, keterangan 
											FROM history LEFT JOIN barang ON history.kodebarang=barang.kodebarang");
if(isset($_POST['updsimpan']))
{
	$hisno=$_POST['historyno1'];
	$kodebar=$_POST['kodebarang'];
	$nambar=$_POST['namabarang'];
	$satuan=$_POST['satuan'];
	$tanggal=$_POST['tanggal'];
	$therad=$_POST['therad'];
	if($database->stockflowupd($hisno,$kodebar,$nambar,$satuan,$tanggal,$therad))
	{
	 header('location:stockflow.php');	
	}	
}

if(isset($_POST['newsimpan']))
{
	$kodebar=$_POST['kodebarang'];
	$nambar=$_POST['namabarang'];
	$satuan=$_POST['satuan'];
	$tanggal=$_POST['tanggal'];
	$therad=$_POST['therad'];
	if($database->stockflownew($kodebar,$nambar,$satuan,$tanggal,$therad))
	{
	 header('location:stockflow.php');	
	}	
}
if(isset($_POST['remsimpan']))
{
	$hisno=$_POST['historyno'];
	if($database->stockflowrem($hisno))
	{
	 header('location:stockflow.php');	
	}	
}											
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Anggraeni, Aulia, Fathurrahman">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>StockOpname ~AulRenThur</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  /* css style buat tabel*/
	  tr:nth-child(even){
		  background-color: #f2f2f2;
	  }
	  th{
	  background-color: 
	  }
	  /*css style buat radiobutton*/
	  .radbut{
	  float: left;
	  }
	  
	  
	  /* The Modal (background) page new & remove */
	  .modal {
	  display: none; /* Hidden by default */
	  position: sticky; /* Stay in place */
	  box-shadow: 0px 0px 25px grey;
	  z-index: 1; /* Sit on top */
	  bottom: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	  -webkit-animation-name: fadeIn; /* Fade in the background */
	  -webkit-animation-duration: 0.4s;
	  animation-name: fadeIn;
	  animation-duration: 0.4s
	  }

	  /* Modal Content page new & remove */
	  .modal-content {
	  position: sticky;
	  bottom: 0;
	  top: 0;
	  background-color: #fefefe;
	  width: 100%;
	  -webkit-animation-name: slideIn;
	  -webkit-animation-duration: 0.4s;
	  animation-name: slideIn;
	  animation-duration: 0.4s
	  }
  
  	  /* The Close Button */
  	  .close {
	  color: white;
	  float: right;
 	  font-size: 28px;
	  font-weight: bold;
	  }

	  .close:hover,
	  .close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	  }
	  
	  /* save button*/
	  .save {
	  color: white;
	  float: right;
 	  font-size: 28px;
	  font-weight: bold;
	  }
	  
	  .save:hover,
	  .save:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	  }
	  
	  .modal-header {
	  padding: 2px 16px;
	  background-color: #222222;
	  color: white;
	  }

	  .modal-body {padding: 2px 16px;}

	  .modal-footer {
	  padding: 2px 2px;
	  background-color: #222222;
	  color: white;
	  }

	  /* Add Animation */
	  @-webkit-keyframes slideIn {
	  from {bottom: -300px; opacity: 0} 
	  to {bottom: 0; opacity: 1}
	  }

	  @keyframes slideIn {
	  from {bottom: -300px; opacity: 0}
	  to {bottom: 0; opacity: 1}
	  }

	  @-webkit-keyframes fadeIn {
	  from {opacity: 0} 
	  to {opacity: 1}
	  }

	  @keyframes fadeIn {
	  from {opacity: 0} 
	  to {opacity: 1}
	  }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
	
  </head>
  
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">WB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a id="rumah" class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a id="myBtnNEW" class="nav-link" href="#">New <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a id="myBtnREM" class="nav-link" href="#">Remove <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a id="stockflow" class="nav-link" href="#">Stock Flow <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    

    <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a>

  </div>
</nav>

<main role="main" class="container">

  <div id="mainC" class="starter-template">
    <h1>Selamat Datang Ke Stock Flow <?php //echo $_SESSION['nama']; ?></h1>
    <p class="lead"> </p>
	
	<br/><br/>
			
		
			<!awal pembuatan tabel>
			<table width='80%' border=1>
 
			<tr>
			<th>No</th><th>Kode Barang</th> <th>Nama Barang</th> <th>Satuan</th> <th>Keterangan</th>
			</tr>
			<!looping buat ngambil data dari hasil left join barang & jumlah>
			<?php  
			while($data = mysqli_fetch_array($result)) {         
				echo "<tr>";
				echo "<td>".$data['HistoryNO']."</td>";
				echo "<td>".$data['kodebarang']."</td>";
				echo "<td>".$data['namabarang']."</td>";
				echo "<td>".$data['satuan']."</td>"; 
				echo "<td>".$data['keterangan']."</td>"; 		
				echo "</tr>";        
			}
			?>
			</table>
		
	
  </div>

<!-- modal page New -->
<div id="myModalNEW" class="modal">
  <!-- Modal page New content -->
  <div class="modal-content">
    <div class="modal-header" align="left">
      <h2>New Stock Flow</h2>
	  <button id="closeNEW" class="close">&times;</button>
    </div>
	
	<form class="form-signin" method="post" action="">
    <div class="modal-body">
	  <label for="historyno1" class="sr-only">No:</label>
	  <input type="text" id="historyno1" class="form-control" placeholder="Nomor Transaksi" name="historyno1" required autofocus>
	  <label for="kodebarang" class="sr-only">Kode Barang:</label>
	  <input type="text" id="kodebarang" class="form-control" placeholder="Kode Barang" name="kodebarang" required autofocus>
      <label for="namabarang" class="sr-only">Nama Barang:</label>
	  <input type="text" id="namabarang" class="form-control" placeholder="Nama Barang" name="namabarang" required autofocus>
	  <label for="satuan" class="sr-only">Satuan:</label>
	  <input type="text" id="satuan" class="form-control" placeholder="satuan" name="satuan" required autofocus>
	  <label for="tanggal" class="sr-only">Tanggal:</label>
	  <input type="date" id="tanggal" class="form-control" name="tanggal" required autofocus>
	  <p>keterangan:</p>
	  <input type="radio" id="masuk" class="radbut" name="therad" value="masuk">
	  <label for="masuk"> Masuk </label><br>
	  <input type="radio" id="keluar" class="radbut" name="therad" value="keluar">
	  <label for="keluar"> Keluar </label><br>
	  <input type="radio" id="return" class="radbut" name="therad" value="return">
	  <label for="return"> Return </label><br>
	  <input type="radio" id="rusak" class="radbut" name="therad" value="rusak">
	  <label for="rusak"> Rusak </label><br>
    </div>
    <div class="modal-footer" align="left">
	  <button class="close" type="submit" name="updsimpan">Update</button>
	  <button class="close" type="submit" name="#">/</button>
	  <button class="close" type="submit" name="newsimpan">New</button>
    </div>
	</form>
  </div>
</div>

<!-- modal page Remove -->
<div id="myModalREM" class="modal">
  <!-- Modal page Remove content -->
  <div class="modal-content">
    <div class="modal-header" align="left">
      <h2>Remove Stock Flow</h2>
	  <button id="closeREM" class="close">&times;</button>
    </div>
	<form class="form-signin" method="post" action="">
    <div class="modal-body">
	  <br><br><br>
	  <label for="historyno" class="sr-only">No:</label>
	  <input type="text" id="historyno" class="form-control" placeholder="Nomor Transaksi" name="historyno" required autofocus>
	  <br><br><br>
    </div>
    <div class="modal-footer" align="left">
	  <button class="close" type="submit" name="remsimpan">Simpan</button>
    </div>
	</form>
  </div>
</div>

<script>
// ngambil Modal page New
var modalNEW = document.getElementById("myModalNEW");

// ngambil button page New
var btnNEW = document.getElementById("myBtnNEW");

// ngambil Modal page Remove
var modalREM = document.getElementById("myModalREM");

// ngambil button page Remove
var btnREM = document.getElementById("myBtnREM");

// ngambil element main buat ngeblurin background
var greyscale = document.getElementById("mainC");

// ngambil button buat ngeclose New / Remove
var btnCREM = document.getElementById("closeREM");
var btnCNEW = document.getElementById("closeNEW");

// buat nampilin jendela New / Remove ketika ngeklik 
btnNEW.onclick = function() {
  modalNEW.style.display = "block";
  modalREM.style.display = "none";
  greyscale.style.filter = "blur(4px)";
}
btnREM.onclick = function() {
  modalREM.style.display = "block";
  modalNEW.style.display = "none";
  greyscale.style.filter = "blur(4px)";
}
// buat ngeclose jendela New / Remove
btnCNEW.onclick = function() {
	modalNEW.style.display = "none";
	greyscale.style.filter = "blur(0px)";
	}
btnCREM.onclick = function() {
	modalREM.style.display = "none";
	greyscale.style.filter = "blur(0px)";
	}  




</script>
</main><!-- /.container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
