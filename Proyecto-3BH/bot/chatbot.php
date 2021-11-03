<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <img class="cta" src="assets/media/buttons/chatbot.png">
    <div class="chatbot-conteiner">
        <div class="chatbot chatbot-close">
            <div class="wrapper">
                <div class="titulo">Chat de consultas
                    <div class=cerrar><i class="fas fa-times-circle"></i></div>
                </div>
                <div class="form-bot">
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
        </div>
        <script>
            $(document).ready(function() {
                $("#send-btn").on("click", function() {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                    $(".form-bot").append($msg);
                    $("#data").val('');

                    $.ajax({
                        url: 'bot/message.php',
                        type: 'POST',
                        data: 'text=' + $value,
                        success: function(result) {
                            $respuesta = '<div class="bot-inbox inbox"><div class="icono"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                            $(".form-bot").append($respuesta);
                            $(".form-bot").scrollTop($(".form")[0].scrollHeight);
                        }

                    });
                });
            });
        </script>
    </div>
    <script src="bot/fadein-out.js"></script>
</body>

</html>