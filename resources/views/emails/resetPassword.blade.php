<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    {{-- <img src="{{ url('images/logo-mail.png') }}" width="150px">     --}}
    <p>Hola, {{ $data['user']->fullname()}} :</p>
    <p>   	         
        Recibimos una solicitud para restablecer tu contraseña de Expediente Couther<br>
        Haz clic en el siguiente enlace para restablecer la contraseña:         
    </p>

    
        <h3>Enlace</h3>
        <h4><a href="{{ url('/recuperar/' . $data['token']->token) }}"><strong>Recuperar Contraseña</strong></a></h4>
        {{-- También puedes cambiar la contraseña directamente.  --}}
         
        
        {{-- Cambiar contraseña --}}
        
        
                
         
        <p>
        <strong>¿No solicitaste este cambio?</strong><br>
            Si no solicitaste una nueva contraseña, avísanos.
        </p>

    </body>
</html>