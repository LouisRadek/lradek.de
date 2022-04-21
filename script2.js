const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
loginForm.style.marginLeft = "-50%";
loginText.style.marginLeft = "-50%";
signupBtn.click();
signupBtn.onclick = (()=>{
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
    signupBtn.click();
    return false;
});

var state = false;
var state2 = false;
var state3 = false;
function toggle() {
    if (state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye-svg").style.filter="invert(100%) sepia(0%) saturate(7496%) hue-rotate(76deg) brightness(114%) contrast(97%)";
        state = false;
    } else {
        document.getElementById("password").setAttribute("type" ,"text");
        document.getElementById("eye-svg").style.filter="invert(34%) sepia(13%) saturate(5915%) hue-rotate(229deg) brightness(86%) contrast(90%)";
        state = true;
    }
}

function toggle2() {
    if (state2) {
        document.getElementById("password2").setAttribute("type", "password");
        document.getElementById("eye2-svg").style.filter="invert(100%) sepia(0%) saturate(7496%) hue-rotate(76deg) brightness(114%) contrast(97%)";
        state2 = false;
    } else {
        document.getElementById("password2").setAttribute("type" ,"text");
        document.getElementById("eye2-svg").style.filter="invert(34%) sepia(13%) saturate(5915%) hue-rotate(229deg) brightness(86%) contrast(90%)";
        state2 = true;
    }
}

function toggle3() {
    if (state3) {
        document.getElementById("password3").setAttribute("type", "password");
        document.getElementById("eye3-svg").style.filter="invert(100%) sepia(0%) saturate(7496%) hue-rotate(76deg) brightness(114%) contrast(97%)";
        state3 = false;
    } else {
        document.getElementById("password3").setAttribute("type" ,"text");
        document.getElementById("eye3-svg").style.filter="invert(34%) sepia(13%) saturate(5915%) hue-rotate(229deg) brightness(86%) contrast(90%)";
        state3 = true;
    }
}