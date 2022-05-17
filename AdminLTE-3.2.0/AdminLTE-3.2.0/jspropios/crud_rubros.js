//CRUD

function actionCreate(){
 let nombrerubro = document.getElementById("nombre-rubro").value;
    $.ajax({
        method:"POST",
        url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
        data: {
          rubro: nombrerubro,
          subtemas: 1,//temporal
          accion: "create"
        },
        success: function( respuesta ) {
          //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
          //alert(respuesta);
          let miObjetoJSON = JSON.parse(respuesta);
          if(miObjetoJSON.estado==1){
            toastr.success(miObjetoJSON.mensaje);
            let tabla=$("#example1").DataTable();
            let botones='<a class="btn btn-warning btn-sm" href="#"> <i class="fas fa-clock"></i>View</a>';
            botones +='<a class="btn btn-primary btn-sm" href="#"><i class="fas fa-pencil-alt"></i>Edit</a>';
            botones +='<a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Delete</a>';
            tabla.row.add([nombrerubro,"No tiene subtemas",botones]).draw().node().id="renglon_"+miObjetoJSON.id;
          }else{
            toastr.error(miObjetoJSON.mensaje);

          }
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