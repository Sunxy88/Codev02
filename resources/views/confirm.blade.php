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
    <h2>Gestion des labs informatiques d'IMT Atlantique</h2><br/>
    <a href="logout">Déconnecter</a>
</header>
<div id="page">
    <h1>Vous êtes sûr que vous voulez supprimer la demande suivante?</h1>
    <div id="boite">
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Description de l'environnement</th>
                <th>Nombre d'utilisateurs</th>
                <th>De</th>
                <th>À</th>
            </tr>
            @if(session()->get("demandsToBeDeleted", null) != null)
                @foreach(session()->get('demandsToBeDeleted') as $demand)
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
    <form method="GET" action="/confirmedDelete">
        <input type="submit" value="Oui, je veux la supprimer.">
    </form>
</div>
</body>
</html>
