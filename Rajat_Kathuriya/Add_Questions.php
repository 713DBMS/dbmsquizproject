<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
<link rel="stylesheet" href="mycss.css">
<script>
//var x = myFunction(4, 3);
var x=0;


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
       answ: "",
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


function validate(){
	for(var i=0;i<x;i++)
	{
    //alert('here'+i);   
	itm = document.getElementById(i);
 
	list[i].Question=itm.querySelector("#Ques").value;
	
    if (list[i].type=="MCSA")
    {
		list[i].o1=itm.querySelector("#o1").value;
	    list[i].o2=itm.querySelector("#o2").value;
    	list[i].o3=itm.querySelector("#o3").value;
	    list[i].o4=itm.querySelector("#o4").value;
		var answer = document.getElementsByName('mcq');
		
        var ans_value="";
        for(var j = 0; j < answer.length; j++){
             if(answer[j].checked){
                 ans_value = answer[j].value;
             }
        }
		//alert("hi");
		list[i].answ=ans_value;
		//list[i].o1=;
		//alert("hiiii");
	    if(list[i].o1==""
	      || list[i].o2==""
	      || list[i].o3==""
	      || list[i].o4=="")
		return false;
	
	}
    if (list[i].type=="MCMA") 
    {    
        list[i].o1=itm.querySelector("#o1").value;
	    list[i].o2=itm.querySelector("#o2").value;
        list[i].o3=itm.querySelector("#o3").value;
	    list[i].o4=itm.querySelector("#o4").value;
		var ans_value="";
        
		if(itm.querySelector("#anso1").checked)
			ans_value+= itm.querySelector("#anso1").value+",";
		if(itm.querySelector("#anso2").checked)
			ans_value+= itm.querySelector("#anso2").value+",";
		if(itm.querySelector("#anso3").checked)
			ans_value+= itm.querySelector("#anso3").value+",";
		if(itm.querySelector("#anso4").checked)
			ans_value+= itm.querySelector("#anso4").value+",";
		list[i].answ=ans_value;
		
		if(list[i].o1==""
	      || list[i].o2==""
	      || list[i].o3==""
	      || list[i].o4=="")
		return false;
	
	
    }
	else if (list[i].type=="TF") 
    {
        list[i].o1=itm.querySelector("#o1").value;
	    list[i].o2=itm.querySelector("#o2").value;
		var answer = document.getElementsByName('bool');
        var ans_value="";
        for(var j = 0; j < answer.length; j++){
             if(answer[j].checked){
                 ans_value = answer[j].value;
             }
        }
		list[i].answ=ans_value;
		
		if(list[i].o1==""
	      || list[i].o2=="")
		return false;
	
    }
	else if (list[i].type=="AA") 
    {
        list[i].answ=itm.querySelector("#ans").value;    
    }
	
    if(list[i].Question==""
	|| list[i].answ=="")
		return false;
	
	
	
  }
  return true;
}


function submit(){
  
  
  if(!validate()){
	  alert("Please Fill All Fields to Continue.");
	  return 0;
  }
  
  
var op=document.getElementById("op");
var ans="";   
/*for(var i=0;i<x;i++){
    ans+=list[i].Question+"<br/>";
	ans+=list[i].o1+"<br/>";
	ans+=list[i].o2+"<br/>";
	//alert("Now");
	
    if (list[i].type=="MCSA")
    {
    	ans+=list[i].o3+"<br/>";
	    ans+=list[i].o4+"<br/>";
	
	}
    if (list[i].type=="MCMA") 
    {
        ans+=list[i].o3+"<br/>";
	    ans+=list[i].o4+"<br/>";
	
    }
	if (list[i].type=="TF") 
    {
        
    }
	if (list[i].type=="AA") 
    {
        ans+=list[i].ans+"<br/>";
    }
}
*/
/*var queryString = Object.keys(ans).map(function(key) {
    return key + '=' + ans[key]
}).join('&');*/
var myJSON = JSON.stringify(list);
op.innerHTML=ans;


//var href=window.location.href;
window.location.href = window.location.href.replace(/[^/]*$/, '')+'preview.php?js_test='+myJSON;
   
}



</script>

<?php
//$var=5;
//echo var;
//$_SESSION['varname'] = ans;
?>


</head>
<body> 
   
   
 
   
   <div id="hel"></div> 
   
  
  <div id="hide">
  
   <div id="MCSA">
	<label>Enter Question</label>  
	<br/>
	<input type="text" id="Ques" class="maintext"/>
	<br/>
	
      
    <input type="radio" name="mcq" value="a"/>
	<label>A. </label>
	<input type="text" class="subtext" id="o1"/>
	<br/>   
    
	<input type="radio" name="mcq" value="b"/>
	<label>B. </label>
	<input type="text" class="subtext" id="o2"/>
	<br/>
	
	<input type="radio" name="mcq" value="c"/>
	<label>C. </label>
	<input type="text" class="subtext" id="o3"/>
	<br/>
	
	<input type="radio" name="mcq" value="d"/>
	<label id="demo" >D.</label>
	<input type="text" class="subtext" id="o4"/>
	<br/>
	<br/>
	<br/>
   </div>
   	

    <div id="MCMA">
	<label>Enter Question</label>  
	<br/>
	<input type="text" class="maintext" id="Ques" name="Ques"/>
	<br/>
	
      
    <input type="checkbox" id="anso1" value="a"/>
	<label>A. </label>
	<input type="text" class="subtext" id="o1"/>
	<br/>   
    
	<input type="checkbox" id="anso2" value="b"/>
	<label>B. </label>
	<input type="text" class="subtext" id="o2"/>
	<br/>
	
	<input type="checkbox" id="anso3" value="c"/>
	<label>C. </label>
	<input type="text" class="subtext" id="o3"/>
	<br/>
	
	<input type="checkbox" id="anso4" value="d"/>
	<label>D.</label>
	<input type="text" class="subtext" id="o4"/>
	<br/>
	<br/>
	<br/>
   </div>
   
   <div id="TF">
	<label>Enter Question</label>  
	<br/>
	<input type="text" class="maintext" id="Ques" name="Ques"/>
	<br/>
	
      
    <input type="radio" name="bool" id="o1" value="True"/>
	<label>True </label>
	
	<br/>   
    
	<input type="radio" name="bool" id="o2" value="False"/>
	<label>False </label>
	
	<br/>
	<br/>
	<br/>
   </div>

   <div id="AA">
	<label>Enter Question</label>  
	<br/>
	<input type="text" class="subtext" id="Ques" name="Ques"/>
	<br/>
	
      
    <label>Enter Answer  </label>
	<br/>
	<input type="text" class="subtext" id="ans"/>
	<br/>   
    <br/>
	<br/>
   </div>   
   
   </div>
   
  
 <form method="get" name="form" action="destination.php">  
  <div id="parent">
  </div>
 
 </form>  
   
   
   
   
   
   
   <select id="type" class="subtext" style="width:160px">  
    <option value="MCSA">Multiple Choice,Single Answer Question</option>
    <option value="MCMA">Multiple Choice,Multiple Answer Question</option>	
    <option value="TF">True/False Question</option>  
    <option value="AA">Add Answer Type</option>  
   </select> 
   <br/>
   <br/>
   <Button onclick="myFunction()" class="btn btn-primary"> ADD NEW </Button>
   
   
   
   <Button onclick="submit()" class="btn btn-primary"> Submit </Button>
   
   <label id="op">  </label>
   
<script>
document.getElementById("hide").style.display = "none";



</script>   

</body>

</html>
</html>