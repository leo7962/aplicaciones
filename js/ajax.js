$.ajax({
		url: "respuesta.php",
		type: "post",
		data: { js},
		success: function (result) {
		 $(".saludo").html(result);
		 alert("envio")
		}
		});
