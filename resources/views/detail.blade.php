<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demands</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Déscription d'environnement</th>
        <th>Nombre d'utilisateur</th>
        <th>From</th>
        <th>To</th>
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
</body>
</html>
