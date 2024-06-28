<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Données</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        #print{
@media print {
    display: none;


}}
    </style>
</head>
<body class="bg-gray-100 font-sans">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Profil de l'Agent</h1>
        <div class="grid md:grid-cols-2 gap-4">
            <P><img src="/fichier/{{$agen->photo}}"width="200px" height="auto" /></P>

            <p><span class="font-semibold">Nom:</span> {{$agen->nom}}</p>
            <p><span class="font-semibold">Prénom:</span> {{$agen->prenom}}</p>
            <p><span class="font-semibold">CIN:</span> {{$agen->cin}}</p>
            <p><span class="font-semibold">E-Mail:</span> {{$agen->email}}</p>
            <p><span class="font-semibold">Téléphone:</span> {{$agen->phone}}</p>
            <p><span class="font-semibold">Date de naissance:</span> {{$agen->date_naissance}}</p>
            <p><span class="font-semibold">Lieu de naissance:</span> {{$agen->lieux_naissance}}</p>
            <p><span class="font-semibold">Adresse:</span> {{$agen->adresse}}</p>
            <p><span class="font-semibold">Type:</span> {{$agen->type}}</p>
            <p><span class="font-semibold">Situation familiale:</span> {{$agen->situation_familiale}}</p>
            <p><span class="font-semibold">Date d'embauche:</span> {{$agen->date_embauche}}</p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Observation</h2>
        <p>{{$agen->Observation}}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Éducation</h2>
        <div>
            @foreach($diplomes as $d)
                <p class="mb-2">Niveau: {{$d->niveau}}, Filière: {{$d->filliere}}, Institution: {{$d->institution}}, Date Obtenu: {{$d->date_obtenu}}</p>
            @endforeach
        </div>
    </div>


</div>
<div class="max-w-4xl mx-auto  p-6 rounded-lg  mt-0">

<button onclick="printDocument()" id="print" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-value="Imprimer le document">
 imprimer
</button>
</div>


<script>
    function printDocument() {
        window.print();


    }
</script>

</body>
</html>
