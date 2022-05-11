//CRUD

function actionCreate(){
 let nombrerubro = document.getElementById("nombre-rubro").value;
    $.ajax({
        method:"POST",
        url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
        data: {
          rubro: nombrerubro
        },
        success: function( respuesta ) {
          //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
          alert(respuesta);
        }
      });
    //alert("crear nueva categoria");
}
function actionRead(){

}

function actioUpdate(){

}
function actionDelete(){

}