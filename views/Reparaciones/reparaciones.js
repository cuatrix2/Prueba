//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
    $('#Reparacion_form').on('submit', (e)=>{
        guardayeditarReparaciones(e);
    })
  }
  
  $().ready(() => {
    cargaTablaReparacion();
  });
  var cargaTablaReparacion = () => {
  var html = "";
  $.post(
    "../../controllers/reparaciones.controller.php?op=todos",{},(listareparaciones) => {
        listareparaciones = JSON.parse(listareparaciones);
      $.each(listareparaciones, (index,reparacion) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${reparacion.Placa}</td>` +
          `<td>${reparacion.nombre}</td>` +
          `<td>${reparacion.fecha_reparacion}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${reparacion.id_reparacion})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${reparacion.id_reparacion})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#ReparacionTabla").html(html);
    }
  );
  };
 
    var guardayeditarReparaciones = (e) => {
    e.preventDefault();
    var url = "";
    var form_Data = new FormData($("#Reparacion_form")[0]);
    var id_reparacion= document.getElementById("id_reparacion").value;
    if (id_reparacion === undefined || id_reparacion === "") {
    url = "../../controllers/reparaciones.controller.php?op=insertar";
    } else {
    url = "../../controllers/reparaciones.controller.php?op=actualizar";
    }
    for (var pair of form_Data.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
    }
    $.ajax({
    url: url,
    type: "POST",
    data: form_Data,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      respuesta = JSON.parse(respuesta);
      console.log(respuesta);
      if (respuesta == "ok") {
        Swal.fire('Categoria de reparaciones', 'Se guardo con exito','success');
        limpiar();
        cargaTablaPropietarios();
      } else {
        Swal.fire('Categoria de reparaciones', 'Ocurrio un error','danger');
      }
    },
    });
    };
    
    var uno = (id_reparacion) => {
    $.post('../../controllers/reparaciones.controller.php?op=uno', {
        id_reparacion: id_reparacion
    }, (res) => {
        res = JSON.parse(res);
        $('#id_reparacion').val(res.id_reparacion);
        $('#id_vehiculo').val(res.id_vehiculo);
        $('#id_mecanico').val(res.id_mecanico);
        $('#fecha_reparacion ').val(res.fecha_reparacion);
    })
    document.getElementById('TituloModalReparacion').innerHTML = "Editar Propietario";
    $('#modalReparacion').modal('show');
    };
    
    var eliminar = (id_reparacion) => {
    Swal.fire({
        title: 'Reparacion',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/reparaciones.controller.php?op=eliminar', {
                id_reparacion: id_reparacion
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('reparaciones', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaPropietarios();
                }
    
            })
        }
    })
    };
    
    var limpiar = () => {
        document.getElementById('id_reparacion').value = '';
        $('#id_vehiculo').val('');
        $('#id_mecanico ').val('');
        $('#fecha_reparacion ').val('');
        $('#modalReparacion').modal('hide');
        document.getElementById('TituloModalReparacion').innerHTML = "Nuevo Propietario";
      };
      
  init();