//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
    $('#Vehiculos_form').on('submit', (e)=>{
        guardayeditarAutos(e);
    })
  }
  
  $().ready(() => {
  cargaTablaAutos();
  });
  var cargaTablaAutos = () => {
  var html = "";
  $.post(
    "../../controllers/vehiculos.controller.php?op=todos",{},(listavehiculos) => {
        listavehiculos = JSON.parse(listavehiculos);
      $.each(listavehiculos, (index,vehiculo) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${vehiculo.Marca}</td>` +
          `<td>${vehiculo.Modelo}</td>` +
          `<td>${vehiculo.Placa}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${vehiculo.id_vehiculo})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${vehiculo.id_vehiculo})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#VehiculoTabla").html(html);
    }
  );
  };

  var guardayeditarAutos = (e) => {
    e.preventDefault();
    var url = "";
    var form_Data = new FormData($("#Vehiculos_form")[0]);
    var id_vehiculo= document.getElementById("id_vehiculo").value;
    if (id_vehiculo === undefined || id_vehiculo === "") {
    url = "../../controllers/vehiculos.controller.php?op=insertar";
    } else {
    url = "../../controllers/vehiculos.controller.php?op=actualizar";
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
        Swal.fire('Categoria de Vehiculos', 'Se guardo con exito','success');
        limpiar();
        cargaTablaAutos();
      } else {
        Swal.fire('Categoria de Vehiculos', 'Ocurrio un error','danger');
      }
    },
    });
    };
    
    var uno = (id_vehiculo) => {
    $.post('../../controllers/vehiculos.controller.php?op=uno', {
        id_vehiculo: id_vehiculo
    }, (res) => {
        res = JSON.parse(res);
        $('#id_vehiculo').val(res.id_vehiculo);
        $('#Marca').val(res.Marca);
        $('#Modelo').val(res.Modelo);
        $('#Placa').val(res.Placa);
    })
    document.getElementById('TituloModalVehiculos').innerHTML = "Editar Vehiculo";
    $('#modalVehiculo').modal('show');
    };
    
    
    var eliminar = (id_vehiculo) => {
    Swal.fire({
        title: 'Vehiculo',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/vehiculos.controller.php?op=eliminar', {
                id_vehiculo: id_vehiculo
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Vehiculo', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaAutos();
                }
    
            })
        }
    })
    };
    
    var limpiar = () => {
      document.getElementById('id_vehiculo').value = '';
      document.getElementById('Marca').value = '';
      $('#Modelo').val('');
      $('#Placa').val('');
      $('#modalVehiculo').modal('hide');
      document.getElementById('TituloModalVehiculos').innerHTML = "Nuevo Vehiculo";
    };
    
 
  
  init();