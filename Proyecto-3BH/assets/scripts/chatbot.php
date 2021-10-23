<!DOCTYPE html>
<html lang="en">

<body>
    <img class="cta" src="./assets/media/buttons/chatbot.png">
    <div class="chatbot-conteiner">
        <div class="wrapper">
            <div class="titulo">Chat de consultas
                <section class=cerrar><i class="fas fa-times-circle"></i></section>
            </div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icono">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>hola, cual es su consulta?</p>
                    </div>
                </div>

            </div>
            <div class="campo-escritura">
                <div class="entrada-dato">
                    <input id="data" type="text" placeholder="Escriba su pregunta" required>
                    <button class="button-c" id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#send-btn").on("click", function() {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');

                    $.ajax({
                        url: 'assets/scripts/message.php',
                        type: 'POST',
                        data: 'text=' + $value,
                        success: function(result) {
                            $respuesta = '<div class="bot-inbox inbox"><div class="icono"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                            $(".form").append($respuesta);
                            $(".form").scrollTop($(".form")[0].scrollHeight);
                        }

                    });
                });
            });
        </script>
    </div>
    <script src="assets/scripts/fadein-out.js"></script>
</body>

</html>