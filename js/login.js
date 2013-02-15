function login()
{
	url=CI_ROOT+"login/";
	data=getform("login");
	$.post(url,a,
	function(data){
			if(data.login){window.location.reload();}
			else{alert("Error! Intente nuevamente.");}
		},
		"json");
	$("#cambio_clave").reset();
}