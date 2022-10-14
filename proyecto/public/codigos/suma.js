function sumar(){
    let num1=document.getElementById("hoy").value;
    let num2=document.getElementById("ayer").value;
    if(num1.length>0 && num2.length>0){
        num1=parseInt(num1);
        num2=parseInt(num2);
        let resultado= num1+num2;
        let respuesta= document.getElementById("suma");
        respuesta.innerHTML= `<label class="col-md-4 col-form-label text-md-end"> Balance Acumulado: ${resultado}</label>`

    }
}