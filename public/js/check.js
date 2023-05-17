// Inserire funzione

function checkPsw()
{
    var psw = document.getElementById("password").value;
    var psw2 = document.getElementById("confirm_password").value;
    if (psw != psw2) {
        alert("Le password non coincidono");
    }
}