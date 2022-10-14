function validar() {
    let a=document.getElementById("edad");
    let bot=document.getElementById("boton");
    if(parseInt(a.value) < 0 || a.value.length === 0) {
        a.style.borderColor="red";
        bot.disabled=true;
    }
    else {
        a.style.borderColor="";
        bot.disabled=false;
    }
}

function verificar() {
    let x = document.getElementById("presionArterial2");
    let boton=document.getElementById("bot");
    if(parseFloat(x.value) <= 0) {
        x.style.borderColor="red";
        boton.disabled=true;
    }
    else {
        x.style.borderColor="";
        boton.disabled=false;
    }
}