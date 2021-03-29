function mostrar(){
	x=document.getElementById("c_contra");
	if(x.type == "password"){
		x.type="text";
	}else{
		x.type="password";
	}
}

function iniciar_sesion(){
	usr=document.login.c_usuario.value;
	contra=document.login.c_contra.value;
	if ((usr=="Jemuel") && (contra=="perro")){
		alert("Ingresar")
		location.href="file:///Users/jemuelflores/Documents/jemuel/Proyecto_moderna/iTempModerna/View/inicio.html"
	}else{
		alert("Contraseña incorrecta");
	}
}

function launchModal() {
    document.getElementById("bt-modal").click();
}