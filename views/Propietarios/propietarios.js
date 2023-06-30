//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
    $('#Propietarios_form').on('submit', (e)=>{
        guardayeditarPropietarios(e);
    })
  }
  
  $().ready(() => {
    cargaTablaPropietarios();
  });
  var cargaTablaPropietarios = () => {
  var html = "";
  $.post(
    "../../controllers/propietarios.controller.php?op=todos",{},(listapropietarios) => {
        listapropietarios = JSON.parse(listapropietarios);
      $.each(listapropietarios, (index,propietario) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${propietario.nombre}</td>` +
          `<td>${propietario.cedula}</td>` +
          `<td>${propietario.Placa}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${propietario.id_propietario})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${propietario.id_propietario})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#PropietarioTabla").html(html);
    }
  );
  };
 
    var guardayeditarPropietarios = (e) => {
    e.preventDefault();
    var url = "";
    var form_Data = new FormData($("#Propietarios_form")[0]);
    var id_propietario= document.getElementById("id_propietario").value;
    if (id_propietario === undefined || id_propietario === "") {
    url = "../../controllers/propietarios.controller.php?op=insertar";
    } else {
    url = "../../controllers/propietarios.controller.php?op=actualizar";
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
        Swal.fire('Categoria de Propietarios', 'Se guardo con exito','success');
        limpiar();
        cargaTablaPropietarios();
      } else {
        Swal.fire('Categoria de Propietarios', 'Ocurrio un error','danger');
      }
    },
    });
    };
    var cargaselect = () => {
      var htmlplaca = '<option value="0">Seleccione una Opción</option>';    
      // Corregir la URL de la solicitud POST
      $.post("../../controllers/vehiculos.controller.php?op=todos", {}, (listaplacas) => {
        listaplacas = JSON.parse(listaplacas);
        $.each(listaplacas, (index, vehiculo) => {
          htmlplaca += `<option value="${vehiculo.id_vehiculo}">${vehiculo.Placa}-M:${vehiculo.Modelo}</option>`;
        });
        $("#id_vehiculo").html(htmlplaca);
      });
    };
    var uno = (id_propietario) => {
    $.post('../../controllers/propietarios.controller.php?op=uno', {
        id_propietario: id_propietario
    }, (res) => {
        res = JSON.parse(res);
        $('#id_propietario').val(res.id_propietario);
        $('#nombre').val(res.nombre);
        $('#cedula').val(res.cedula);
        $('#id_vehiculo ').val(res.id_vehiculo);
    })
    document.getElementById('TituloModalPropietario').innerHTML = "Editar Propietario";
    $('#modalPropietario').modal('show');
    };
    
    var eliminar = (id_propietario) => {
    Swal.fire({
        title: 'Propietario',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/propietarios.controller.php?op=eliminar', {
                id_propietario: id_propietario
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Propietario', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaPropietarios();
                }
    
            })
        }
    })
    };
    
    var limpiar = () => {
        document.getElementById('id_propietario').value = '';
        $('#nombre').val('');
        $('#cedula').val('');
        $('#id_vehiculo ').val('');
        $('#modalPropietario').modal('hide');
        document.getElementById('TituloModalPropietario').innerHTML = "Nuevo Propietario";
      };
      
  init();