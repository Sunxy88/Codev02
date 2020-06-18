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
    <h1>Gestionnaire de demandes</h1>
    <div id="boite">
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Description de l'environnement</th>
                <th>Nombre d'utilisateurs</th>
                <th>Liste d'utilisateur</th>
                <th>De</th>
                <th>À</th>
            </tr>
            @if(session()->get("demands", null) != null)
                @foreach(session()->get('demands') as $demand)
                    <tr>
                        <td>{!! $demand['id'] !!}</td>
                        <td>{!! $demand['description'] !!}</td>
                        <td>{!! $demand['numberUsers'] !!}</td>
                        <td>{!! $demand['listUsers'] !!}</td>
                        <td>{!! $demand['fromDate'] !!}</td>
                        <td>{!! $demand['toDate'] !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    <div id="page">
        <h1>Modifier un Lab</h1>
        <form name="demand" method="post" action="/modify" id="boite"><!-- tous les champs sont requis-->
            @csrf
            <div class="element">
                Cadre d'utilisation du Lab : <input type="text" name="obj" placeholder="TP de groupe, labo de recherche..." required>
            </div>
            <div class="element">
                Description de l'environnement : <input type="text" name="env" placeholder="Décriver l'environnement souhaité" required>
            </div>
            <div class="element">
                Nombre d'utilisateurs (1 par défaut) : <input type="number" name="numberUsers" placeholder="1" required>
            </div>
            <div class="element">
                Liste des utilisateurs (séparer avec ';' si plusieurs) : <input type="text" name="listUsers" placeholder="Prénom Nom; Prénom Nom..." required pattern="[^,?.!:/]*"> <!-- séparateur ; sinon erreur-->
            </div>
            <div class="element">
                Date de mise à disposition : <input type="date" name="from" min=<?php echo date('Y-m-d');?> required> <!-- on initialise à ajd-->
            </div>
            <div class="element">
                Date de clôture : <input type="date" name="to" min=<?php echo date('Y-m-d');?> required>
            </div>
            <div class="element"><input type="submit" value="Modifier"></div>
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
</div>
</body>
</html>
