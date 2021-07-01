<?php 
session_start();
// Create database connection using config file
include_once("db_connect.php");
$database = new database();

 
// ngambil data barang di left join sama jumlah
$resultown = mysqli_query($database->koneksi, "SELECT * FROM barang LEFT JOIN jumlah ON barang.kodebarang = jumlah.kodebarang;");
$resultusr = mysqli_query($database->koneksi, "SELECT * FROM barang LEFT JOIN jumlah ON barang.kodebarang = jumlah.kodebarang;");

if(isset($_POST['updsimpan']))
{
	$kodebar	=$_POST['kodebarang'];
	$newnambar	=$_POST['newnamabarang'];
	$persaw		=$_POST['persediaanawal'];
	$harpok		=$_POST['hargapokok'];
	$harjusa	=$_POST['hargajualsatuan'];
	if($database->homeupd($kodebar,$newnambar,$persaw,$harpok,$harjusa))
	{
	 header('location:home.php');	
	}
}

if(isset($_POST['newsimpan']))
{
	$kodebar	=$_POST['kodebarang'];
	$newnambar	=$_POST['newnamabarang'];
	$persaw		=$_POST['persediaanawal'];
	$harpok		=$_POST['hargapokok'];
	$harjusa	=$_POST['hargajualsatuan'];
	if($database->homenew($kodebar,$newnambar,$persaw,$harpok,$harjusa))
	{
	 header('location:home.php');	
	}		
}
if(isset($_POST['remsimpan']))
{
	$remnambar	=$_POST['remnamabarang'];
	if($database->homerem($remnambar))
	{
	 header('location:home.php');	
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
	  .tabelShow{
	  display: block; 
	  overflow: auto;
	  position:fixed;
	  margin: auto;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  }
	  .tabelHide{
	  display: none; 
	  overflow: auto;
	  position:fixed;
	  margin: auto;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  }
	  tr:nth-child(even){
		  background-color: #f2f2f2;
	  }
	  th{
	  background-color: 
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
  
  	  /* The Close & Save Button */
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a id="myBtnNEW" class="nav-link" href="#">New <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a id="myBtnREM" class="nav-link" href="#">Remove <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
	  <a id="stockflow" class="nav-link" href="stockflow.php">
	  <?php 
	  $lvO="Owner";
	  $lvA="Admin";
	  if($_SESSION['userlevel']== $lvO ||$_SESSION['userlevel']== $lvA)
	  {  
	  echo "Stock Flow"; 
	  }
	  ?>
	  <span class="sr-only">(stockflow.php)</span></a>
	  </li>
    </ul>
    

    <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a>

  </div>
</nav>

<main role="main" class="container">

  <div id="mainC" class="starter-template">
    <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
    <p class="lead"> </p>
	
	<br/><br/>
		<! div buat template tabel versi owner >
		<div id="tableOWN" class="tableShow">
			<!awal pembuatan tabel>
			<table width='100%' border=1>
 
			<tr>
			<th>Kode Barang</th><th>Nama Barang</th><th>Satuan</th><th>Harga Pokok</th><th>Harga Jual Satuan</th>
			<th>Persediaan Awal</th><th>Penjualan</th><th>Barang Masuk</th><th>Persediaan Gudang</th>
			<th>Persediaan Akhir</th><th>Laba</th>
			</tr>
			<!looping buat ngambil data dari hasil left join barang & jumlah>
			<?php  
			while($data = mysqli_fetch_array($resultown)) { 
				$rumuslaba=($data['penjualan']*$data['hargajualsatuan'])-($data['penjualan']*$data['hargapokok']);
				$rumusakhir=$data['persediaangudang']-$data['penjualan'];
				echo "<tr>";
				echo "<td>".$data['kodebarang']."</td>";
				echo "<td>".$data['namabarang']."</td>";
				echo "<td>".$data['satuan']."</td>";
				echo "<td>Rp. ".$data['hargapokok'].",- </td>";
				echo "<td>Rp. ".$data['hargajualsatuan'].",- </td>";
				echo "<td>".$data['persediaanawal']."</td>"; 
				echo "<td>".$data['penjualan']."</td>";
				echo "<td>".$data['barangmasuk']."</td>";
				echo "<td>".$data['persediaangudang']."</td>"; 
				echo "<td>".$rumusakhir."</td>";
				echo "<td>Rp. ".$rumuslaba.",-</td>";
				echo "</tr>";        
			}
			?>
			</table>
		</div>
		
	
  </div>

<!-- modal page New -->
<div id="myModalNEW" class="modal">
  <!-- Modal page New content -->
  <div class="modal-content">
    <div class="modal-header" align="left">
      <h2>New Stock</h2>
	  <button id="closeNEW" class="close">&times;</button>
    </div>
	<form class="form-signin" method="post" action="">
    <div class="modal-body">
	  <label for="kodebarang" class="sr-only">Kode Barang:</label>
	  <input type="text" id="kodebarang" class="form-control" placeholder="Kode Barang" name="kodebarang" required autofocus>
      <label for="namabarang" class="sr-only">Nama Barang:</label>
	  <input type="text" id="namabarang" class="form-control" placeholder="Nama Barang" name="newnamabarang" required autofocus>
	  <label for="persediaanawal" class="sr-only">Persediaan Awal:</label>
	  <input type="number" id="persediaanawal" class="form-control" placeholder="Persediaan Awal" name="persediaanawal" required autofocus>
	  <label for="hargapokok" class="sr-only">Harga Pokok:</label>
	  <input type="number" id="hargapokok" class="form-control" placeholder="Harga Pokok" name="hargapokok" required autofocus>
	  <label for="hargajualsatuan" class="sr-only">Harga Jual Satuan:</label>
	  <input type="number" id="hargapokok" class="form-control" placeholder="Harga Jual Satuan" name="hargajualsatuan" required autofocus>
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
      <h2>Remove Stock</h2>
	  <button id="closeREM" class="close">&times;</button>
    </div>
	<form class="form-signin" method="post" action="">
    <div class="modal-body">
	  <br><br><br>
	  <label for="namabarang" class="sr-only">Nama Barang:</label>
	  <input type="text" id="namabarang" class="form-control" placeholder="Nama Barang" name="remnamabarang" required autofocus>
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

// ngambil element main buat ngeblur
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
