$ = jQuery;

if($('.videoModal')[0]){
	new ModalVideo('.videoModal');
}

var modalLogin = () => {
	$(".errorForm").html("");
	$("#formRecovery").css("display","none");
	$("#loginRecovery").css("display","none");

	$("#formLogin").css("display","block");
	$("#recoveryLogin").css("display","block");

	$('#modalLogin').modal({backdrop: 'static', keyboard: false})
};

var recoryPassword = () => {
	$(".errorForm").html("");
	$("#recoveryLogin").css("display","none");
	$("#formLogin").css("display","none");

	$("#formRecovery").css("display","block");
	$("#loginRecovery").css("display","block");
};

$(document).ready(function () {
	$("#volverLogin").click(function () {
		$(".errorForm").html("");
		$("#formRecovery").css("display","none");
		$("#loginRecovery").css("display","none");

		$("#formLogin").css("display","block");
		$("#recoveryLogin").css("display","block");

	});
});

