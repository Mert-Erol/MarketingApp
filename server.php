<?php
session_start();
//product
$proCat=array();
$proPrice = array();
$db=mysqli_connect('localhost','root','','omert') or die("err");
$sql="SELECT * FROM urunler";
$result = mysqli_query($db, $sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
            if(!in_array($row['kategori'],array_keys($proCat))){
                $proCat[$row['kategori']]=1;
            }else {
                $proCat[$row['kategori']]+=1;
            }
                $proPrice[]=$row['urun_fiyat'];
    }
}

//users
$cusCity=array();
$cusCountry=array();
$cusSex=array();
$cusJob=array();
$cusEdu=array();
$cusAge=array();
$flag=0;
if(isset($_GET['countrykpi'])){
    $sql="SELECT * FROM kullanicilar WHERE k_adres_ulke='".$_GET['countrykpi']."'";
}else if(isset($_GET['citykpi'])){
    $sql="SELECT * FROM kullanicilar WHERE k_adres_Il='".$_GET['citykpi']."'";
}else if(isset($_GET['sexkpi'])){
    $sql="SELECT * FROM kullanicilar WHERE k_cinsiyet='".$_GET['sexkpi']."'";
}else if(isset($_GET['jobkpi'])){
    $sql="SELECT * FROM kullanicilar WHERE k_meslek='".$_GET['jobkpi']."'";
}else if(isset($_GET['edukpi'])){
    $sql="SELECT * FROM kullanicilar WHERE k_egitim_durumu='".$_GET['edukpi']."'";
}else{
    $sql="SELECT * FROM kullanicilar";
}$result = mysqli_query($db, $sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
            if($row['yetki']==0){
            $flag=1;
            if(!in_array($row['k_adres_il'],array_keys($cusCity))){
                $cusCity[$row['k_adres_il']]=1;
            }else {
                $cusCity[$row['k_adres_il']]+=1;
            }
            if(!in_array($row['k_adres_ulke'],array_keys($cusCountry))){
                $cusCountry[$row['k_adres_ulke']]=1;
            }else {
                $cusCountry[$row['k_adres_ulke']]+=1;
            }  
            if($row['k_meslek']!="Admin" && !in_array($row['k_meslek'],array_keys($cusJob))){
                $cusJob[$row['k_meslek']]=1;
            }else if($row['k_meslek']!="Admin"){
                $cusJob[$row['k_meslek']]+=1;
            }  
            if(!in_array($row['k_egitim_durumu'],array_keys($cusEdu))){
                $cusEdu[$row['k_egitim_durumu']]=1;
            }else {
                $cusEdu[$row['k_egitim_durumu']]+=1;
            }  
            if(!in_array($row['k_cinsiyet'],array_keys($cusSex))){
                $cusSex[$row['k_cinsiyet']]=1;
            }else {
                $cusSex[$row['k_cinsiyet']]+=1;
            }  
                $cusAge[]=[$row['k_dogum_tarihi']];  
         }
        }
}
foreach ($cusAge as $age){
    $date = new DateTime($age[0]);
    $now = new DateTime();
    $interval = $now->diff($date);
    $temp[]=$interval->y;
}
$cusAge=$temp;
if(!isset($_SESSION['cusCountry'])){
    $_SESSION['cusCountry']=$cusCountry;
}
if(!isset($_SESSION['cusCity'])){
    $_SESSION['cusCity']=$cusCity;
}
if(!isset($_SESSION['cusSex'])){
    $_SESSION['cusSex']=$cusSex;
}
if(!isset($_SESSION['cusEdu'])){
    $_SESSION['cusEdu']=$cusEdu;
}
if(!isset($_SESSION['cusJob'])){
    $_SESSION['cusJob']=$cusJob;
}if(!isset($_SESSION['cusAge'])){
    $_SESSION['cusAge']=$cusAge;
}
//orders
$orderCat=array();
$orderPrice=array();
$orderCity=array();
$orderCountry=array();
$orderJob=array();
$orderEdu=array();
$orderSex=array();
$orderDate=array();
$totprice=0;
$totMonthPrice=0;
if(isset($_GET['countrykpi'])){
    $sql="SELECT * FROM siparisler WHERE adress_ulke='".$_GET['countrykpi']."'";
}else if(isset($_GET['citykpi'])){
    $sql="SELECT * FROM siparisler WHERE adress_Il='".$_GET['citykpi']."'";
}else if(isset($_GET['sexkpi'])){
    $sql="SELECT * FROM siparisler WHERE cinsiyet='".$_GET['sexkpi']."'";
}else if(isset($_GET['jobkpi'])){
    $sql="SELECT * FROM siparisler WHERE meslek='".$_GET['jobkpi']."'";
}else if(isset($_GET['edukpi'])){
    $sql="SELECT * FROM siparisler WHERE egitim='".$_GET['edukpi']."'";
}else{
    $sql="SELECT * FROM siparisler";
}
$hist=array();
$resultOrder = mysqli_query($db, $sql);
if($resultOrder->num_rows > 0){
    while($row = $resultOrder->fetch_assoc()){
            if(!in_array($row['urun_kategori'],array_keys($orderCat))){
                $orderCat[$row['urun_kategori']]=1;
            }else {
                $orderCat[$row['urun_kategori']]+=1;
            }
            if(!in_array($row['adress_ulke'],array_keys($orderCountry))){
                $orderCountry[$row['adress_ulke']]=1;
            }else  if(!in_array($row['k_id'],$hist)) {
                $orderCountry[$row['adress_ulke']]+=1;
            }  
            if(!in_array($row['adress_Il'],array_keys($orderCity))){
                $orderCity[$row['adress_Il']]=1;
            }else  if(!in_array($row['k_id'],$hist)) {
                $orderCity[$row['adress_Il']]+=1;
            }  
            if(!in_array($row['meslek'],array_keys($orderJob))){
                $orderJob[$row['meslek']]=1;
            }else if(!in_array($row['k_id'],$hist)) {
                $orderJob[$row['meslek']]+=1;
            }  
            if(!in_array($row['egitim'],array_keys($orderEdu))){
                $orderEdu[$row['egitim']]=1;
            }else  if(!in_array($row['k_id'],$hist)) {
                $orderEdu[$row['egitim']]+=1;
            }  
            if(!in_array($row['cinsiyet'],array_keys($orderSex))){
                $orderSex[$row['cinsiyet']]=1;
            }else  if(!in_array($row['k_id'],$hist)) {
                $orderSex[$row['cinsiyet']]+=1;
            }  
                $orderDate[]=[$row['tarih']];  
                $orderPrice[]=$row['urun_fiyat'];
                if(!in_array($row['k_id'],$hist)) {
                $orderAge[]=[$row['dogum']];
                }
                $hist[]=$row['k_id'];
         }
        $month1=array_fill_keys((array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec")),0);
        $month2=array_fill_keys((array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec")),0);
foreach ($orderAge as $age){
    $date = new DateTime($age[0]);
    $now = new DateTime();
    $interval = $now->diff($date);
    $tempAge[]=$interval->y;
}
    $orderAge=$tempAge;
    foreach ($orderDate as $key=>$orDate){
    $date = new DateTime($orDate[0]);
    $hours[]=$date->format('H');
    $years[]=$date->format('Y');
    $days[]=$date->format('D');
    if($date->format('Y')==2019)
    $month1[$date->format('M')]+=$orderPrice[$key];
    else if($date->format('Y')==2018)
    $month2[$date->format('M')]+=$orderPrice[$key];
    $now = new DateTime();
    $interval = $now->diff($date);
    if($interval->y==0&&$interval->m==0){
        $tempMonthKeys[]=$key;
    }
    if($interval->y==0&&$interval->m==0&$interval->d==0){
    $tempKeys[]=$key;
    }
}
$valuesDay = array_count_values($days); 
$modeDay = array_search(max($valuesDay), $valuesDay);
$valuesHour = array_count_values($hours); 
$modeHour = array_search(max($valuesHour), $valuesHour);
$valuesAge = array_count_values($orderAge); 
$modeAge = array_search(max($valuesAge), $valuesAge);
if(isset($tempMonthKeys)){
foreach ($tempMonthKeys as $key){
    $totMonthPrice+=$orderPrice[$key];
    }
}
if(isset($tempKeys)){
foreach ($tempKeys as $key){
$totprice+=$orderPrice[$key];
}}
}
?>