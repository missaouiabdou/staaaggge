<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <title>Document</title>
</head>
<body>
<div class="flex">
    <div class="inline-block ">
        <!-- Include your sidebar content here -->
        @include('layouts.slidebar')
    </div>

    <div class="container mx-auto px-4 py-8 w-55">
        @if (session()->has('message'))
            <div id="alert" class="m-5 row bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <button type="button" class="absolute top-0 right-0 px-4 py-3" onclick="document.getElementById('alert').style.display='none'">
                    <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.879 6.879a.75.75 0 011.061 0L10 8.939l2.06-2.06a.75.75 0 111.06 1.06L11.06 10l2.06 2.06a.75.75 0 11-1.06 1.06L10 11.06l-2.06 2.06a.75.75 0 01-1.06-1.06L8.94 10 6.88 7.94a.75.75 0 010-1.06z"/></svg>
                </button>
                <strong>{{ session()->get('message') }}</strong>
            </div>
        @endif

        <form action="{{route('conges.store')}}" method="POST" id="form">
 @csrf

    <div class="mb-5">
        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom:</label>
        <input type="text" id="nom" value="{{$agen->nom}}" name="nom" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
    </div>
    <div class="mb-5">
        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900">Prenom:</label>
        <input type="text" id="Prenom" name="Prenom" value="{{$agen->prenom}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
    </div>
    <div class="mb-5">
        <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
        <input type="text" id="type" name="type" value="{{$agen->type}}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" readonly>
    </div>

    <div class="mb-5">
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">status</label>
        <input type="text" id="status" name="status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-5">
        <label for="date_debut" class="block mb-2 text-sm font-medium text-gray-900">Date de début</label>
        <input type="date" id="date_debut" name="date_debut" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-5">
        <label for="date_fin" class="block mb-2 text-sm font-medium text-gray-900">Date de fin</label>
        <input type="date" id="date_fin" name="date_fin" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>
    <input type="text" style="display:none;" id="cin_ag" value="{{$agen->cin}}" name="cin_ag" >

    <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
</form>



    </div>
</div>


</body>
</html>
