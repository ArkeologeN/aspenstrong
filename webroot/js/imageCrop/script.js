$(document).ready(function(){
	$("#file").change(function(e){
		var img = e.target.files[0];
        //alert(img.src);
		if(!iEdit.open(img, true, function(res){ 
			$("#result").attr("src", res);
			$("#file2").attr('value',res); 
			//alert(res);			
		})){
			alert("Whoops! That is not an image!");
		}

	});
});