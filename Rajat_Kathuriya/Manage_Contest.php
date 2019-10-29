<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
<link rel="stylesheet" href="mycss.css">


</head>
<body> 

<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


   <div>
     <h3> Administration </h1>
	 <div>
	 <table width="100%">
	    <tr>
		   <th> Contest Name </th>
		   <th> Start Date & Time </th>
		   <th> End Date & Time </th>
		   <th> Total Participants </th>
		</tr>
	 </table>
	 </div>
   </div>

    	 
 
</body>
</html>
</html>