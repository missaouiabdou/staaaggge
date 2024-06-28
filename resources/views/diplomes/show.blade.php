<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Diploma Details</title>
    <style>
        #print{
            @media print {
                display: none;


            }}
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $diplome->name }}</h1>
    <p>Niveau: {{ $diplome->niveau }}</p>
    <p>Institution: {{ $diplome->institution }}</p>
    <p>Date Obtenu: {{ $diplome->date_obtenu }}</p>
    <p>Mention: {{ $diplome->mention }}</p>
    <p>filliere: {{ $diplome->filliere }}</p>
    <!-- Display other details -->

    <!-- Display the photo -->
    @if($diplome->photo)
        <img src="/diplomesphotos/{{$diplome->photo}}" alt="Diploma Photo" width="400px" height="200px">
    @else
        <p>No photo available</p>
    @endif
    <button onclick="window.print()" id="print" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-value="Imprimer le document">
        print
    </button>

</div>

</body>
</html>
