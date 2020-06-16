<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/css/demande.css') }}" />
    <title>Gestionnaire de demande</title>
</head>
<body>
<header id="titre">
    <img src="{{asset('/image/imta_logo.jpg')}}" alt="Logo IMT Atlantique" />
    <h2>Gestion des labs informatiques d'IMT Atlantique</h2>
</header>
<div id="page">
    <h1>Gestionnaire de demandes</h1>
    <div id="boite">
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Description de l'environnement</th>
                <th>Nombre d'utilisateurs</th>
                <th>De</th>
                <th>À</th>
                <th>Manipulation</th>
            </tr>
            @if(session()->get("demands", null) != null)
                @foreach(session()->get('demands') as $demand)
                    <tr>
                        <td>{!! $demand['id'] !!}</td>
                        <td>{!! $demand['description'] !!}</td>
                        <td>{!! $demand['numberUsers'] !!}</td>
                        <td>{!! $demand['fromDate'] !!}</td>
                        <td>{!! $demand['toDate'] !!}</td>
                        <td>
                            <a href="/detail/{{$demand['id']}}">Détails</a></br>
                            <a href="/modify/{{$demand['id']}}">Modifier</a></br>
                            <a href="/confirm/{{$demand['id']}}">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    <a href="/demande" id="boite">Create a new demand</a>
</div>
</body>
</html>
