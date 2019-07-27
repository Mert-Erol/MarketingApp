<?php 

	session_start();
	session_destroy();

	echo "Başarıyla çıkış yaptınız";
	header("Refresh: 3; url=index.php");
?>