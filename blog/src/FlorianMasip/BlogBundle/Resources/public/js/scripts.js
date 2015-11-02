function toggleClass(obj,_class){

	$(obj).toggleClass(_class);
}

function addClass(obj,_class){

	$(obj).addClass(_class);
}

function removeClass(obj,_class){

	$(obj).removeClass(_class);
}


$(document).ready(function(){

	$('#post').elastic();

});