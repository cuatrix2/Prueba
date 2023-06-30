//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
    $('#Mecanicos_form').on('submit', (e)=>{
        guardayeditarMecanicos(e);
    })
  }
  
  $().ready(() => {
  cargaTablaMecanicos();
  });
  var cargaTablaMecanicos = () => {
  var html = "";
  $.post(
    "../../controllers/mecanicos.controller.php?op=todos",{},(listamecanicos) => {
        listamecanicos = JSON.parse(listamecanicos);
      $.each(listamecanicos, (index,mecanico) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${mecanico.nombre}</td>` +
          `<td>${mecanico.cedula}</td>` +
          `<td>` +
          `<button class='btn btn-success' onclick='uno(${mecanico.id_mecanico})'>Editar</button>` +
          `<button class='btn btn-danger' onclick='eliminar(${mecanico.id_mecanico})'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#MecanicoTabla").html(html);
    }
  );
  };

  var guardayeditarMecanicos = (e) => {
    e.preventDefault();
    var url = "";
    var form_Data = new FormData($("#Mecanicos_form")[0]);
    var id_mecanico= document.getElementById("id_mecanico").value;
    if (id_mecanico === undefined || id_mecanico === "") {
    url = "../../controllers/mecanicos.controller.php?op=insertar";
    } else {
    url = "../../controllers/mecanicos.controller.php?op=actualizar";
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
        Swal.fire('Categoria de mecanicos', 'Se guardo con exito','success');
        limpiar();
        cargaTablaMecanicos();
      } else {
        Swal.fire('Categoria de mecanicos', 'Ocurrio un error','danger');
      }
    },
    });
    };
    
    var uno = (id_mecanico) => {
    $.post('../../controllers/mecanicos.controller.php?op=uno', {
        id_mecanico: id_mecanico
    }, (res) => {
        res = JSON.parse(res);
        $('#id_mecanico').val(res.id_mecanico);
        $('#nombre').val(res.nombre);
        $('#cedula').val(res.cedula);
    })
    document.getElementById('TituloModalMecanico').innerHTML = "Editar Mecanico";
    $('#modalMecanico').modal('show');
    };
    
    
    var eliminar = (id_mecanico) => {
    Swal.fire({
        title: 'Empleado',
        text: "Esta seguro que desea eliminar...???",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar!!!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('../../controllers/mecanicos.controller.php?op=eliminar', {
                id_mecanico: id_mecanico
            }, (res) => {
                res = JSON.parse(res);
                if (res === 'ok') {
                    Swal.fire('Mecanico', 'Se eliminó con éxito', 'success');
                    limpiar();
                    cargaTablaMecanicos();
                }
    
            })
        }
    })
    };
    
    var limpiar = () => {
      document.getElementById('id_mecanico').value = '';
      document.getElementById('nombre').value = '';
      $('#cedula').val('');
      $('#modalMecanico').modal('hide');
      document.getElementById('TituloModalMecanico').innerHTML = "Nuevo Mecanico";
    };
  init();