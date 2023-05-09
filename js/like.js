function likes_p(argument) {
	jQuery("#like").addClass("like");
	jQuery("#liketo").addClass("like");
}function likes_np(argument) {
	jQuery("#like").removeClass("like");
	jQuery("#liketo").removeClass("like");
}
function like(argument) {
	
	
	var like = jQuery("#like").attr("like-count");
	var url = jQuery("#like").attr("url");
	var arti = parseInt(like)+1;
	var eksi = jQuery("#like").attr("user-like");
	jQuery.ajax({
		url:"likes.php",
		type:"POST",
		data:'seo='+url,
		success:function (cevap) {
			if (cevap == "like") {
				likes_p();
				
				jQuery("#like").html('Beğendin: '+arti);
				
				
			}else{
				likes_np();

				var like = jQuery("#like").attr("like-count",eksi);

				jQuery("#like").html('Beğen: '+eksi);
				

			}
		}
		

	});


}