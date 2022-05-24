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
            botones +='< a class="btn btn-primary btn-sm" href="#"><i class="fas fa-pencil-alt"></i>Edit</a>';
            botones +='< a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Delete</a>';
            tabla.row.add([nombrerubro,"No tiene subtemas",botones]).draw().node().id="renglon_"+miObjetoJSON.id;
          }else{
            toastr.error(miObjetoJSON.mensaje);

          }
        }
      });
    //alert("crear nueva categoria");
}
function actionRead(){
  $.ajax({
    method:"POST",
    url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
    data: {
      accion: "read"
    },
    success: function( respuesta ) {
      //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
      let miObjetoJSON = JSON.parse(respuesta);
      if(miObjetoJSON.estado==1){

        let tabla=$("#example1").DataTable();

        miObjetoJSON.rubros.forEach(rubro => {
          let botones='<a class="btn btn-warning btn-sm" href="#"> <i class="fas fa-clock"></i>View</a>';
            botones +=' <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-pencil-alt"></i>Edit</a>';
            botones +=' <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Eliminar" href="#" oneclik="actionDelete('+rubro.id+')"><i class="fas fa-trash"></i>Delete</a>';
          rubro.id
          rubro.nombre_rubro
          rubro.subtemas
          if(rubro.subtemas==1){
            tabla.row.add([rubro.nombre_rubro,'Tiene subtemas',botones]).draw().node().id="renglon_"+rubro.id;
          }else{
          tabla.row.add([rubro.nombre_rubro,'no tiene subtemas',botones]).draw().node().id="renglon_"+rubro.id;
        }
        });
      }
      alert(respuesta);
    }
  });
}

function actioUpdate(){

}
function actionDelete(){
  alert(id);
}