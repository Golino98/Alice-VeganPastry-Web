function showPasswordLogin() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

function showPasswordRegister() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

function showPasswordRepeatRegister() {
    var passwordField = document.getElementById("conf_password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}


function checkMatchPassword() {
    password = $("#password").val();
    passwordMessage = $("#invalid-formatPassword");
    repeatPassword = $("#conf_password").val();
    repeatPasswordMessage = $("#invalid-repeatPassword");
    submitRegister = $("#Register");
    error1 = false;
    error2 = false;

    if (password.length < 8) {
        passwordMessage.html("La password deve essere lunga almeno 8 caratteri");
        passwordMessage.css("color", "red");
        error1 = true;
    } else {
        passwordMessage.html("Lunghezza della password corretta");
        passwordMessage.css("color", "green");
        error1 = false;
    }

    if (password === repeatPassword) {
        repeatPasswordMessage.html("Le due password corrispondono");
        repeatPasswordMessage.css("color", "green");
        error2 = false;
    } else {
        repeatPasswordMessage.html("Le due password non corrispondono");
        repeatPasswordMessage.css("color", "red");
        error2 = true;
    }

    if (!error1 && !error2) {
        $("#Register").prop("disabled", false);
        console.log("submit enabled");
    }

    error = error1 || error2;
    return error;
}