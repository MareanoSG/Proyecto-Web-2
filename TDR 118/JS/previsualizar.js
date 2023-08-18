
function mostrarPrevisualizacionImagen(event) {
    var input = event.target;
    var imagenPrevisualizada = document.getElementById("imagenPrevisualizada");

    if (input.files && input.files[0]) {
        var lector = new FileReader();

        lector.onload = function (e) {
            console.log(e.target.result)
        }
        lector.readAsDataURL(input.files[0]);
    }
}