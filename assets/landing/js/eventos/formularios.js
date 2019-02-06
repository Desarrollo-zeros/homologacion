
/*Formulario login*/
$("#formLogin").on("submit",function (form) {
	form.preventDefault();
	$(".loader").css("display","block");
	$(".errorForm").html("");
	var obj = {};
	obj.username = $("#username").val();
	obj.password = $("#password").val();
	sendPost($urlAjax+"login",obj)
		.then(data => {
			$(".loader").css("display","none");
			if(data.status){
				localStorage.users_id = data.data["user"]["users_id"];
				window.location.href =  data.data["user"]["url"];
				console.log("bien");
			}else{
				$(".errorForm").html(data.data["error"]);
			}
		})
		.catch(error => console.error(error));
});


$("#formRecovery").on("submit",function (form) {
	form.preventDefault();
	$(".errorForm").html("");
	$(".loader").css("display","block");
	var obj = {};
	obj.username = $("#usernameRecory").val();
	sendPost($urlAjax+"recoveryPassword",obj).then(data => {
		$(".loader").css("display","none");
		if(data.status){
			$(".errorForm").html(data.data["success"]);
		}else{
			$(".errorForm").html(data.data["error"]);
		}
	});
});





