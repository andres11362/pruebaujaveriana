<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head> <!--plantilla de envio de correo-->
<body>
<p><stron>Asunto: </stron>{!!$correo->asunto!!}</p>
<p><stron>Destinatario: </stron>{!!$correo->destinatario!!}</p>
<p><stron>Mensaje: </stron>{!!$correo->mensaje!!}</p>
</body>
</html>