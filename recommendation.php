<?php
include 'server.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
img{
    width: 200px;
    height: 200px;
}
</style>
    </head>
    <body>
        <?php include 'header.php'?>
        <h1  style="text-align: center;padding-top:60px;">Sales Notes</h1>
      <div class="card">
  <div class="card-body">
      <img src="img/sales.png" class="img-thumbnail"> <span> You can continue to sell <b><?php
      echo array_keys($orderCat, max($orderCat))[0];?> </b>,
      It's the best category you sold your products.</span></div></div>
      <div  class="card">
      <div class="card-body">
          <img src="img/sales.png" class="img-thumbnail"> <span> <b><?php
      echo array_keys($orderCountry, max($orderCountry))[0];?> </b>,
      is the your main target country. <b><?php
      foreach(array_keys($orderCountry) as $orcoun){
          if($orcoun!=array_keys($orderCountry, max($orderCountry))[0]){
              echo $orcoun.',';
          }
      }
      ?> </b>  also prefer to buying from you.</span></div></div>
      
            <div  class="card">
      <div class="card-body"><b>
      <?php 
      if(array_keys($orderSex, max($orderSex))[0]=="K"){
          echo '<img src="img/woman.png" class="img-thumbnail"><span>Woman prefer your products. You should also target man population to maximum profit. For advertisement recommendation click <a href="#advertisementage"> here</a></span>';
      }else{
        echo '<img src="img/man.png" class="img-thumbnail"><span>Man prefer your products. You should also target woman population to maximum profit. For advertisement recommendation click <a href="#advertisementgender"> here</a></span>';

      }  ?></b></div></div>
            <div  class="card">
      <div class="card-body">
          <img src="img/sales.png" class="img-thumbnail"> <span> Your sell numbers are too low at <b><?php
      echo array_keys($orderCat, min($orderCat))[0];?> </b>, You can give advertisement for this product. For advertisement recommendations click <a href="#advertisementage"> here. </a> </span></div></div>
    <div  class="card">
      <div class="card-body">
          <img src="img/edu.png" class="img-thumbnail"> <span> <b><?php
      echo array_keys($orderEdu, max($orderEdu))[0];?> </b>,
      is the your main target education. <b><?php
      foreach(array_keys($orderEdu) as $orcoun){
          if($orcoun!=array_keys($orderEdu, max($orderEdu))[0]){
              echo $orcoun.',';
          }
      }
      ?> </b>  also prefer to buying from you.</span></div></div>
        <div  class="card">
      <div class="card-body">
          <img src="img/job.png" class="img-thumbnail"> <span> <b><?php
      echo array_keys($orderJob, max($orderJob))[0];?> </b>,
      is the your main target group . <b><?php
      foreach(array_keys($orderJob) as $orjob){
          if($orjob!=array_keys($orderJob, max($orderJob))[0]&&$orjob!='Admin'){
              echo $orjob.',';
          }
      }
      ?> </b>  also prefer to buying from you.  For advertisement recommendations click <a href="#advertisementjob"> here. </a> </span></div></div>
    
    
    <h1 style="text-align: center">Advertisement Recommendations</h1>
  <div class="card" id="advertisementage">
  <div class="card-body">
        <img style="float:left" src="img/hour.png" class="img-thumbnail"> <span style="float:left;margin-left:20px"> You sell most of your products about <b><?php    echo $modeHour;?> o'clock </b>, You can give attention to publishing your advertisement before that hour. Also discounting can be more efficient at that hours.<br>
    <b><?php echo $modeAge?></b> Age is your mode age. It means that you selling your product to that age group. <b><?php if($modeAge<35){
        echo "You can reach young people from instagram and youtube.";
    }else{
        echo "You can reach old people from tv and newspaper.";
    } ?></b>
   </span>
   </div></div>
   <div id="advertisementgender" class="card">
   <div class="card-body">
   <img style="float:left" src="img/increase.png" class="img-thumbnail"><span style="float:left;margin-left:20px;padding-top:50px;">
<b>
<?php
 if(array_keys($orderSex, max($orderSex))[0]=="K"){
    if($modeAge<35){
    echo 'To improve man user sales, you can use instagram influencers, Because your users are generally young people.';
    }else{
        echo 'To improve man user sales, you can use newspapers, Because your users are generally old people.';
    }
 }else{
    if($modeAge<35){
     echo 'To improve woman user sales, you can use instagram influencers, Because your users are generally young people.';
    }else{
        echo 'To improve woman user sales, you can use tvs, Because your users are generally old people.';
    }
 } ?>

</b>
 </span>
    </div></div>
    <div id="advertisementjob" class="card">
   <div class="card-body">
   <img style="float:left" src="img/increase.png" class="img-thumbnail"><span style="float:left;margin-left:20px;padding-top:50px;">
<b>
<?php
echo round($cusJob[array_keys($cusJob, max($cusJob))[0]]/array_sum($cusJob),2).' per of product sales ordered by '.array_keys($cusJob, max($cusJob))[0].'. ';
if(round($cusJob[array_keys($cusJob, max($cusJob))[0]]/array_sum($cusJob),2)>0.25){
    echo 'You may pay attention to other job fields.';
}

  ?>

</b>
 </span>
    </div></div>
    </body>
</html>