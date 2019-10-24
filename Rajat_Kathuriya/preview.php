<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
<link rel="stylesheet" href="mycss.css">
<script>
//var x = myFunction(4, 3);
var x=0;

var Ques = {
  Question: "",
  o1: "",
  o2: "",
  o3: "",
  o4: "",
  ans: "",
  type: "",
};

var list=[];
var e = document.getElementById("type");
function myFunction() {
    var itm;
	var cln;
    var e = document.getElementById("type");
    var str = e.options[e.selectedIndex].value;
    var q={
       Question: "",
       o1: "",
       o2: "",
       o3: "",
       o4: "",
       ans: "",
       type: ""
    };
	q.type=str;
    //alert(str);

    if (str=="MCSA")
    {  
        itm = document.getElementById("MCSA");
		
    }
    if (str=="MCMA") 
    {
        itm = document.getElementById("MCMA");
    }
	if (str=="TF") 
    {
        itm = document.getElementById("TF");
    }
	if (str=="AA") 
    {
        itm = document.getElementById("AA");
    }
	cln = itm.cloneNode(true);
	cln.id=x;
	cln.name=x;
	x++;
	list.push(q);
    document.getElementById("parent").appendChild(cln);

}





function submit(){

  for(var i=0;i<x;i++){
    //alert('here'+i);   
	itm = document.getElementById(i);

	list[i].Question=itm.querySelector("#Ques").value;
	list[i].o1=itm.querySelector("#o1").value;
	list[i].o2=itm.querySelector("#o2").value;
	
    if (list[i].type=="MCSA")
    {
    	list[i].o3=itm.querySelector("#o3").value;
	    list[i].o4=itm.querySelector("#o4").value;
	
	}
    if (list[i].type=="MCMA") 
    {
        list[i].o3=itm.querySelector("#o3").value;
	    list[i].o4=itm.querySelector("#o4").value;
	
    }
	if (list[i].type=="TF") 
    {
        
    }
	if (list[i].type=="AA") 
    {
        list[i].ans=itm.querySelector("#ans").value;
    }
	
  }


var op=document.getElementById("op");
var ans="";   
for(var i=0;i<x;i++){
    ans+=list[i].Question+"<br/>";
	ans+=list[i].o1+"<br/>";
	ans+=list[i].o2+"<br/>";
	//alert("Now");
	
    if (list[i].type=="MCSA")
    {
    	ans+=list[i].o3+"<br/>";
	    ans+=list[i].o4+"<br/>";
	
	}
    if (list[i].type==="MCMA") 
    {
        ans+=list[i].o3+"<br/>";
	    ans+=list[i].o4+"<br/>";
	
    }
	if (list[i].type==="TF") 
    {
        
    }
	if (list[i].type==="AA") 
    {
        ans+=list[i].ans+"<br/>";
    }
}

op.innerHTML=ans;
//var href=window.location.href;
window.location.href = window.location.href.replace(/[^/]*$/, '')+'new.php?js_test='+ans;
   
}



</script>

<?php
$var=$_GET["js_test"];
 $someArray = json_decode($var, true);
 $count=1;
 foreach ($someArray as $key => $value) {
    echo $count.". ".$value["Question"]. "<br>";
	if($value["type"]=="MCSA" || $value["type"]=="MCMA"){
	echo "(a). ".$value["o1"] . "<br>";
	echo "(b). ".$value["o2"] . "<br>";
	echo "(c). ".$value["o3"] . "<br>";
	echo "(d). ".$value["o4"] . "<br>";
	}
	echo "Ans- ".$value["answ"] . "<br><br>";
	$count++;
  }

 
 print_r($someArray);  
echo $var;
//$_SESSION['varname'] = ans;
?>


</head>
<body> 
   
   
 
</body>
</html>
</html>