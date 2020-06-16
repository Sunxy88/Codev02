<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
</head>
<body>
<h1>Welcome!</h1><br/>
<p>Don't have an account? <a href="/register">Register now!</a></p>
<form method="post" action="/login">
    @csrf
    Email: <input type="text" name="email" placeholder="Your email address"><br/>
    Password: <input type="password" name="pwd"><br/>
    <input type="submit" value="Log In">
</form>
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
