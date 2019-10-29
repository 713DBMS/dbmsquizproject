<?php

session_start();
$cid=$_GET["contestid"];
$var=$_GET["js_test"];
$someArray = json_decode($var, true);
$message="";
if(isset($_GET["submit"])) {
    if($_GET["submit"]=="true"){    
     submit($someArray,$cid);
	}
	
 
}

?>


<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/userhome.css">
<link rel="stylesheet" type="text/css" href="css/preview.css">
  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
<link rel="stylesheet" href="css/global.css">


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
function func(){
	var simple = '<?php echo $var; ?>';
 
 window.location.href = window.location.href.replace(/[^/]*$/, "")+"preview.php?contestid="+<?php echo $cid ?>+"&js_test="+simple+"&submit=true";
 }
 
 
 function edit(){
	var simple = '<?php echo $var; ?>';
 
 window.location.href = window.location.href.replace(/[^/]*$/, "")+"Edit_Questions.php?contestid="+<?php echo $cid ?>+"&js_test="+simple+"&submit=true";
 }

 
</script>
</head>



<body>
<div id="header"></div>

<div id="headnam" style="background : #f7f7f7;">
	<label  style="font-size:30px;
	color:black;
	font-family: 'Times New Roman', Times, serif;
	font-style: normal;
	font-weight:normal;
	margin-left:20px;
	margin-top:15px;
	margin-bottom:15px;">Preview Questions</label>
  </div>	

<div id="parent">
   <div id="inside">

<?php

 $count=1;
 foreach ($someArray as $key => $value) {
    echo $count.".  ".$value["question"]. "<br>";
	if($value["type"]=="MCSA" || $value["type"]=="MCMA"){
	echo "<label style='color:gray;font-weight:normal;font-size:18px;'>(a).  ".$value["o1"] . "<br>";
	echo "(b).  ".$value["o2"] . "<br>";
	echo "(c).  ".$value["o3"] . "<br>";
	echo "(d).  ".$value["o4"] . "</label><br>";
	}
	echo "<label style='color:green;font-weight:normal;'>Ans- ".$value["ans"] . "</label><br><br><br><br>";
	$count++;
  }

 
 //print_r($someArray);  
//echo $var;
//$_SESSION['varname'] = ans;
?>
 
   
   <Button onclick="func()" class="btn btn-primary"> Save Questions </Button>
   <Button onclick="edit()" class="btn btn-primary"> Edit Questions </Button>
   </div>
</div>
   

<div id="footer"></div>

<?php

function submit($someArray,$cid){
	require_once("config.php");
     $count=1;
	 $result = $conn->query("delete from 46_question");
 foreach ($someArray as $key => $value) {
    
	$sql='';
	
	if($value["type"]=="MCSA" || $value["type"]=="MCMA"){
		$sql="insert into ".$cid."_question (question,type,o1,o2,o3,o4,ans) values ('".$value["question"]."','".$value["type"]."','".$value["o1"]."',
	    '".$value["o2"]."','".$value["o3"]."','".$value["o4"]."','".$value["ans"]."')";
	
	}
	else if($value["type"]=="MCSA"){
		$sql="insert into ".$cid."_question (question,type,o1,o2,o3,o4,ans) values ('".$value["question"]."','".$value["type"]."','True',
	    'False','','','".$value["ans"]."')";
	}
	else{
		$sql="insert into ".$cid."_question (question,type,o1,o2,o3,o4,ans) values ('".$value["question"]."','".$value["type"]."','',
	    '','','','".$value["ans"]."')";
	}
	
	if(!$result = $conn->query($sql)){
		 $count=0;
         die('There was an error running the query [' . $conn->error . ']');
    }
  }
  if($count==1)
    echo "<script>window.location.href = window.location.href.replace(/[^/]*$/, '')+'Show_Contest.php';</script>";

}





?>

<body> 
   
   
 
</body>
</html>
</html>