<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/demande.css') }}" />
    <title>Demande détaillée</title>
</head>
<body>
<header id="titre">
    <img src="{{asset('/image/imta_logo.jpg')}}" alt="Logo IMT Atlantique" />
    <h2>Gestion des labs informatiques d'IMT Atlantique</h2>
</header>
<div id="page">
    <h1>Demande détaillée</h1>
    <div id="boite">
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Description d'environnement</th>
                <th>Nombre d'utilisateur</th>
                <th>De</th>
                <th>À</th>
            </tr>
            @if(session()->get("demand", null) != null)
                @foreach(session()->get('demand') as $demand)
                    <tr>
                        <td>{!! $demand['id'] !!}</td>
                        <td>{!! $demand['description'] !!}</td>
                        <td>{!! $demand['numberUsers'] !!}</td>
                        <td>{!! $demand['fromDate'] !!}</td>
                        <td>{!! $demand['toDate'] !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    <div id="boite">
        <table border="1">
            <tr>
                <th>Liste d'utilisateur</th>
            </tr>
            @if(($users = session()->get("listUsers", null)) != null)
                @foreach($users as $user)
                    <tr>
                        <td>{!! $user['users'] !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</body>
</html>
