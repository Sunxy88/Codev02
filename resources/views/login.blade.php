<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}"/>
</head>

<body>
<div id="login_frame">

    <p id="image_logo"><img src="{{asset('/image/imta_logo.jpg')}}"></p>

    <form method="POST" action="/login">
        @csrf
        <p><label class="label_input">Email</label><input type="text" name="email" class="text_field"/></p>
        <p><label class="label_input">Password</label><input type="password" name="pwd" class="text_field"/></p>

        <div id="login_control">
            <input type="submit" id="btn_login" value="Se connecter"/>
            <a id="forget_pwd" href="/register">S'inscrire</a>
        </div>
    </form>
</div>
@if(session()->get('alert', null) != null)
    <div class="alert">
        <p>{{session()->get('alert')}}</p>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
