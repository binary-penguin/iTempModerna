function mostrar(id){
	if(id.type == "password"){
		id.type="text";
	}else{
		id.type="password";
	}
}

function launchModal() {
    document.getElementById("bt-modal").click();
}