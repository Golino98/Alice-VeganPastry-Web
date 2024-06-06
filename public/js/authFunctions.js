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
    passwordRegexMessage = $("#invalid-regexPassword");
    repeatPassword = $("#conf_password").val();
    repeatPasswordMessage = $("#invalid-repeatPassword");
    submitRegister = $("#Register");
    error1 = false;
    error2 = false;
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{1,}$/;
    

    if (password.length < 8) {
        passwordMessage.html("La password deve essere lunga almeno 8 caratteri");
        passwordMessage.css("color", "red");
        error1 = true;
    } else {
        passwordMessage.html("Lunghezza della password corretta");
        passwordMessage.css("color", "green");
        error1 = false;
    }

    
    if (!passwordRegex.test(password)) {
        passwordRegexMessage.html("La password deve contenere almeno 1 lettera maiuscola, 1 numero e 1 carattere speciale");
        passwordRegexMessage.css("color", "red");
        error1 = true;
    } else {
        passwordRegexMessage.html("Caratteri necessari presenti");
        passwordRegexMessage.css("color", "green");
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