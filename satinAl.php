<?php 

	require_once("baglanti.php");

	$urun_id = $_GET['urun_id'];
	$k_id = $_GET['k_id'];
	$kategori = $_GET['kategori']; 
	$u_adi = $_GET['u_adi'];

	$sorgu = "select * from kullanicilar where k_id = '$k_id'";

		$sonuc = $db->query($sorgu);

		if ($sonuc->num_rows > 0) {
			while($row = $sonuc->fetch_assoc()) {
				$adress_Il = $row['k_adres_il'];
				$adress_ulke = $row['k_adres_ulke'];
				$meslek = $row['k_meslek'];
				$egitim = $row['k_egitim_durumu'];
				$cinsiyet = $row['k_cinsiyet'];
				$dogum = $row['k_dogum_tarihi'];
			}
		}

		$sorgu2 = "select urun_fiyat from urunler where urun_id = '$urun_id'";

		$sonuc = $db->query($sorgu2);

		if ($sonuc->num_rows > 0) {
			while($row = $sonuc->fetch_assoc()) {
				$urun_fiyat = $row['urun_fiyat'];
			}
		}

	$kaydet = mysqli_query($db,"Insert into siparisler (k_id,urun_id,urun_kategori,urun_adi,urun_fiyat,adress_Il,adress_ulke,meslek,egitim,cinsiyet,dogum) values ('$k_id','$urun_id','$kategori','$u_adi','$urun_fiyat','$adress_Il','$adress_ulke','$meslek','$egitim','$cinsiyet','$dogum')");

		if($kaydet){
			echo "Kayıt başarılı";
			header("Refresh: 3; url=index.php");
		}
		else{
			echo "hata";
		}
?>