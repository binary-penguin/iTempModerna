function mostrar(){
	x=document.getElementById("c_contra");
	if(x.type == "password"){
		x.type="text";
	}else{
		x.type="password";
	}
}

function launchModal() {
    document.getElementById("bt-modal").click();
}