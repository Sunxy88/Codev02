<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create demand</title>
</head>
<body>
<form name="demand" method="post" action="/newdemande">
    @csrf
    But d'utilisation du Lab : <input type="text" name="obj"><br/>
    Déscription d'environnement : <input type="text" name="env" placeholder="Describe your environment you want"><br/>
    Nombre d'utilisateur (tacitement 1) : <input type="number" name="numberUsers" placeholder="1"><br/>
    Liste d'utilisateur (séparer avec ';' s'il y a plusieurs) : <input type="text" name="listUsers"><br/>
    From: <input type="date" name="from"><br>
    To: <input type="date" name="to"><br>
    <input type="submit" value="Demand"><br>
</form>
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
