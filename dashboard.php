<html>
    <head>
    <style type="text/css">
.rfKPIGroupContainer .rfMiniKPIContainer .rfMiniKPIValue {
    font-weight: 200 !important;
    font-size:20px !important;
}

.rfComponentContainer {
    margin-top:50px;
}
.dropdown-submenu {
    position: relative;
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<?php 
// Change this to the path to razorflow.php which you have extracted
require "razorflow_php/razorflow.php";
include 'server.php';
class SampleDashboard extends StandaloneDashboard {
    public function buildDashboard(){
    global $proCat,$proPrice,$cusCity,$cusCountry,$cusSex,$cusJob,$cusEdu,$cusAge,$orderPrice,$orderAge,
    $orderCat,$orderCity,$orderCountry,$orderEdu,$orderJob,$resultOrder,$years,$month1,$month2,
    $totprice,$totMonthPrice,$modeHour,$modeDay,$modeAge,$orderSex;
    //customer-kpi
    $customerKpi = new KPIGroupComponent ('customer_kpi');
    $customerKpi->setDimensions (12, 2);
    $customerKpi->setCaption('User Info KPIS');
    $customerKpi->addKPI('tot_cus', array(
        'caption' => 'Total User',
        'value' => count($cusAge),
        'numberSuffix' => ''
      ));
      if(!isset($_GET['sexkpi'])){
    $customerKpi->addKPI('Sex', array(
        'caption' => 'Most Gender',
        'value' => $cusSex[array_keys($cusSex, max($cusSex))[0]],
        'numberSuffix' => ' '.array_keys($cusSex, max($cusSex))[0]
      ));
    }  if(!isset($_GET['countrykpi'])){
      $customerKpi->addKPI('Country', array(
        'caption' => 'Most Country',
        'value' => $cusCountry[array_keys($cusCountry, max($cusCountry))[0]],
        'numberSuffix' => ' '.array_keys($cusCountry, max($cusCountry))[0]
      ));
    }  if(!isset($_GET['citykpi'])){
      $customerKpi->addKPI('City', array(
        'caption' => 'Most City',
        'value' => $cusCity[array_keys($cusCity, max($cusCity))[0]],
        'numberSuffix' => ' '.array_keys($cusCity, max($cusCity))[0]
      ));}
      if(!isset($_GET['jobkpi'])){
      $customerKpi->addKPI('Job', array(
        'caption' => 'Most Job',
        'value' => $cusJob[array_keys($cusJob, max($cusJob))[0]],
        'numberSuffix' => ' '.array_keys($cusJob, max($cusJob))[0]
      ));
    }  if(!isset($_GET['edukpi'])){
      $customerKpi->addKPI('education', array(
        'caption' => 'Most Education',
        'value' => $cusEdu[array_keys($cusEdu, max($cusEdu))[0]],
        'numberSuffix' => ' '.array_keys($cusEdu, max($cusEdu))[0]
      ));}
      $values = array_count_values($cusAge); 
      $mode = array_search(max($values), $values);
      $customerKpi->addKPI('age', array(
        'caption' => 'Age of Users',
        'value' => $mode,
        'numberSuffix' => ''
      ));
      $this->addComponent ($customerKpi);  
        if($resultOrder->num_rows > 0){
        // sales kpi
        $salesKpi = new KPIGroupComponent ('sales_kpi');
        $salesKpi->setDimensions (12, 2);
        $salesKpi->setCaption('Sales KPIS for All Products');
        $salesKpi->addKPI('category', array(
            'caption' => 'Best Seller Category',
            'value' => $orderCat[array_keys($orderCat, max($orderCat))[0]],
            'numberSuffix' => ' '.array_keys($orderCat, max($orderCat))[0]
          ));
          $salesKpi->addKPI('day_sales', array(
            'caption' => 'Daily Sales',
            'value' => $totprice,
            'numberSuffix' => " ₺"
          ));
          $salesKpi->addKPI('sales_hour', array(
            'caption' => 'Hours of sales',
            'value' => $modeHour,
            'numberPrefix' => 'about ',
            'numberSuffix' => " o'clock"
          ));
          $salesKpi->addKPI('sales_age', array(
            'caption' => 'Age of sales',
            'value' => $modeAge,
            'numberSuffix' => ''
          ));
          $salesKpi->addKPI('sales_day', array(
            'caption' => 'Days of sales',
            'value' =>'',
            'numberSuffix' =>  $modeDay
          ));
          if(!isset($_GET['sexkpi'])){
            $salesKpi->addKPI('sales_sex', array(
                'caption' => 'Gender of sales',
                'value' => $orderSex[array_keys($orderSex, max($orderSex))[0]],
                'numberSuffix' => ' '.array_keys($orderSex, max($orderSex))[0]
              ));
        }else{
            $salesKpi->setCaption('Sales KPIS for '.$_GET['sexkpi']);
        }

          if(!isset($_GET['countrykpi'])){
            $salesKpi->addKPI('sales_country', array(
                'caption' => 'Country of sales',
                'value' => $cusCountry[array_keys($orderCountry, max($orderCountry))[0]],
                'numberSuffix' => ' '.array_keys($orderCountry, max($orderCountry))[0]
              ));
        }else{
            $salesKpi->setCaption('Sales KPIS for '.$_GET['countrykpi']);
        }
        if(!isset($_GET['edukpi'])){
            $salesKpi->addKPI('sales_education', array(
                'caption' => 'Education of sales',
                'value' => $orderEdu[array_keys($orderEdu, max($orderEdu))[0]],
                'numberSuffix' => ' '.array_keys($orderEdu, max($orderEdu))[0]
              ));
        } else{
            $salesKpi->setCaption('Sales KPIS for '.$_GET['edukpi']);
        }

          $salesKpi->addKPI('tot_sales', array(
            'caption' => 'Total Sales',
            'value' => array_sum($orderPrice),
            'numberSuffix' => " ₺"
          ));
          $salesKpi->addKPI('month_sales', array(
            'caption' => 'Monthly Sales',
            'value' => $totMonthPrice,
            'numberSuffix' => " ₺"
          ));
         if(!isset($_GET['citykpi'])){
            $salesKpi->addKPI('sales_city', array(
                'caption' => 'City of sales',
        'value' => $orderCity[array_keys($orderCity, max($orderCity))[0]],
        'numberSuffix' => ' '.array_keys($orderCity, max($orderCity))[0]
              ));
        }else{
            $salesKpi->setCaption('Sales KPIS for '.$_GET['citykpi']);
        }
        if(!isset($_GET['jobkpi'])){
            $salesKpi->addKPI('sales_job', array(
                'caption' => 'Job of sales',
                'value' => $orderJob[array_keys($orderJob, max($orderJob))[0]],
                'numberSuffix' => ' '.array_keys($orderJob, max($orderJob))[0]
              ));
        }else{
            $salesKpi->setCaption('Sales KPIS for '.$_GET['jobkpi']);
        }
          $this->addComponent ($salesKpi); 
            //pie-chart sales
      $chartPieSale = new ChartComponent("pie_chart_sale");
      if(isset($_GET['country'])){
        $chartPieSale->setCaption("Sales for Countries");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }else if(isset($_GET['age'])){
        $chartPieSale->setCaption("Sales for Ages");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }else if(isset($_GET['sex'])){
        $chartPieSale->setCaption("Sales for Gender");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }else if(isset($_GET['city'])){
        $chartPieSale->setCaption("Sales for Cities");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }else if(isset($_GET['education'])){
        $chartPieSale->setCaption("Sales for Education");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }else if(isset($_GET['job'])){
        $chartPieSale->setCaption("Sales for Jobs");
        $chartPieSale->overrideDisplayOrderIndex("1");
     }
     else{
        $chartPieSale->setCaption("Sales for categories");
     }
      $chartPieSale->setDimensions (6, 5);
      if(isset($_GET['country'])){
        $chartPieSale->setLabels (array_keys($orderCountry));
        $chartPieSale->setPieValues (array_values($orderCountry));
      }else if(isset($_GET['age'])){
        $chartPieSale->setLabels (array_keys(array_count_values($orderAge)));
        $chartPieSale->setPieValues (array_values(array_count_values($orderAge)));
    }else if(isset($_GET['sex'])){
      $chartPieSale->setLabels (array_keys($orderSex));
      $chartPieSale->setPieValues (array_values($orderSex));
  }else if(isset($_GET['city'])){
  $chartPieSale->setLabels (array_keys($orderCity));
  $chartPieSale->setPieValues (array_values($orderCity));
}else if(isset($_GET['education'])){
  $chartPieSale->setLabels (array_keys($orderEdu));
  $chartPieSale->setPieValues (array_values($orderEdu));
}else if(isset($_GET['job'])){
    $chartPieSale->setLabels (array_keys($orderJob));
    $chartPieSale->setPieValues (array_values($orderJob));
}
      else{
        $chartPieSale->setLabels (array_keys($orderCat));
        $chartPieSale->setPieValues (array_values($orderCat));
      }
      $this->addComponent ($chartPieSale);
    }

      //pie-chart customer
      $chartPieCus = new ChartComponent("pie_chart_customer");
      if(isset($_GET['country'])){
        $chartPieCus->setCaption("Users for Countries");
        $chartPieCus->overrideDisplayOrderIndex("2");
     }else if(isset($_GET['age'])){
        $chartPieCus->setCaption("Users for Ages");
        $chartPieCus->overrideDisplayOrderIndex("2");

     }else if(isset($_GET['sex'])){
        $chartPieCus->setCaption("Users for Gender");
        $chartPieCus->overrideDisplayOrderIndex("2");

     }else if(isset($_GET['city'])){
        $chartPieCus->setCaption("Users for Cities");
        $chartPieCus->overrideDisplayOrderIndex("2");

     }else if(isset($_GET['education'])){
        $chartPieCus->setCaption("Users for Education");
        $chartPieCus->overrideDisplayOrderIndex("2");

     }else if(isset($_GET['job'])){
        $chartPieCus->setCaption("Users for Jobs");
        $chartPieCus->overrideDisplayOrderIndex("2");
     }
     else{
        $chartPieCus->setCaption("Products for categories");
     }
     if($resultOrder->num_rows==0){
        $chartPieCus->setDimensions (12, 5);

     }else{
      $chartPieCus->setDimensions (6, 5);
     }
      if(isset($_GET['country'])){
        $chartPieCus->setLabels (array_keys($cusCountry));
        $chartPieCus->setPieValues (array_values($cusCountry));
      }else if(isset($_GET['age'])){
        $chartPieCus->setLabels (array_keys(array_count_values($cusAge)));
        $chartPieCus->setPieValues (array_values(array_count_values($cusAge)));
    }else if(isset($_GET['sex'])){
      $chartPieCus->setLabels (array_keys($cusSex));
      $chartPieCus->setPieValues (array_values($cusSex));
  }else if(isset($_GET['city'])){
  $chartPieCus->setLabels (array_keys($cusCity));
  $chartPieCus->setPieValues (array_values($cusCity));
}else if(isset($_GET['education'])){
  $chartPieCus->setLabels (array_keys($cusEdu));
  $chartPieCus->setPieValues (array_values($cusEdu));
}else if(isset($_GET['job'])){
    $chartPieCus->setLabels (array_keys($cusJob));
    $chartPieCus->setPieValues (array_values($cusJob));
  }
      else{
        $chartPieCus->setLabels (array_keys($proCat));
        $chartPieCus->setPieValues (array_values($proCat));
      }
      $this->addComponent ($chartPieCus);
      if($resultOrder->num_rows > 0){

      //column-chart
      $chartCol = new ChartComponent("sales_chart");
      $labelsYear=array_count_values($years);
      $chartCol->setCaption("Sales - ".array_keys($labelsYear)[0]." vs ".array_keys($labelsYear)[1]);
      $chartCol->setDimensions (12, 5);
      $chartCol->setLabels (array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sept", "Oct", "Nov", "Dec"));
      if(isset(array_keys($labelsYear)[0])){
      $chartCol->addSeries (array_keys($labelsYear)[0], array_keys($labelsYear)[0],array_keys($labelsYear)[0]==2019 ? array_values($month1):array_values($month2));
      }
      if(isset(array_keys($labelsYear)[1],array_keys($labelsYear)[1])){
      $chartCol->addSeries (array_keys($labelsYear)[1],array_keys($labelsYear)[1], array_keys($labelsYear)[1]==2019 ? array_values($month1):array_values($month2));
      }
      $chartCol->setYAxis('Sales', array("numberPrefix"=> '₺ ', "numberHumanize"=> true));
      $this->addComponent ($chartCol);
            // product kpi
            $productKpi = new KPIGroupComponent ('product_kpi');
            $productKpi->setDimensions (12, 2);
            $productKpi->setCaption('Product Info KPIS');
            $productKpi->addKPI('category', array(
                'caption' => 'High Stocked Category',
                'value' => $proCat[array_keys($proCat, max($proCat))[0]],
                'numberSuffix' => ' '.array_keys($proCat, max($proCat))[0]
              ));
              $productKpi->addKPI('low_price', array(
                  'caption' => 'Lowest Price',
                  'value' => min($proPrice),
                  'numberSuffix' => " ₺"
                ));
                $productKpi->addKPI('high_price', array(
                  'caption' => 'Highest Price',
                  'value' => max($proPrice),
                  'numberSuffix' => ' ₺'
                ));
                $productKpi->addKPI('mean_price', array(
                  'caption' => 'Mean Price',
                  'value' => array_sum($proPrice)/count($proPrice),
                  'numberSuffix' => ' ₺'
                ));
              $this->addComponent ($productKpi); 
      }
    } 
  }
  $db = new SampleDashboard();
  ?> 
    <body style="position:relative;">
    <?php include 'header.php'?>
    </body>
  </html>
  <?php 
    $db->renderStandalone();
   // session_destroy();
    ?>