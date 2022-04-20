<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard - User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

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

        .mtop50{
            margin-top: 50px;
        }

        label{
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="row mtop20">
        <div class="col-1 "></div>
        <div class="col-10 text-right">
            <a href="{{url('/logout')}}"><p>Salir</p></a>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row mtop50">
        <div class="col-12 text-center">
            <h4>Lista de Usuarios</h4>
        </div>
    </div>
    <div class="row mtop20">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach($user as $users)
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->lastname}}</td>
                        <td>{{$users->phone}}</td>
                        <td>{{$users->email}}</td>
                        <td>
                            <span id="btnedit" style="cursor: pointer" data-id="{{$users->id}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></span>&nbsp;&nbsp; 
                            <span id="btndelete" style="cursor: pointer" data-id="{{$users->id}}"><i class="fas fa-trash"></i></span>
                        </td>
                    </tr>
                    @endforeach
                        
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!-- Modal user edit-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modificar Usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{url('/update')}}" method="post" id="update_user">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 mtop20">
                        <label for="">Nombre:</label>
                        <input type="hidden" id="id">
                        <input type="text" name="name" id="name" required placeholder="Nombre" class="form-control">
                    </div>
                    <div class="col-md-6 col-12 mtop20">
                        <label for="">Apellidos: </label>
                        <input type="text" name="lastname" id="lastname" required placeholder="Apellido" class="form-control">
                    </div>
                </div>

                <div class="row mtop20">
                    <div class="col-12">
                        <label for="">Correo eléctronico: </label>
                        <input type="email" name="email" id="email" required placeholder="Email" class="form-control">
                    </div>
                </div>

                <div class="row mtop20">
                <div class="col-12">
                        <label for="">Phone: </label>
                        <input type="tel" name="phone" id="phone" required placeholder="Phone" class="form-control">
                    </div>
                </div>

               <!-- <div class="row mtop20">
                    <div class="col-12">
                        <label for="">Password:</label>
                        <input type="password" name="password" required placeholder="Password" class="form-control">
                    </div>
                </div>

                <div class="row mtop20">
                    <div class="col-12">
                        <label for="">Confirmar Password:</label>
                        <input type="password" name="cpassword" required placeholder="Confirmar Password" class="form-control">
                    </div>
                </div>-->
                            
                <div class="row mtop20">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <input type="submit" value="Actualizar" class="btn btn-primary registrar">
                    </div>
                </div>
            </form>

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
        </div>
    </div>
    </div>
    
        

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/20d765dd7b.js" crossorigin="anonymous"></script>
   <script>
        $(document).ready( function () {
            $('#table_id').DataTable();

        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

            $("#update_user").on('submit', function(e) {
                e.preventDefault();
                var id       = $('#id').val();
                var name     = $('#name').val();
                var lastname = $('#lastname').val();
                var email    = $('#email').val();
                var phone    = $('#phone').val();

                $.ajax({
                    url: 'user/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        name: name,
                        lastname: lastname,
                        email:email,
                        phone:phone
                    },
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data.success);
                        if(data.success == "ok"){
                            $('#update_user').trigger("reset");
                            $('#exampleModalCenter').modal('hide');

                            Swal.fire(
                                'Actualizado',
                                'El registro se ha actualizado correctamente',
                                'success'
                            )
                            setTimeout(() => {
                                window.location.reload(true)
                            }, 2500);
                        
                        }
                    }
                });

            });

        $('body').on('click', '#btnedit', function (event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get('user/' + id + '/edit', function (data) {
                //console.log(data);
                $('#id').val(data.data.id);
                $('#name').val(data.data.name);
                $('#lastname').val(data.data.lastname);
                $('#email').val(data.data.email);
                $('#phone').val(data.data.phone);
            })
        });

        $('body').on('click', '#btndelete', function (event) {

        event.preventDefault();
        var id = $(this).data('id');

        Swal.fire({
            title: 'Estas seguro que desea eliminar este usuario?',
            text: "Se va eliminar permanentemente el registro!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.value) {
                $.post('user/' + id + '/delete', function (data) {
                 //console.log(data);
                 if(data.success == 'ok'){
                    Swal.fire(
                    'Eliminado',
                    'El registro se ha eliminado correctamente',
                    'success'
                    );

                    setTimeout(() => {
                        window.location.reload(true)
                    }, 2500);  
                 }else{
                    Swal.fire(
                    'Error',
                    'Vaya, hubo un error al eliminar el registro',
                    'Error'
                    )
                 }
                });

            }
        });

       
});
    });
    </script>
</body>
</html>