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