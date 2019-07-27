<?php 

	require_once("baglanti.php");

	if($_POST){

		$ad = addslashes(strip_tags(trim($_POST['ad'])));
		$soyad = addslashes(strip_tags(trim($_POST['soyad'])));
		$sifre = addslashes(strip_tags(trim($_POST['sifre'])));
		$sifreTekrar = addslashes(strip_tags(trim($_POST['sifreTekrar'])));
		$dogumTarihi = addslashes(strip_tags(trim($_POST['dogumTarihi'])));
		$adresIl = addslashes(strip_tags(trim($_POST['adresIl'])));
		$adresUlke = addslashes(strip_tags(trim($_POST['adresUlke'])));
		$meslek = addslashes(strip_tags(trim($_POST['meslek'])));
		$egitimDurumu = addslashes(strip_tags(trim($_POST['egitimDurumu'])));
		$cinsiyet = addslashes(strip_tags(trim($_POST['cinsiyet'])));
		$email = addslashes(strip_tags(trim($_POST['email'])));

		//echo $ad ."<br>".$soyad ."<br>".$dogumTarihi ."<br>".$adresIl ."<br>".$adresUlke ."<br>".$meslek ."<br>".$egitimDurumu ."<br>".$cinsiyet ."<br>";


		if($sifre == $sifreTekrar){
			$kaydet = mysqli_query($db,"Insert into kullanicilar (k_isim,k_soyisim,k_dogum_tarihi,k_adres_il,k_adres_ulke,k_meslek,k_egitim_durumu,k_cinsiyet,k_sifre,mail) values ('$ad','$soyad','$dogumTarihi','$adresIl','$adresUlke','$meslek','$egitimDurumu','$cinsiyet','$sifre','$email')");

			if($kaydet){
				echo "Kayıt başarılı";
				header("Refresh: 3; url=index.php");
			}
		}
		else{
			echo "Girdiğiniz şifreler aynı olmalı...";
			header("Refresh: 3; url=index.php");
		}
		
	}

?>


	<!DOCTYPE html>
<html>
<head>
	
	<!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<style>

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

.signUp{
	width: 50%;
	margin-left: 25%;
	margin-right: 25%;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

	<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="height: 55px;">
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
              require_once("baglanti.php");

              session_start();

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

<div class="signUp">
<form action="" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Kayıt Ol</h1>
    <p>Kayıt olmak için lütfen ilgili alanları doldurunuz.</p>
    <hr>

    <label for="ad"><b>İsim</b></label>
    <input type="text" placeholder="İsminiz" id="ad" name="ad" required>

    <label for="soyad"><b>Soyisim</b></label>
    <input type="text" placeholder="Soyisminiz" id="soyad" name="soyad" required>

    <label for="sifre"><b>Şifre</b></label>
    <input type="password" placeholder="Şifreyi giriniz" id="sifre" name="sifre" required>

    <label for="sifreTekrar"><b>Şifre Tekrar</b></label>
    <input type="password" placeholder="Şifreyi tekrar giriniz" id="sifreTekrar" name="sifreTekrar" required>
    
    <label for="dogumTarihi"><b>Doğum Tarihi</b></label>
    <input type="date" id="dogumTarihi" name="dogumTarihi" required><br>

    <label for="adresIl"><b>Adres(İl)</b></label>
    <input type="text" placeholder="Yaşadığınız Şehir" id="adresIl" name="adresIl" required>

    <label for="adresUlke"><b>Adres(Ülke)</b></label>
    <input type="text" placeholder="Yaşadığınız Ülke" id="adresUlke" name="adresUlke" required>

    <label for="meslek"><b>Meslek</b></label>
    <input type="text" placeholder="Mesleğiniz" id="meslek" name="meslek" required>

    <label for="egitimDurumu"><b>Eğitim Durumu</b></label>
    			<select name="egitimDurumu" id="egitimDurumu">
  					<option value="Lise">Lise</option>
  					<option value="Üniversite">Üniversite</option>
  					<option value="Yüksek Lisans">Yüksek Lisans</option>
				</select><br>

    <label for="cinsiyet"><b>Cinsiyet</b></label>
    		<select name="cinsiyet" id="cinsiyet" required>
  					<option value="K">Kadın</option>
  					<option value="E">Erkek</option>
			</select><br>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="E-Mail adresiniz" id="email" name="email" required>
    
    <div class="clearfix">
      <button type="reset" class="cancelbtn">İptal</button>
      <button type="submit" class="signupbtn">Kayıt Ol</button>
    </div>
  </div>
</form>
</div>

</body>
</html>