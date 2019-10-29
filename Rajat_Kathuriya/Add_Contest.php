<?php

session_start();
if(isset($_POST["submit"])) {
        
require_once("config.php");

$name=$_POST['tname'];
$s_date_time=$_POST['s_date_time'];
$e_date_time=$_POST['e_date_time'];
$desc=$_POST['desc'];
$image=$_POST['image'];

$sql="insert into add_contest (name,start_datetime,end_datetime,description,image,rid) values('".$name."','".$s_date_time."','".$e_date_time."','".$desc."','".$image."','1')";

if(!$result = $conn->query($sql)){
   die('There was an error running the query [' . $conn->error . ']');
}
else{
	$sql="select id from add_contest where name='".$name."'";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	$sql="create table ".$row['id']."_question (id int not null auto_increment,question text not null,type text not null,o1 text not null,
o2 text not null,o3 text not null,o4 text not null,ans text not null,primary key(id))";
    
	
	
	if(!$result = $conn->query($sql))
         die('There was an error running the query [' . $conn->error . ']');
	else  
         echo '<script>window.location.href = window.location.href.replace(/[^/]*$/, "")+"Edit_Questions.php?js_test=[]&submit=true"</script>';		

}


	
	
 
}

?>


<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/userhome.css">
<link rel="stylesheet" type="text/css" href="css/add_contest.css">
  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
<link rel="stylesheet" href="css/global.css">

 
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
</head>



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
	margin-top:15px;
	margin-bottom:15px;">Add Contest</label>
  </div>	
   
   
   
  
  <div id="parent" >
	
   <div id="inside">
	
	<form  method="post" id="register_form" action="Add_Contest.php">
 

    <div class="form-group">
      <label for="organ">Test Name:</label>
      <input type="text" class="form-control" id="tname" placeholder="Enter Test Name" name="tname" required>
    </div>

    <div class="form-group">
      <label for="email">Start Date and Time:</label>
      <input type="datetime-local" class="form-control" id="s_date_time" placeholder="Enter Start Date and Time" name="s_date_time" required />
    </div>

       <div class="form-group">
      <label for="pass">End Date and Time:</label>
      <input type="datetime" class="form-control" id="e_date_time" placeholder="Enter End Date and Time" name="e_date_time" required />
      </div>
	  
	  <div class="form-group">
      <label for="pass">Description:</label>
      <input type="textarea" class="form-control" id="desc" placeholder="Enter Description" name="desc" required />
      </div>

         <div class="form-group">
      <label for="pass">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Select Image" name="image" required />
      </div>
  

    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required />   I agree on <a href="tc.htm"> terms and conditions</a>
      </label>
    </div>
    <input type="submit" name="submit" id="submit" value="&nbsp;Submit&nbsp;" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
  </form>

   </div>
  </div>
   

<div id="footer"></div>



</body>

</html>
</html>