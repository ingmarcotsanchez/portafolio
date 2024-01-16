var usu_id = $('#usu_idx').val();

function init(){
    $("#Work_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

function guardaryeditar(e){
    
    e.preventDefault();
    var formData = new FormData($("#Work_form")[0]);
    
    $.ajax({
        url: "/Portafolio/controller/work.php?opc=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(data){
            console.log(data);
            $('#work_data').DataTable().ajax.reload();
            $('#modalcrearWorks').modal('hide');

            Swal.fire({
                title: 'Correcto!',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}

$(document).ready(function(){
    $('#fil_id').select2({
        dropdownParent: $("#modalcrearWorks")
    });

    select_filtro();

    $('#work_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"/Portafolio/controller/work.php?opc=listar",
            type:"post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 15,
        "order": [[ 0, "desc" ]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

});

function nuevo(){
    $('#titulo_modal').html('Nuevo Trabajo');
    $('#Work_form')[0].reset();
    $('#modalcrearWorks').modal('show');
}

function editar(work_id){
    $.post("/Portafolio/controller/work.php?opc=mostrar",{work_id:work_id},function (data){
        data = JSON.parse(data);
        //console.log(data);
        $('#work_id').val(data.work_id);
        $('#fil_id').val(data.fil_id);
        $('#work_img').val(data.work_img);
        $('#work_titulo').val(data.work_titulo);
        $('#work_descripcion').val(data.work_descripcion);
        $('#work_fecha').val(data.work_fecha);
        $('#work_rol').val(data.work_rol);
        $('#work_tecnologia').val(data.work_tecnologia);
        $('#work_url').val(data.work_url);
    });
    $('#titulo_modal').html('Editar Trabajo');
    $('#modalcrearWorks').modal('show');
}


function eliminar(work_id){
    Swal.fire({
        title: 'Eliminar!',
        text: 'Desea eleminar el Registro?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/Portafolio/controller/work.php?opc=eliminar",{work_id:work_id},function (data){
                $('#work_data').DataTable().ajax.reload();
                Swal.fire({
                    title: 'Correcto!',
                    text: 'Se Elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            }); 
        }
    });

}

function select_filtro(){
    $.post("/Portafolio/controller/filtro.php?opc=combo",function (data){
        $('#fil_id').html(data);
    });
}

init();