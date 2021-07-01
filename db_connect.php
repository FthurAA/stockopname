<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "root";
	var $database = "stockopname";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if(mysqli_connect_errno())
		{
		echo "Failed to Connect to MYSQL: ".mysqli_connect_error();
		exit();
		}
	}


	function register($username,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('','$username','$password','$nama')");
		return $insert;
	}
	
	function login($user,$pass,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from pegawai where username='$user'");
		
		$data_user = $query->fetch_array();
		if($pass == $data_user['pass'])
		{

			if($remember)
			{
				setcookie('username', $user, time() + (60 * 60 * 24 * 5), '/');
				setcookie('namapegawai', $data_user['namapegawai'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $user;
			$_SESSION['nama'] = $data_user['namapegawai'];
			$_SESSION['userlevel'] = $data_user['userlevel'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}	
	}

	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from pegawai where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['namapegawai'];
		$_SESSION['is_login'] = TRUE;
	}
	
	function homenew($kodebar,$newnambar,$persaw,$harpok,$harjusa)
	{
		$insertbar = "INSERT INTO `barang`(`kodebarang`, `namabarang`, `satuan`, `hargapokok`, `hargajualsatuan`) 
					  VALUES('$kodebar','$newnambar','0','$harpok','$harjusa')";
		$insertjum = "INSERT INTO `jumlah`(`kodebarang`, `persediaanawal`, `penjualan`, `barangmasuk`, `persediaanakhir`, `persediaangudang`) 
					  VALUES('$kodebar','$persaw','0','0','0','0')";
		if(mysqli_query($this->koneksi,$insertbar))
		{
			if(mysqli_query($this->koneksi,$insertjum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}
	}
	
	function homeupd($kodebar,$newnambar,$persaw,$harpok,$harjusa)
	{
		$updatebar = "UPDATE `barang`
					  SET `namabarang`='$newnambar', `hargapokok`='$harpok', `hargajualsatuan`='$harjusa' 
					  WHERE `kodebarang`  =  '$kodebar' ";
		$updatejum = "UPDATE `jumlah`
					  SET  `persediaanawal`='$persaw' 
					  WHERE `kodebarang`  =  '$kodebar' ";
		if(mysqli_query($this->koneksi,$updatebar))
		{
			if(mysqli_query($this->koneksi,$updatejum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}
	}
	
	function homerem($remnambar)
	{
		$resrem=mysqli_query($this->koneksi,"SELECT * FROM `barang` WHERE `namabarang`='$remnambar'");
		$reskod=mysqli_fetch_array($resrem);
		$reskodend=$reskod['kodebarang'];
		$deletejum="DELETE FROM `jumlah` WHERE `kodebarang`='$reskodend'";
		$deletebar="DELETE FROM `barang` WHERE `namabarang`='$remnambar'";
		if(mysqli_query($this->koneksi,$deletebar))
		{
			if(mysqli_query($this->koneksi,$deletejum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}
	}
	function homeusrnew($kodebar,$newnambar,$persaw,$persgud)
	{
	    $insertusrbar = "INSERT INTO `barang`(`kodebarang`, `namabarang`, `satuan`, `hargapokok`, `hargajualsatuan`) 
					     VALUES('$kodebar','$newnambar','0','0','0')";
		$insertusrjum = "INSERT INTO `jumlah`(`kodebarang`, `persediaanawal`, `penjualan`, `barangmasuk`, `persediaanakhir`, `persediaangudang`) 
					     VALUES('$kodebar','$persaw','0','0','0','$persgud')";
		if(mysqli_query($this->koneksi,$insertusrbar))
		{
			if(mysqli_query($this->koneksi,$insertusrjum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}	
	}
	function homeusrupd($kodebar,$newnambar,$persaw,$persgud)
	{
	    $updusrbar = "UPDATE `barang`
						 SET  `namabarang`='$newnambar' 
					     WHERE `kodebarang`='$kodebar'";
		$updusrjum = "UPDATE `jumlah`
						 SET  `persediaanawal`='$persaw',`persediaangudang`='$persgud' 
					     WHERE `kodebarang`='$kodebar'";
		if(mysqli_query($this->koneksi,$updusrbar))
		{
			if(mysqli_query($this->koneksi,$updusrjum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}	
	}
	function homeusrrem($remnambar)
	{
		$usrresrem=mysqli_query($this->koneksi,"SELECT * FROM `barang` WHERE `namabarang`='$remnambar'");
		$usrreskod=mysqli_fetch_array($usrresrem);
		$usrreskodend=$usrreskod['kodebarang'];
		$deleteusrjum="DELETE FROM `jumlah` WHERE `kodebarang`='$usrreskodend'";
		$deleteusrbar="DELETE FROM `barang` WHERE `namabarang`='$remnambar'";
		if(mysqli_query($this->koneksi,$deleteusrbar))
		{
			if(mysqli_query($this->koneksi,$deleteusrjum))
			{
				return TRUE;
			}
			
		}
		else
		{
			echo "Error: ".mysqli_error($this->koneksi);
		}
	}
	
	function stockflowupd($hisno,$kodebar,$nambar,$satuan,$tanggal,$therad)
	{
	    $updSFhis = "UPDATE `history`
						SET `kodebarang`='$kodebar', `satuan`='$satuan', `tanggal`='$tanggal', `keterangan`='$therad' 
						WHERE `HistoryNO`= '$hisno' ";
		if(mysqli_query($this->koneksi,$updSFhis))
		{
		return TRUE;	
		}
		else
		{
		echo "Error: ".mysqli_error($this->koneksi);
		}	
	}
	function stockflownew($kodebar,$nambar,$satuan,$tanggal,$therad)
	{
		$SFupd=mysqli_query($this->koneksi,"SELECT * FROM `barang` WHERE `namabarang`='$nambar'");
		$SFupdres=mysqli_fetch_array($SFupd);
	    $insertSFhis = "INSERT INTO `history`(`kodebarang`, `satuan`, `tanggal`, `keterangan`) 
						 VALUES ('$kodebar','$satuan','$tanggal','$therad')";
		if(mysqli_query($this->koneksi,$insertSFhis))
		{
		return TRUE;	
		}
		else
		{
		echo "Error: ".mysqli_error($this->koneksi);
		}	
	}
	function stockflowrem($hisno)
	{
		$deleteSFhis="DELETE FROM `history` WHERE `HistoryNO`='$hisno'";
		if(mysqli_query($this->koneksi,$deleteSFhis))
		{
		return TRUE;	
		}
	}
} 
?>