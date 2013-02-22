function adm_login()
{
	url=CI_ROOT+"login/login_admin";
	data=_.gf("login");
	_.pj(url,data,"login_respuesta");
}

function login_respuesta(data)
{
	console.log(data);
}