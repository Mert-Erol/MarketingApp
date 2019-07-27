<?php 

  session_start();

  require_once("baglanti.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Item - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

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
            <a class="nav-link" href="#">Home
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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4"></h1>
        
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <?php 

          $urun_id = $_GET['urun_id'];

          if(!isset($urun_id)){
            header("Refresh: 1; url=index.php");
          }

          $sorgu = "select * from urunler where urun_id = '$urun_id'";

            $sonuc = $db->query($sorgu);

            if ($sonuc->num_rows > 0) {
              while($row = $sonuc->fetch_assoc()) {

                ?>

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="<?php echo $row['urun_foto_link'] ?>" alt="">
            <div class="card-body">
            <h3 class="card-title"><?php echo $row['urun_adi'] ?></h3>
            <h4><?php echo $row['urun_fiyat']." TL" ?></h4>
            <p class="card-text"><?php echo $row['urun_hakkinda']?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
            </div>

            <div class="card card-outline-secondary my-4">
            
              <?php 
                if(isset($_SESSION['kullanici'])){
                  echo '<a href="satinAl.php?urun_id='.$row['urun_id'].'&k_id='.$_SESSION['k_id'].'&kategori='.$row['kategori'].'&u_adi='.$row['urun_adi'].'" class="btn btn-success">Satın Al</a>';
                }
                else{
                  echo '<a href="#" class="btn btn-success">Giriş Yapın</a>';
                }
              ?>

              
          
            </div>






          </div>

                <?php

              }
            }

        ?>

        
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
