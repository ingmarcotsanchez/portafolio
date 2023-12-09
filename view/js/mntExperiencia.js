var usu_id = $('#usu_idx').val();

function init(){
    $("#Experiencia_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

function guardaryeditar(e){
    
    e.preventDefault();
    var formData = new FormData($("#Experiencia_form")[0]);
    
    $.ajax({
        url: "/Portafolio/controller/experiencia.php?opc=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(data){
            console.log(data);
            $('#experiencia_data').DataTable().ajax.reload();
            $('#modalcrearExperiencias').modal('hide');

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

    $('#experiencia_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"/Portafolio/controller/experiencia.php?opc=listar",
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
    $('#titulo_modal').html('Nueva Experiencia');
    $('#Experiencia_form')[0].reset();
    $('#modalcrearExperiencias').modal('show');
}

function editar(exp_id){
    $.post("/Portafolio/controller/experiencia.php?opc=mostrar",{exp_id:exp_id},function (data){
        data = JSON.parse(data);
        //console.log(data);
        $('#exp_id').val(data.exp_id);
        $('#exp_titulo').val(data.exp_titulo);
        $('#exp_lugar').val(data.exp_lugar);
        $('#exp_annoIni').val(data.exp_annoIni);
        $('#exp_annoFin').val(data.exp_annoFin);
        $('#exp_tipo').val(data.exp_tipo);
    });
    $('#titulo_modal').html('Editar Experiencia');
    $('#modalcrearExperiencias').modal('show');
}


function eliminar(exp_id){
    Swal.fire({
        title: 'Eliminar!',
        text: 'Desea eleminar el Registro?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/Portafolio/controller/experiencia.php?opc=eliminar",{exp_id:exp_id},function (data){
                $('#experiencia_data').DataTable().ajax.reload();
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