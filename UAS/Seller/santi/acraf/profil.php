<?php 

	require 'koneksi.php';
	if ($_SESSION) {
		$id_user = $_SESSION["id_user"];
	}
	else {
		header("Location: login.php");
	}

    //SIMPAN DATA
    if(isset($_POST['submit'])){

        $depan=$_POST['nama_depan'];
        $belakang=$_POST['nama_belakang'];
        $ussr=$_POST['username'];
        $hp=$_POST['handphone'];
        $lahir=$_POST['tgl_lahir'];
        $alamat=$_POST['alamat_user'];
        $prov=$_POST['provinsi'];
        $pos=$_POST['kode_pos'];
        $kota=$_POST['id_kota'];
        $passwords = $_POST['passwords'];
        $password = $_POST['password'];
        $password_baru = $_POST['password_baru'];
        $conpassword_baru = $_POST['conpassword_baru'];
      
        //cek konfirmasi password lama
        if ($passwords !== $password){
            echo "<script>
            alert('Password lama anda tidak sesuai');
            </script>";
            return false;
        } 

        //cek konfirmasi password baru
        if ($password_baru !== $conpassword_baru){
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
            </script>";
            return false;
        } 

        mysqli_query($koneksi, "UPDATE users SET nama_depan ='$depan', nama_belakang='$belakang', handphone='$hp', tgl_lahir ='$lahir',alamat_user='$alamat',provinsi='$prov',kode_pos='$pos',passwords='$password_baru', id_kota='$kota'  WHERE username='$ussr';");

    }


    //AMBIL DATA USER
	$id_user = $_SESSION["id_user"];
	$data= $koneksi->query("SELECT * FROM users WHERE id_user = '$id_user'");
	$row= $data->fetch_assoc();

    $nama_depan=$row['nama_depan'];
	$nama_belakang=$row['nama_belakang'];
	$username=$row['username'];
	$email=$row['email'];
	$handphone=$row['handphone'];
	$tgl_lahir=$row['tgl_lahir'];
	$alamat_user=$row['alamat_user'];
	$provinsi=$row['provinsi'];
	$kode_pos=$row['kode_pos'];
    $passwords=$row['passwords'];
	$id_kota=$row['id_kota'];

    //AMBIL DATA KOTA
	$data_kota= $koneksi->query("SELECT nama_kota FROM kota WHERE id_kota = '$id_kota'");
	$detail_kota= $data_kota->fetch_assoc();
	$nama_kota=$detail_kota['nama_kota'];

	// if(isset($_POST["submit"])){
 //    	if(simpan($_POST) > 0){
 //    		echo "<script> 
 //              alert ('Profil berhasil disimpan!');
 //              </script>";
 //    	}else{
 //    		echo mysqli_error($koneksi);
 //    	}
 //    }

    
 ?> 

