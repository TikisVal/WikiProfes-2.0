function enviarDatos(){
    var puntuacion = document.formulario.estrellas.value;
    var comentario = document.formulario.comentario.value;

    document.formulario.method = 'post';
	document.formulario.action = '../agregar_comentario.php';
	document.formulario.submit();
}