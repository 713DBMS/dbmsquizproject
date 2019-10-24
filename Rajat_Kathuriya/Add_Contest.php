<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
<link rel="stylesheet" href="mycss.css">

<?php
//$var=5;
//echo var;
//$_SESSION['varname'] = ans;
?>


</head>
<body> 
   
   
 
   
   <div id="hel"></div> 
   
  
  <div id="parent" style="width:50%;align:center;margin:30px">
	 
	<form  method="post" id="register_form">
 

    <div class="form-group">
      <label for="organ">Test Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Test Name" name="uname" required>
    </div>

    <div class="form-group">
      <label for="email">Start Date and Time:</label>
      <input type="datetime-local" class="form-control" id="email" placeholder="Enter Start Date and Time" name="email" required />
    </div>

       <div class="form-group">
      <label for="pass">End Date and Time:</label>
      <input type="datetime-local" class="form-control" id="pass" placeholder="Enter End Date and Time" name="pass" required />
      </div>

         <div class="form-group">
      <label for="pass">Image</label>
      <input type="file" class="form-control" id="_pass" placeholder="Select Image" name="_pass" required />
      </div>
  

    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required /> I agree on <a href="tc.htm"> terms and conditions</a>
      </label>
    </div>
    <input type="submit" name="submit" id="submit" value="&nbsp;Submit&nbsp;" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
  </form>

   </div>
  
   
   
<script>


</script>   

</body>

</html>
</html>