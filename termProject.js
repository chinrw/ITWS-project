/*TermProject,Group3,JavaScriptFile*/

function clearComments(textVar){
	textVar.value="";
}

$(document).ready(function(){
	$('.flag').click(function(){
		if ($(this).hasClass("flagged")){
			$(this).html("Flag");  
		}

		else{
			$(this).html("Flagged")
		}

	$(this).toggleClass("flagged");
	});
});

function addingtextbackin(textVar){
	if(textVar.value=="")
	textVar.value="...";
}
	
function saveUserInfo()
{

	var url = "submitcomment.php";


	var comments = document.getElementById("comments").value;
	//var tags = document.getElementById("tag").value;
	
	var postStr   = "comments="+ comments;

	//var ajax = InitAjax();

	var ajax = false;
	// init XMLHttpRequest object
    if(window.XMLHttpRequest) 
	{ 	//Mozilla 
        ajax = new XMLHttpRequest();
    	if (ajax.overrideMimeType) 
		{	
            ajax.overrideMimeType("text/xml");
   		}
 	}
    else if (window.ActiveXObject) 
	{ 	// IE
        try 
		{
        	ajax = new ActiveXObject("Msxml2.XMLHTTP");
        } 
		catch (e) 
		{
        	try 
			{
            	ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } 
			catch (e) {}
		}
	}
    if (!ajax) 
	{ 	// exceptions
        window.alert("Initialize XMLHttpRequest object instance failed.");
        return false;
	}
                
	ajax.open("POST", url, false);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	ajax.send(postStr);
	alert("Success!");
	//document.getElementById('comments').innerHTML='';
	//document.getElementById("myForm").reset(); 

	ajax.onreadystatechange = function() 
	{ 
   		if (ajax.readyState == 4 && ajax.status == 200) 
		{ 
    		
			msg.innerHTML = ajax.responseText; 
   		} 
	} 
	
}
