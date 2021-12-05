//STICKY NAVBAR
window.onscroll = function () {
    myFunction();
};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

//VERIFICAR CONTRASEÑAS
/*function verificarPasswords() {
    // Ontenemos los valores de los campos de contraseñas
    pass1 = document.getElementById("pass1");
    pass2 = document.getElementById("pass2");

    // Verificamos si las constraseñas no coinciden
    if (pass1.value != pass2.value) {
        // Si las constraseñas no coinciden mostramos un mensaje
        document.getElementById("error").classList.add("mostrar");
        // Desabilitamos el botón de login
        document.getElementById("login").disabled = true;
        return false;
    } else {
        // Si las contraseñas coinciden ocultamos el mensaje de error
        document.getElementById("error").classList.remove("mostrar");
        // Mostramos un mensaje mencionando que las Contraseñas coinciden
        document.getElementById("ok").classList.remove("ocultar");
        return true;
    }
}*/

var check = function () {
    if (
        document.getElementById("pass1").value ==
        document.getElementById("pass2").value
    ) {
        document.getElementById("login").disabled = false;
        document.getElementById("msg").innerHTML = "Las contraseñas coinciden";
        document.getElementById("msg").style.color = "green";

    } else {
        document.getElementById("msg").style.color = "red";
        document.getElementById("msg").innerHTML = "Las contraseñas no coinciden";
        document.getElementById("login").disabled = true;
    }
};
//mostrar lista requisitos contraseña
function lista() {
    var lista = document.getElementById("passlista");
    if (lista.style.display === "block") {
        lista.style.display = "none";
    } else {
        lista.style.display = "block";
    }
}

//MULTI STEP
var currentTab = 0; // Establecemos en 0 el tab actual
showTab(currentTab); // Muestra el tab actual

function showTab(n) {
    // Esta funcion muestra el contenido del tab 
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // y controla los botones de previo y siguiente
    if (n == 0) {
        document.getElementsByClassName("prev")[0].style.display = "none";
    } else {
        document.getElementsByClassName("prev")[0].style.display = "inline";
    }
    if (n == x.length - 1) {
        document.getElementsByClassName("nextBtn")[0].style.display = "none";
    } else {
        document.getElementsByClassName("nextBtn")[0].innerHTML = "Siguiente";
        document.getElementsByClassName("nextBtn")[0].style.display = "inline";
    }
    // llama a la función para controlar el paso
    fixStepIndicator(n);
}

function nextPrev(n) {
    // Para conocer cual es el siguiente tab
    var x = document.getElementsByClassName("tab");
    console.log(x.length);
    // Si en el tab actual hay algún fallo en el formulario, sale de la función
    if (n == 1 && !validateForm()) return false;

    // Oculta el tab actual
    x[currentTab].style.display = "none";
    // Incrementa/decrementa 
    currentTab = currentTab + n;
    // En caso de ser el último tab, oculta el boton de siguiente
    if (currentTab >= x.length) {
        document.getElementsByClassName["nextBtn"].style.display = "none";
        return false;
    }
    // Muestra el tab 
    showTab(currentTab);
}

function validateForm() {
    // Esta funcion controla los input del formulario
    var x,
        y,
        i,
        valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // bucle para controlar los inputs dentro del tab
    for (i = 0; i < y.length; i++) {
        // Si está vacio
        if (y[i].value == "") {
            // añade class=invalid
            y[i].className += " invalid";
            valid = false;
        }
    }
    // Si está correcto, class=finish
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}

function fixStepIndicator(n) {
    //controla cómo se muestran los steps
    var i,
        x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}