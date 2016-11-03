/*TermProject,Group3,JavaScriptFile*/

function clearComments(textVar){
	textVar.value="";
}

function flagPost(){
	alert("This post has been flagged,thank you for your input.");
	document.getElementsByClassName("flag").style.color = "#ff0000";
}

function addingtextbackin(textVar){
	if(textVar.value=="")
		textVar.value="...";
}
	

