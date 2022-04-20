<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <style>
        .row{
            margin-right: 0px!important;
            margin-left: 0px!important;
        }

        .registrar{
            width: 100%!important;
        }

        .mtop20{
            margin-top: 20px;
        }

        label{
            font-weight: 700;
        }
    </style>
</head>
<body>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <form action="{{url('/login')}}" method="post">
                        @csrf
                        <div class="row mtop20">
                            <div class="col-12 text-center">
                                <h3><strong>Iniciar Sesion</strong></h3>
                            </div>
                        </div>
                        
                        <div class="row mtop20">
                            <div class="col-12">
                                <label for="">Usuario:</label>
                                <input type="email" name="email" required placeholder="usuario" class="form-control">
                            </div>
                        </div>

                        <div class="row mtop20">
                            <div class="col-12">
                                <label for="">Password:</label>
                                <input type="password" name="password" required placeholder="Password" class="form-control">
                            </div>
                        </div>
                            
                        <div class="row mtop20">
                            <div class="col-12">
                                    <input type="submit" value="Entrar" class="btn btn-primary registrar">
                            </div>
                        </div>
                    </form>

                    <div class="row mtop20">
                        <div class="col-12 text-center">
                            <a href="{{ url('/register') }}">No tengo cuenta, ¿Registrarme?</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mtop20">
                            @if(Session::has('message'))
                                <div class="mensajes text-center">
                                    <div class="alert alert-{{Session::get('typealert')}}" style="disp´lay:none">
                                        {{Session::get('message')}}
                                            @if($errors->any())
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        <script>
                                            $('.alert').slideDown();
                                            setTimeout(() => {
                                                $('.alert').slideUp();
                                            }, 10000);
                                        </script>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                
            </div>
            <div class="col-md-4"></div>
        </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>