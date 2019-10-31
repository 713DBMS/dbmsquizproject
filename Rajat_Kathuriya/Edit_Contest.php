<?php

date_default_timezone_set('Asia/Kolkata');
$currentdatetime=date_create(date('Y-m-d'));
$result = $currentdatetime->format('Y-m-d h:i');
//echo $result;
?>


<html>

<head>

  <link href="./boot/boot2/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="./boot/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/userhome.css">
  <link rel="stylesheet" type="text/css" href="css/add_contest.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/global.css">

</head>








<?php
//$var=5;
//echo var;
//$_SESSION['varname'] = ans;
?>
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous">
</script>
<script> 
  $(function(){
    $("#header").load("header.html"); 
    $("#footer").load("footer.html"); 
  });
</script> 

<script> 
  function pagesubmit(){
   alert("here");

 }
</script> 





<body>
  <div id="header"></div>


  <div id="hel"></div> 


  <?php
  require_once("config.php");
  ?>


  <div  style="background : #f7f7f7;">
   <label style="font-size:30px;
   color:black;
   font-family: 'Times New Roman', Times, serif;
   font-style: normal;
   font-weight:normal;
   margin-left:20px;
   margin-top:25px;
   margin-bottom:25px;">Edit Contest</label>
 </div>	


 <div class="container">



 </div>




 
 <div id="parent" >

   <div id="inside">

     <form  method="get" id="register_form" action="Edit_Contest.php" onsubmit="return validate()" >


      <div class="form-group">
        <label for="organ">Test Name:</label>
        <input type="textarea" class="form-control" id="tname" placeholder="Enter Test Name" name="tname" readonly>
      </div>

      <div class="form-group">
        <label for="email">Start Date and Time:</label>
        <div class="controls input-append date form_datetime" id="sdate"  data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii" 
        data-link-field="dtp_input1">
        <input size="20" type="text" id="sd" style="height: 30px" value="" readonly>
        <span class="add-on" style="height: 30px"><i class="icon-th" ></i></span>
      </div>
      <input type="text" id="s_date_time" name="s_date_time" value="" hidden />
    </div>

    <div class="form-group">
      <label for="pass">End Date and Time:</label>
      <div class="controls input-append date form_datetime2" id="edate" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" 
      data-link-field="dtp_input1">
      <input size="20" type="text" style="height: 30px" id="ed" value="" readonly >
      <span class="add-on" style="height: 30px"><i  class="icon-th"></i></span>
    </div>
    <input type="text" id="e_date_time" name="e_date_time" value="" hidden /></div>

    <div class="form-group">
      <label for="pass">Description:</label>
      <input type="textarea" class="form-control" id="desc" placeholder="Enter Description" name="desc" required />
    </div>






    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required />   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I agree on <a href="tc.htm"> terms and conditions</a>
      </label>
    </div>




    <input type="submit"  name="submit" id="submit" value="&nbsp;Submit&nbsp;" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>


  </form>

</div>
</div>








<script type="text/javascript" src="./boot/boot2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./boot/boot2/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./boot/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./boot/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>



<script type="text/javascript">

  $(".form_datetime").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    linkField: "s_date_time",
    linkFormat: "yyyy-mm-dd hh:ii",
    autoclose: true,
        //todayBtn: true,
        startDate: "<?php echo $result ?>",
        minuteStep: 5
      });
	//var x='2102-12-03 04:00';//document.getElementById("s_date_time").value;
	$(".form_datetime2").datetimepicker({
		
    format: "dd MM yyyy - hh:ii",
    linkField: "e_date_time",
    linkFormat: "yyyy-mm-dd hh:ii",
    autoclose: true,
        //todayBtn: true,
        startDate: "<?php echo $result ?>",
        minuteStep: 5
      });
    </script>     

    <script>

      function validate(){
        var start=document.getElementById("s_date_time").value;
        var end=document.getElementById("e_date_time").value;
	//alert(x);
	//alert(x.substr(0,4)+" "+x.substr(5,2)+" "+x.substr(8,2)+" "+x.substr(11,2)+" "+x.substr(14,2));
	var date1 = new Date(parseInt(start.substr(0,4),10),parseInt(start.substr(5,2),10),parseInt(start.substr(8,2),10)
   ,parseInt(start.substr(11,2),10),parseInt(start.substr(14,2),10)); 
  var date2 = new Date(parseInt(end.substr(0,4),10),parseInt(end.substr(5,2),10),parseInt(end.substr(8,2),10)
   ,parseInt(end.substr(11,2),10),parseInt(end.substr(14,2),10));
// the following is to handle cases where the times are on the opposite side of
// midnight e.g. when you want to get the difference between 9:00 PM and 5:00 AM

if (date2 < date1) {
  alert("Please Select a valid Date time range hello");
  return false;
}
else{

}
}
</script>


<div id="footer"></div>

</body>

</html>


<?php

// session_start();


$contestid=-1;
if(isset($_GET["contestid"]))
  $contestid=$_GET['contestid'];

//echo "ddd";
$cid=-1;
if(isset($_GET["tname"])) {
  require_once("config.php");      


  $name=$_GET['tname'];
  $s_date_time=$_GET['s_date_time'];
  $e_date_time=$_GET['e_date_time'];
  $desc=$_GET['desc'];
//$image=$_GET['image'];
//echo "ddd";
  $sql="update add_contest  set  start_datetime='".$s_date_time."',end_datetime='".$e_date_time."',description='".$desc."' where name='".$name."'";
//echo $sql;
  $result = mysqli_query($conn,$sql);
  if(!$result){
   die('There was an error running the query [' . $conn->error . ']');
 }
 else{
		 //alert("done");	
   echo '<script>window.location.href = window.location.href.replace(/[^/]*$/, "")+"Show_Contest.php";</script>';

 }




 
}
else{
	$conn = mysqli_connect('localhost:3308','root','','db2018ca55');
	$sql="SELECT * FROM add_contest where id=$contestid";
	
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	echo "<script>document.getElementById('tname').value='".$row['name']."';</script>";
	echo '<script>document.getElementById("sd").value="'.$row["start_datetime"].'";</script>';
	echo '<script>document.getElementById("ed").value="'.$row["end_datetime"].'";</script>';
	echo '<script>document.getElementById("desc").value="'.$row["description"].'";</script>';
	echo '<script>document.getElementById("s_date_time").value="'.$row["start_datetime"].'";</script>';
	echo '<script>document.getElementById("e_date_time").value="'.$row["end_datetime"].'";</script>';
	//echo "hello";
	
}

?>