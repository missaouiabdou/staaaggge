<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page with Logo and Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        font-family: sans-serif;

    }

    header {
        text-align: center;
    }

    .logo {
        width: 100px; /* Adjust width as needed */
        height: 100px;
    }

    table {
        width: 100%;
        border-collapse: collapse; /* Remove borders between cells */
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd; /* Add borders to cells */
        text-align: center;
    }

    th {
        background-color: #f2f2f2; /* Light gray background for headers */
    }
    tr{
        padding-right: 20px;
    }

</style>
<body>
<table>
    <thead>
    <tr>
        <th>Cin</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>E-mail</th>
        <th>Telephone</th>
        <th>Date_Naissance</th>

    </tr>
    </thead>
    <tbody>
    @foreach($agens  as $as)
    <tr>
        <td>{{$as->cin}}</td>
        <td>{{$as->nom}}</td>
        <td>{{$as->prenom}}</td> <td>{{$as->email}}</td>
        <td>{{$as->phone}}</td>
        <td>{{$as->date_naissance}}</td>

    </tr>

    </tbody>
    @endforeach
</table>

</body>
</html>
