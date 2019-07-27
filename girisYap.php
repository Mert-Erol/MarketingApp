	<?php 

	require_once("baglanti.php");

	if($_POST){
		
		session_start();

		$email = addslashes(strip_tags(trim($_POST['email'])));
		$sifre = addslashes(strip_tags(trim($_POST['sifre'])));

		$sorgu = "select k_id,k_isim,mail,k_sifre,yetki from kullanicilar where mail = '$email' && k_sifre = '$sifre'";

		$sonuc = $db->query($sorgu);

		if ($sonuc->num_rows > 0) {
			while($row = $sonuc->fetch_assoc()) {
        		if($row["yetki"] == 1){
        			echo "OK";
              $_SESSION['kullanici'] = $row['k_isim'];
              $_SESSION['k_id'] = $row['k_id'];
        			header("Refresh: 1; url=dashboard.php");
        		}
        		else{
        			echo "Başarılı giriş"."<br>";
					header("Refresh: 1; url=index.php");
					$_SESSION['kullanici'] = $row['k_isim'];
					$_SESSION['k_id'] = $row['k_id'];
        		}
				
			}
		}
		else{
			echo "Hatalı giriş";
			header("Refresh: 3; url=girisYap.php");
		}
	}


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style type="text/css">
  	.login{
  		width: 60%;
  		height: 50%;
  		margin-left: 20%;
  		margin-right: 20%;
  	}
  </style>

</head>
<body>

<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Ana Sayfa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Ana Sayfa
              <span class="sr-only">(current)</span>
            </a>
          </li>
              <?php
                if(!isset($_SESSION['kullanici'])){
              
                  echo '<li class="nav-item">
                        <a class="nav-link" href="girisYap.php">Giriş Yap</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="uyeOl.php">Üye Ol</a>
                        </li>';
                }
                else{
                    echo '<li class="nav-item">
                        <a class="nav-link" href="cikisYap.php">Çıkış Yap</a>
                        </li>';     
            }


          ?>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<div class="login">
 <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email adresi</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email adresinizi giriniz">
    <small id="emailHelp" class="form-text text-muted">Email bilgilerinizi başkalarıyla paylaşmayacağız.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifre</label>
    <input type="password" class="form-control" name="sifre" placeholder="Şifrenizi giriniz">
  </div>

  <button type="submit" class="btn btn-primary">Giriş</button>
</form>
</div>

</body>
</html>
