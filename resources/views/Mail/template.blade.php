<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <p><strong>Hola:</strong> Prueba</p>
                <p>Ha iniciado sesion</p>
                <p><strong>Su correo es:</strong> {{ $data['email'] }} </p>
                <p><strong>Su password es:</strong> {{ $data['password'] }} </p>
            </div>
        </div>
    </div>
</body>
</html>