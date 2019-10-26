<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="userhome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ContestId,ContestName,RecruiterId,CompanyName,start,end,image FROM contest";
$result = mysqli_query($conn, $sql);

$live="";
$upcoming="";
$past="";

$livecontest=0;
$upcomingcontest=0;
$pastcontest=0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        $currentdatetime=date_create(date('Y-m-d H:i:s'));
        $starttime=date_create($row["start"]);
        $endtime=date_create($row["end"]);
        $diff=date_diff($endtime,$currentdatetime);
        $startday=$starttime->format('d');
        $startmonth=$starttime->format('M');
        $starthours=$starttime->format('h');
        $startminutes=$starttime->format('i');
        $startampm=$starttime->format('A');
        
        if($currentdatetime>$endtime) {
        	$pastcontest++;
        	$past.="<a href='description.php' style='text-decoration:none;'>
        	<div class='card' style='display:inline-block;'>
          <img style='height: 140px;' class='card-img-top' src=".$row['image']." alt='Card image cap'>
          <div class='card-body' style='background-color: #d1b3ff;' align='center'>
            <mark style='line-height: 30px;'>".$row['CompanyName']."</mark>
            <h5 class='card-title' style='font-size: 20px;font-weight: bold;'>".$row['ContestName']."</h5>
            <small>HELD ON</small>
            <p style='font-size: 17px;'>".$startday.",".$startmonth."&nbsp;&nbsp;&nbsp;"."<span style='font-size: 18px;'>".$starthours."&nbsp;:&nbsp;".$startminutes."&nbsp;&nbsp;".$startampm."</span></p>
            <a href='#' class='btn btn-success'>Start</a>
          </div>
        </div></a>";
        }
        // ----------------------- FOR UPCOMING CONTEST ------------------------

        else if($currentdatetime<$starttime) {
        	$upcomingcontest++;

        	$upcoming.="<a href='description.php' style='text-decoration:none;'>
        	<div class='card' style='display:inline-block;'>
          <img style='height: 140px;' class='card-img-top' src=".$row['image']." alt='Card image cap'>
          <div class='card-body' style='background-color: #d1b3ff;' align='center'>
            <mark style='line-height: 30px;'>".$row['CompanyName']."</mark>
            <h5 class='card-title' style='font-size: 20px;font-weight: bold;'>".$row['ContestName']."</h5>
            <small>STARTS ON</small>
            <p style='font-size: 17px;'>".$startday.",".$startmonth."&nbsp;&nbsp;&nbsp;"."<span style='font-size: 18px;'>".$starthours."&nbsp;:&nbsp;".$startminutes."&nbsp;&nbsp;".$startampm."</span></p>
            <a href='#' class='btn btn-success'>Register Here</a>
          </div>
        </div></a>";
        }
        // ---------- FOR LIVE CONTEST ----------------
        else {
        $livecontest++;
        $days = $diff->d; 
        $hours = $diff->h;
        $minutes = $diff->i;

        if($days>=0 && $days<=9) {
          $days="0".$days;
        }
        if($hours>=0 && $hours<=9) {
          $hours="0".$hours;
        }
        if($minutes>=0 && $minutes<=9) {
          $minutes="0".$minutes;
        }

        $live.=" <a href='description.php' style='text-decoration:none;'>
          <div class='card' style='display:inline-block;'>
          <img style='height: 140px;' class='card-img-top' src=".$row['image']." alt='Card image cap'>
          <div class='card-body' style='background-color: #d1b3ff;' align='center'>
            <mark style='line-height: 30px;'>".$row['CompanyName']."</mark>
            <h5 class='card-title' style='font-size: 20px;font-weight: bold;'>".$row['ContestName']."</h5>
            <small>ENDS IN</small><br>
            <span style='font-size: 20px;'>".$days."&nbsp;:&nbsp;".$hours."&nbsp;:&nbsp;".$minutes."</span>
            <p style='font-size:10px;font-weight:bold;'>DAYS&nbsp;:&nbsp;HRS&nbsp;:&nbsp;MINS</p>
            <a href='#' class='btn btn-success'>Start Now</a>
          </div>
        </div></a>";
        }

    }
}
else {
    echo "0 results";
}

mysqli_close($conn);
?> 



