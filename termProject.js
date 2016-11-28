/*TermProject,Group3,JavaScriptFile*/

function clearComments(textVar){
	if (textVar.value == "...") {
		textVar.value = "";
	}
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

	$(function(){
       $("#sortButton").click(function(){
       		var tags = "";
       		var sorttags=document.getElementsByName("sorttags");
       		for (var i = sorttags.length - 1; i >= 0; i--) {
       			if (sorttags[i].checked) {
       				tags = tags + "." + sorttags[i].value;
       			}
       		}
       		if(tags == ""){
       			alert("You should select at least one tag!");
       			return false;
       		}


            $(".content").hide().filter(tags).show();
        });
  	});
  	$(function(){
       $("#reset").click(function(){
       		$(".content").show();
        });
  	})
});

function addingtextbackin(textVar){
	if(textVar.value=="")
	textVar.value="...";
}