 <nav style="position:fixed;width:100%;z-index:999;" class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="index.php">HOME</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNavDropdown">
   <ul class="navbar-nav">
   <li class="nav-item">
       <a class="nav-link" href="dashboard.php"><b>Dashboard </b></span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="recommendation.php"><b>Recommendation </b></span></a>
     </li>
     <?php
      if($_SERVER['SCRIPT_NAME']=="/hack/dashboard.php"){
    echo  '<li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" id="navbarDropdownCountry" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true" href="#">Country Kpis</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownCountry">';
     foreach(array_keys($_SESSION['cusCountry']) as $country) {
             echo '<a class="dropdown-item" href="dashboard.php?countrykpi='.$country.'">'.$country.'</a>';
         } 
echo '</div>
       </li>
       <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" id="navbarDropdownCity" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true" href="#">City Kpis</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownCity">';
foreach(array_keys($_SESSION['cusCity']) as $city) {
             echo '<a class="dropdown-item" href="dashboard.php?citykpi='.$city.'">'.$city.'</a>';
         }
       echo ' </div>
       </li>
       <li class="nav-item dropdown">

         <a class="nav-link dropdown-toggle" id="navbarDropdownSex" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true" href="#">Gender Kpis</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownSex">';
        foreach(array_keys($_SESSION['cusSex']) as $sex) {
             echo '<a class="dropdown-item" href="dashboard.php?sexkpi='.$sex.'">'.$sex.'</a>';
         } 
      echo '  </div>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" id="navbarDropdownEdu" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true" href="#">Education Kpis</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownEdu">';
        foreach(array_keys($_SESSION['cusEdu']) as $edu) {
             echo '<a class="dropdown-item" href="dashboard.php?edukpi='.$edu.'">'.$edu.'</a>';
         } 
     echo '  </div>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" id="navbarDropdownJob" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true" href="#">Job Kpis</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdownJob">';
                 foreach(array_keys($_SESSION['cusJob']) as $job) {
             echo '<a class="dropdown-item" href="dashboard.php?jobkpi='.$job.'">'.$job.'</a>';
         } 
       echo ' </div>
       </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPie" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Pie Charts        </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownPie">
         <a class="dropdown-item" href="dashboard.php?country=1">Country</a>
         <a class="dropdown-item" href="dashboard.php?city=1">City</a>
         <a class="dropdown-item" href="dashboard.php?sex=1">Gender</a>
         <a class="dropdown-item" href="dashboard.php?age=1">Age</a>
         <a class="dropdown-item" href="dashboard.php?education=1">Education</a>
         <a class="dropdown-item" href="dashboard.php?job=1">Job</a>

       </div>
     </li>';
        }?>
   </ul>
 </div>
</nav> 