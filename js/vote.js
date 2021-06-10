
var ratedIndex = -1;

function resetColors(){
	$(".rps i").css("color", "#ccc");
}

function setStars(max){
	for( var i=0; i<=max; i++){
		$(".rps i:eq(" + i + ")").css("color", "#fe9727");
	}
}

$(document).ready(function() {
	$(".rpc i, .review-bg").click(function(){
		$(".review-modal").fadeOut();
	})
	$(".opmd").click(function(){
		$(".review-modal").fadeIn();
	})

	resetColors();

	$(".rps i").mouseover(function(){
		resetColors();
		var currenIndex = parseInt($(this).data("index"));
		setStars(currenIndex);
	})

	$(".rps i").on("click", function(){
		ratedIndex = parseInt($(this).data("index"));
		localStorage.setItem("rating", ratedIndex);
		$(".starRateV").val(parseInt(localStorage.getItem("rating")));
	})

	$(".rps i").mouseleave(function(){
		resetColors();
		if(ratedIndex != -1){
			setStars(ratedIndex);
		}
	})

	if(localStorage.getItem("rating") !=null){
		setStars(parseInt(localStorage.getItem("rating")));
		$(".starRateV").val(parseInt(localStorage.getItem("rating")));
	}
	//không nhập email or cmt
	// $(".rpbtn").click(function(){
	// 	if(localStorage.getItem("rating") ==null){
	// 		alert("Vui lòng đánh giá");
	// 		$(".rate-error").html("Bạn chưa đánh giá!");
	// 	}
	// 	else if($(".raterName").val() ==''){
	// 		$(".rate-error").html("Vui lòng nhập email!");
	// 	}
	// 	else if($("#rate-field").val() ==''){
	// 		$(".rate-error").html("Vui lòng nhập bình luận!");
	// 	}
	// 	else{
	// 		$(".rate-error").html("");

	// 		var $form = $(this).closest(".rmp");
	// 		// var starRate = $form.find(".starRateV").val();
	// 		// var rateMsg = $form.find(".rateMsg").val();
	// 		// var date = $form.find(".rateDate").val();
	// 		// var name = $form.find(".raterName").val();

	// 		// $.ajax({
	// 		// 	url: "details.php",
	// 		// 	type: "POST",
	// 		// 	data: {
	// 		// 		starRate: starRate,
	// 		// 		rateMsg: rateMsg,
	// 		// 		date: date,
	// 		// 		name: name
	// 		// 	},
	// 		// 	success: function(data){
	// 		// 		console.log(data);
	// 		// 	}
	// 		// })
	// 	}
	// })

})