<body data-spy="scroll" data-target="#myScrollspy">

<!-- ===================== HEADER ============================= -->
	 <div class="header">
  		<a href="#default" class="logo">Quizzer</a>
  		<div style="margin-left: 230px;">
    		<a class="active" href="#home">Challenges</a>
    		<a href="#features">Practice</a>
    		<a href="#about">Articles</a>
  		</div>
  		<div class="header-right" style="margin-right: 50px;">
  			<div class="dropdown show">
  			<a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown">UserName</a>
  			<div class="dropdown-menu">
    			<a class="dropdown-item" href="#">Profile</a>
    			<a class="dropdown-item" href="#">History</a>
  			</div>
  			<a href="#logout" style="color : #6699ff;font-size: 15px;">Logout</a>
			</div>
  			
  		</div>
	</div> 





<!-- ------------- VERTICAL SCROLLSPY -------------------------- --> 

<div style="background-color: #f2f2f2;">
  <div class="row">
    <nav class="col-sm-2" id="myScrollspy" style="padding-left: 30px;padding-top: 80px;font-weight: bold;font-size: 18px;">
      <ul class="nav navbar-nav nav-pills" data-spy="affix" data-offset-top="50">
        <li class="active"><a href="#section1">LIVE</a></li>
        <li><a href="#section2">UPCOMING</a></li>
        <li><a href="#section3">PAST</a></li>
      </ul>
    </nav>
    <div class="col-sm-8">
    	<h1 style="color:#660035;font-family: 'Poiret One', cursive;"> Give Quizzes and Get Hired </h1><hr style="border-color: black;">
      <div id="section1" style="min-height: 500px;">
        <h2 style="font-family: 'Josefin Sans'; text-shadow: 2px 2px #d9d9d9;">Live Challenges</h2><hr style="width: 500px;border-color: #d9d9d9;" align="left">
      	<?php echo $live; ?>
      </div>
      <br><br><br><br>
      <hr style="border-color: black;">
      <div id="section2" style="min-height: 500px;">
        <h2 style="font-family: 'Josefin Sans'; text-shadow: 2px 2px #d9d9d9;">Upcoming Challenges</h2><hr style="width: 500px;border-color: #d9d9d9;" align="left">
        <?php echo $upcoming; ?>
      </div> 

      <br><br><br><br>
      <hr style="border-color: black;">  
      <div id="section3" style="min-height: 500px;">
        <h2 style="font-family: 'Josefin Sans'; text-shadow: 2px 2px #d9d9d9;">Past Challenges</h2><hr style="width: 500px;border-color: #d9d9d9;" align="left">
        <?php echo $past; ?>
      </div>
    
    </div>
  </div>
  <br><br><br><br><br>
</div>





<!-- ----------------------- FOOTER -------------------------- -->

<footer id="footer" class="footer-1">
  <div class="main-footer widgets-dark typo-light"><br><br>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget subscribe no-box">
            <h5 class="widget-title" style="font-size: 30px;font-family: 'Aclonica'">QUIZZER<span></span></h5>
            <p style="font-size: 15px;">About the company, little discription will goes here.. </p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget no-box">
            <h5 class="widget-title" style="font-size: 20px;font-family: 'Aclonica'">Quick Links<span></span></h5>
            <ul class="thumbnail-widget" style="font-size:15px; ">
              <li><div class="thumb-content"><a href="#.">Practice</a></div></li>
              <li><div class="thumb-content"><a href="#.">Articles</a></div></li>
              <li><div class="thumb-content"><a href="#.">About us</a></div></li>
              <li><div class="thumb-content"><a href="#.">Privacy Policy</a></div></li>
              <li><div class="thumb-content"><a href="#.">Careers</a></div></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget no-box">
            <h5 class="widget-title" style="font-size: 20px;font-family: 'Aclonica'">Get Started<span></span></h5>
            <p style="font-size: 15px;">Give Quiz and get hired.</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="widget no-box">
            <h5 class="widget-title" style="font-size: 20px;font-family: 'Aclonica'">Contact Us<span></span></h5>
            <p><a href="mailto:info@domain.com" title="glorythemes" style="font-size: 15px;">info@domain.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>Copyright Company Name © 2016. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>





</body>
</html>