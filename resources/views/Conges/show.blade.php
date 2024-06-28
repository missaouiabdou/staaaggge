<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical Data with Dates</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
        color: #333;
    }

    .timeline {
        width: 80%;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .timeline ul {
        list-style: none;
        padding: 0;
    }

    .timeline li {
        margin: 20px 0;
        padding-left: 20px;
        position: relative;
    }

    .timeline li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 10px;
        height: 10px;
        background: #007bff;
        border-radius: 50%;
    }

    .timeline li::after {
        content: '';
        position: absolute;
        left: 4px;
        top: 10px;
        width: 2px;
        height: 100%;
        background: #007bff;
    }

    .timeline li:last-child::after {
        display: none;
    }

    .timeline p {
        font-size: 18px;
        color: #333;
    }

    .timeline span {
        display: block;
        font-size: 14px;
        color: #666;
    }

    .timeline li {
        margin-bottom: 20px;
    }

    .timeline li span {
        margin-left: 10px;
    }

</style>
<body>
<h1>Historique des congés</h1>

<div class="timeline">
    <ul>
        <p>Nom: {{$conges->agen->nom}} Prénom: {{$conges->agen->prenom}}</p>
        @foreach($conges as $conge)
            <li>
                <p>Début: {{$conges->Date_debut}} - Jusqu'à: {{$conges->Date_Fin}}</p>
                <span>Il a pris ce congé à cause de: {{$conges->status}}</span>
            </li>
        @endforeach
    </ul>

</div>

</body>
</html>
