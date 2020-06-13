<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demands</title>
</head>
<body>
<a href="/demande">Create a new demand</a><br><br>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Déscription d'environnement</th>
        <th>Nombre d'utilisateur</th>
        <th>From</th>
        <th>To</th>
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
                    <a href="/detail/{{$demand['id']}}">Détail</a>/
                    <a href="/modify/{{$demand['id']}}">Modifier</a>/
                    <a href="/confirm/{{$demand['id']}}">Supprimer</a>
                </td>
            </tr>
        @endforeach
    @endif
</table>
</body>
</html>