<!DOCTYPE html>
<html>
<head>
    <title>Acraf | Art and Handcraf</title>
    <!-- meta tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="3600">
    <meta name="keywords" content="Art and Handcraf">
    <meta name="description" content="Platform penjualan barang seni dan kerajinan tangan">
    <meta name="author" content="Tim Acraf">
    <!-- link css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/fe118aecdc.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbarResponsive" class="bg-light">

    <!-- navbar -->
    <div id="navbar-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="informasi-toko.html"><img src="img/logos.png" alt=""></a>
            <h4 class="mr-2 mt-1 text-white">Seller</h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- start right nav -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> Profil</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="profil.html">My Acount</a>
                            <a class="dropdown-item" href="informasi-toko.html">My Store</a>
                            <a class="dropdown-item" href="../index.html">Back to ACRAFT</a>
                            <a class="dropdown-item" href="../login.html">Log Out</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Pesanan 1</a>
                        <a class="dropdown-item" href="#">Pesanan 2</a>
                        <a class="dropdown-item" href="#">Pesanan 3</a>
                        <a class="dropdown-item" href="#">Pesanan 3</a>
                        </div>
                    </li>
                    <li>
                    <form class="form-inline">
                    <div id="top-search">
                        <input class="form-control mr-sm-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0 rounded-pill" type="submit">Search</button>
                    </div>
                    </form>
                </li>
                </ul>
                <!-- end right nav -->
            </div>
        </nav>
    </div>
    <!--end navbar -->

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-white font-weight-bold" style="background-color: #780116;"><i class="fas fa-list mr-2"></i> MENU</li>
            <a href="informasi-toko.html" class="list-group-item list-group-item-action"><i class="fas fa-store mr-2"></i> Informasi Toko</a>
            <a href="etalase.html" class="list-group-item list-group-item-action"><i class="fas fa-boxes mr-2"></i> Etalase</a>
            <a href="pesanan-baru.html" class="list-group-item list-group-item-action"><i class="fas fa-shopping-cart mr-2"></i> Pesanan</a>
        </ul>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-white font-weight-bold" style="background-color: #780116;"><i class="fas fa-list mr-2"></i> KATEGORI</li>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-palette mr-2"></i> Paint</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-couch mr-2"></i> Furniture</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-shapes mr-2"></i> Handcraft</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-gift mr-2"></i> Souvenir</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fab fa-atlassian mr-2"></i> Statue</a>
        </ul>
    </div>
    <!-- end seidebar -->

    <!-- content -->
    <div class="main">

        <!-- Navbar Informasi Toko -->
        <div id="sub-nav">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <h4 class="color-palette1"><i class="fas fa-user-circle"></i> MY ACCOUNT</h4>
            </nav>
        </div>

        <form action="" method="POST">
            <div class="form-group mt-4">
              <div class="form-row">
                <div class="col">
                    <label> Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" value="<?php echo($nama_depan) ?>">
                </div>
                <div class="col">
                    <label> Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" value="<?php echo($nama_belakang) ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
                <label> Username</label>
                <input type="text" name="username" class="form-control" style="background-color:rgb(255, 255, 255);" value="<?php echo($username) ?>" readonly>
            </div>


            <div class="form-group">
                <label> Email</label>
                <input type="email" name="email" class="form-control" style="background-color:rgb(255, 255, 255);" value="<?php echo($email) ?>" readonly>
            </div>

            <div class="form-group">
                <label> Handphone</label>
                <input type="text" class="form-control"  name="handphone" value="<?php echo($handphone) ?>">
            </div>

            
            <div class="form-group">
              <label for="tgl_lahir"> Tanggal Lahir </label>
              <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo($tgl_lahir) ?>">
            </div>


            <div class="form-group">
                <label for="Alamat"> Alamat</label>
                <input type="text" name="alamat_user" class="form-control" value="<?php echo($alamat_user) ?>">
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label> Kota</label>
                    <?php 
	                  $sql_kota= mysqli_query($koneksi, "SELECT * FROM kota");
	               	?>
	               <select class="form-control" name="id_kota">
	               	   <option value=" <?= $id_kota; ?>"> <?= $nama_kota; ?></option>
                               <?php  while ($row_kota = mysqli_fetch_array($sql_kota)) {  ?>
                                    <option value="<?= $row_kota['id_kota']; ?>"> <?php echo $row_kota['nama_kota']; ?></option>
                               <?php } ?>
	                </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label> Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="<?php echo($provinsi)?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label> Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control" value="<?php echo($kode_pos) ?>" required>
                </div>
              </div>
            </div>
            
            <div class="form-group">
                <input type="hidden" name="passwords" value="<?= $passwords; ?>">
                <label for="password-sekarang"> Password Saat Ini </label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                    <label> Password Baru </label>
                    <input type="password" name="password_baru" class="form-control">
                </div>
                <div class="col">
                    <label> Konfirmasi Password Baru</label>
                    <input type="password" name="conpassword_baru" class="form-control">
                </div>
              </div>
            </div>

            <div class="form-group mt-5" >
                <button class="btn btn-success btn-sm my-2 my-lg-0 ml-auto" type="submit" name="submit" >SIMPAN</button>
                <a href="profil.php" class="btn btn-danger btn-sm ml-2">BATAL</a>
            </div>
      </form>

    </div>

    <br>
</body>
    <!-- javacript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
</html>