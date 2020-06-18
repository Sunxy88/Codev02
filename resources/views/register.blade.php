<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
</head>
<body>
<h1>Register here</h1><br/>
<form method="post" action="/register">
    @csrf
    User name: <input type="text" name="username">(length between 6 and 14, letters, numbers and dashes only)<br/>
    Email: <input type="text" name="email" placeholder="Your email address"><br/>
    Password: <input type="password" name="pwd">(length between 6 and 14)<br/>
    <input type="submit" value="Register">
</form>
@if(session()->get('alert', null) != null)
    <div class="alert alert-danger">
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
