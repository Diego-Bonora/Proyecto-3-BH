<?php
//coneccion a la base de datos
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die ("Database error");
//obtiene el mensaje desde ajax
$getmesg = mysqli_real_escape_string($conn, $_POST['text']);
//busca el mensaje en la base de datos
$check_data = "SELECT respuesta FROM chatbot WHERE consulta LIKE '%$getmesg%'";
$run_query = mysqli_query($conn, $check_data) or die ("Error");
//si conecta con el mensaje, muestra la resouesta
if(mysqli_num_rows($run_query)>0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $respuesta = $fetch_data['respuesta'];
    echo $respuesta;
}else{
    echo "Perdon! Reformula tu pregunta.";
}
