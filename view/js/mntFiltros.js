var usu_id = $('#usu_idx').val();

function init(){
    $("#Filtro_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

function guardaryeditar(e){
    
    e.preventDefault();
    var formData = new FormData($("#Filtro_form")[0]);
    
    $.ajax({
        url: "/Portafolio/controller/filtro.php?opc=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(data){
            console.log(data);
            $('#filtro_data').DataTable().ajax.reload();
            $('#modalcrearFiltros').modal('hide');

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

    $('#filtro_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"/Portafolio/controller/filtro.php?opc=listar",
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
    $('#titulo_modal').html('Nuevo Filtro');
    $('#Filtro_form')[0].reset();
    $('#modalcrearFiltros').modal('show');
}

function editar(fil_id){
    $.post("/Portafolio/controller/filtro.php?opc=mostrar",{fil_id:fil_id},function (data){
        data = JSON.parse(data);
        //console.log(data);
        $('#fil_id').val(data.fil_id);
        $('#fil_titulo').val(data.fil_titulo);
        $('#fil_enlace').val(data.fil_enlace);
    });
    $('#titulo_modal').html('Editar Filtro');
    $('#modalcrearFiltros').modal('show');
}


function eliminar(fil_id){
    Swal.fire({
        title: 'Eliminar!',
        text: 'Desea eleminar el Registro?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/Portafolio/controller/filtro.php?opc=eliminar",{fil_id:fil_id},function (data){
                $('#filtro_data').DataTable().ajax.reload();
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