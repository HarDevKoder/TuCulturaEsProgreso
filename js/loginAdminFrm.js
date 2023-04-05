function abrir(){
    document.getElementById("loginAdminContainer").style.display="block";
}

function cerrar(){
    document.getElementById("loginAdminContainer").style.display="none";
}

function limpiar() {
    setTimeout('document.login.reset()',2);
    return false;
}