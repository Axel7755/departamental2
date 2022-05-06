aux=0;
let display = document.getElementById("display");

function agregarDijito(dijito){
    if(aux==0){
        display.value = dijito;
        aux=1;
    }else{
        display.value = display.value+dijito;
    }
    /*let num2 = document.getElementById("num2").value;
    let suma = num1 / num2;
    alert("La suma es: "+suma);*/
}
function Clear(){
    display.value = 0;
    aux=0;
}
function CalcularResultado(){
    display.value = eval(display.value);
    aux=0;
}
function Potencia(){
    let exponente = document.getElementById("elevar_potencia").value;
    display.value = Math.pow(display.value,exponente);
}
function Raiz(){
    display.value = Math.sqrt(display.value);
}
function Factorial(){
    var total = 1; 
	for (i=1; i<=display.value; i++) {
		total = total * i; 
	}
    display.value = total; 
}
function LogN(){
    display.value = Math.log(display.value);
}