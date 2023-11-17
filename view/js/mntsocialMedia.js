var usu_id = $('#usu_idx').val();

function init(){
    $("#socialMedia_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

function guardaryeditar(e){
    
    e.preventDefault();
    var formData = new FormData($("#socialMedia_form")[0]);
    
    $.ajax({
        url: "/Portafolio/controller/social_media.php?opc=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(data){
            console.log(data);
            $('#socialMedia_data').DataTable().ajax.reload();
            $('#modalcrearRedes').modal('hide');

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

    $('#socialMedia_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            url:"/Portafolio/controller/social_media.php?opc=listar",
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
    $('#titulo_modal').html('Nueva Red Social');
    //$('#socialMedia_form')[0].reset();
    $('#modalcrearRedes').modal('show');
}

function editar(socmed_id){
    $.post("/Portafolio/controller/social_media.php?opc=mostrar",{socmed_id:socmed_id},function (data){
        data = JSON.parse(data);
        //console.log(data);
        $('#socmed_id').val(data.socmed_id);
        $('#socmed_icono').val(data.socmed_icono);
        $('#socmed_url').val(data.socmed_url);
    });
    $('#titulo_modal').html('Editar Red');
    $('#modalcrearRedes').modal('show');
}

function redact(socmed_id){
    $.post("/Portafolio/controller/social_media.php?opc=activo",{socmed_id:socmed_id},function (data){
        $('#socialMedia_data').DataTable().ajax.reload();
       // data = JSON.parse(data);
    });
}

function redina(socmed_id){
    $.post("/Portafolio/controller/social_media.php?opc=inactivo",{socmed_id:socmed_id},function (data){
        $('#socialMedia_data').DataTable().ajax.reload();
       // data = JSON.parse(data);
    });
}

function eliminar(socmed_id){
    Swal.fire({
        title: 'Eliminar!',
        text: 'Desea eleminar el Registro?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
    }).then((result)=>{
        if(result.value){
            $.post("/Portafolio/controller/social_media.php?opc=eliminar",{socmed_id:socmed_id},function (data){
                $('#socialMedia_data').DataTable().ajax.reload();
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

$(document).on("click", "#btnplantilla", function () {
    $('#modalRed').modal('show');
});

var ExcelToJSON = function() {
    this.parseExcel = function(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            //TODO: Recorrido a todas las pestañas
            workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                SocialMediaList = JSON.parse(json_object);

                console.log(SocialMediaList)
                for (i = 0; i < SocialMediaList.length; i++) {

                    var columns = Object.values(SocialMediaList[i])

                    $.post("/Portafolio/controller/social_media.php?opc=guardar_desde_excel",{
                        socmed_icono : columns[0],
                        socmed_url : columns[1]
                    }, function (data) {
                        console.log(data);
                    });

                }
                /* TODO:Despues de subir la informacion limpiar inputfile */
                document.getElementById("upload").value=null;

                /* TODO: Actualizar Datatable JS */
                $('#socialMedia_data').DataTable().ajax.reload();
                $('#modalRed').modal('hide');
            })
        };
        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    };
};

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
}

document.getElementById('upload').addEventListener('change', handleFileSelect, false);




init();