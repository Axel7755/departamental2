//CRUD
let idEliminar=0;
function actionCreate(){
 let nombrerubro = document.getElementById("nombre-rubro").value;

 let tsubtemas = 0;
 if($("#si_subtemas").is(":checked")){
  tsubtemas = 1;
  }else{
    tsubtemas = 0;
  }
    $.ajax({
        method:"POST",
        url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
        data: {
          rubro: nombrerubro,
          subtemas: tsubtemas,//temporal
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
            botones +=' <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-actualizar-rubro" href="#" onclick="identificaActualizar('+miObjetoJSON.id+');"><i class="fas fa-pencil-alt"></i>Edit</a>';
            botones +=' <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Eliminar" href="#" onclick="identificaEliminar('+miObjetoJSON.id+');"><i class="fas fa-trash"></i>Delete</a>';
            if(tsubtemas==1){
              tabla.row.add([nombrerubro,"si tiene subtemas",botones]).draw().node().id="renglon_"+miObjetoJSON.id;
            }else{
            tabla.row.add([nombrerubro,"No tiene subtemas",botones]).draw().node().id="renglon_"+miObjetoJSON.id;
            }
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
            botones +=' <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-actualizar-rubro" href="#" onclick="identificaActualizar('+rubro.id+');"><i class="fas fa-pencil-alt"></i>Edit</a>';
            botones +=' <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Eliminar" href="#" onclick="identificaEliminar('+rubro.id+');"><i class="fas fa-trash"></i>Delete</a>';
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
      //alert(respuesta);
    }
  });
}

function actioUpdate(){

  let nombreActualizar = document.getElementById('nombre-rubro-actualizar').value;
  let tsubtemas = 0;
 if($("#si_subtemas_actualizar").is(":checked")){
  tsubtemas = 1;
}else{
  tsubtemas = 0;
}
  $.ajax({
    method:"POST",
    url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
    data: {
      id: idEliminar,
      rubro: nombreActualizar,
      subtemas:  tsubtemas,
      accion: "update"
    },
    success: function( respuesta ) {
      //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
      let miObjetoJSON = JSON.parse(respuesta);
      if(miObjetoJSON.estado==1){
        let tabla=$("#example1").DataTable();        
        //tabla.row("#renglon_"+idEliminar).refrsh().draw();
        let temp = tabla.row("#renglon_"+idEliminar).data();
        temp[0]=nombreActualizar;
        if(tsubtemas==1){
          temp[1]="Tiene subtemas";
        }else{
          temp[1]="No tiene subtemas";
        }
        
        tabla.row("#renglon_"+idEliminar).data(temp).draw();
        toastr.success(miObjetoJSON.mensaje);
      }else{
        toastr.error(miObjetoJSON.mensaje)
      }
      
    }
  });
}
function actionDelete(){
  $.ajax({
    method:"POST",
    url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
    data: {
      id: idEliminar,
      accion: "delete"
    },
    success: function( respuesta ) {
      //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
      let miObjetoJSON = JSON.parse(respuesta);
      if(miObjetoJSON.estado==1){
        let tabla=$("#example1").DataTable();        
        tabla.row("#renglon_"+idEliminar).remove().draw();
        toastr.success(miObjetoJSON.mensaje);
      }else{
        toastr.error(miObjetoJSON.mensaje)
      }
      
    }
  });
}

function identificaEliminar(id){
  //alert(id);
  idEliminar=id;
}

function identificaActualizar(id){
  //alert(id);
  idEliminar=id;
  $.ajax({
    method:"POST",
    url: "../AdminLTE-3.2.0/AdminLTE-3.2.0/phppropios/crud-rubros.php",
    data: {
      id: idEliminar,
      accion: "id_read"
    },
    success: function( respuesta ) {
      //$( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
      let miObjetoJSON = JSON.parse(respuesta);
      if(miObjetoJSON.estado==1){
        //Mostrar en la ventana los datos recuperados del servidor
        let nombreActualizar = document.getElementById('nombre-rubro-actualizar');
        nombreActualizar.value = miObjetoJSON.nombre_rubro;
        if(miObjetoJSON.subtemas==1){
          $("#si_subtemas_actualizar").prop("checked", true);
        }else{
          $("#no_subtemas_actualizar").prop("checked", true);
        }
        toastr.success(miObjetoJSON.mensaje);
      }else{
        toastr.error(miObjetoJSON.mensaje)
      }
      
    }
  });
}