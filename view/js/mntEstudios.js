var usu_id = $('#usu_idx').val();

function init(){
    $("#Estudio_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

function guardaryeditar(e){
    
    e.preventDefault();
    var formData = new FormData($("#Estudio_form")[0]);
    
    $.ajax({
        url: "/Portafolio/controller/estudio.php?opc=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(data){
            console.log(data);
            $('#estudio_data').DataTable().ajax.reload();
            $('#modalcrearEstudios').modal('hide');

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

    $('#estudio_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"/Portafolio/controller/estudio.php?opc=listar",
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
    $('#titulo_modal').html('Nuevo Estudio');
    $('#Estudio_form')[0].reset();
    $('#modalcrearEstudios').modal('show');
}

function editar(est_id){
    $.post("/Portafolio/controller/estudio.php?opc=mostrar",{est_id:est_id},function (data){
        data = JSON.parse(data);
        //console.log(data);
        $('#est_id').val(data.est_id);
        $('#est_titulo').val(data.est_titulo);
        $('#est_lugar').val(data.est_lugar);
        $('#est_anno').val(data.est_anno);
        $('#est_tipo').val(data.est_tipo);
    });
    $('#titulo_modal').html('Editar Estudio');
    $('#modalcrearEstudios').modal('show');
}


function eliminar(est_id){
    Swal.fire({
        title: 'Eliminar!',
        text: 'Desea eleminar el Registro?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/Portafolio/controller/estudio.php?opc=eliminar",{est_id:est_id},function (data){
                $('#estudio_data').DataTable().ajax.reload();
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

init();