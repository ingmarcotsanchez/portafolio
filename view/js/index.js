function init(){
    $("#contact_form").on("submit",function(e){
        //console.log("hola");
        guardar(e);	
    });
}
$(document).ready(function() {

});
function guardar(e){
    console.log("prueba");
    e.preventDefault();
    var formData = new FormData($("#contact_form")[0]);
    console.log(formData);
    $.ajax({
        url: "/Portafolio/controller/cliente.php?opc=guardarCliente",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            if (data==1){

                $.post("/Portafolio/controller/cliente.php?opc=emailBienvenida",{cli_correo : $("#cli_correo").val()},function(data){
                    console.log(data);
                });
                window.location.reload()
                Swal.fire({
                    icon: 'success',
                    title: 'Correo Enviado Exitosamente',
                    text : 'Gracias por suscribirte!',
                    showConfirmButton: false,
                    timer: 2000
                    
                })

                $("#cli_correo").val('');
            }else{
                window.location.reload()
                Swal.fire({
                    icon: 'error',
                    title: 'Correo No Enviado',
                    text : 'Correo ya suscrito!',
                    showConfirmButton: false,
                    timer: 5000
                })
            }
        }
    });

}

init();