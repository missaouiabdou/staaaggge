<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Registration</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional additional styling */
    </style>
</head>
<body>
<div class="flex">
    <div class="inline-block ">
        <!-- Include your sidebar content here -->
        @include('layouts.slidebar')
    </div>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Agent modifier</h1>
    <form action="{{ route('agens.update', ['agen' => $agen->cin]) }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="cin" class="block text-sm font-medium text-gray-700 mb-2">CIN:</label>
                <input type="text" name="cin" id="cin" value="{{$agen->cin}}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom:</label>
                <input type="text" name="nom" id="nom" value="{{$agen->nom }}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prenom:</label>
                <input type="text" name="prenom" id="prenom"  value="{{$agen->prenom}}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telephone:</label>
                <input type="text" name="phone" id="phone" value="{{$agen->phone}}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address:</label>
                <input type="email" name="email" id="email" value="{{$agen->email}}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse:</label>
                <input type="text"
                       name="adresse"
                       id="adresse"  value="{{$agen->adresse}}"class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">Date naissance:</label>
                <input type="date" name="date_naissance"  value="{{$agen->date_naissance}}"id="date_naissance" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="lieux_naissance" class="block text-sm font-medium text-gray-700 mb-2">lieux naissance:</label>
                <input type="text" name="lieux_naissance" value="{{$agen->lieux_naissance}}" id="lieux_naissance" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type:</label>


                <select name="type" id="type" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required >
                    <option value="urbain" {{ $agen->type === 'urbain' ? 'selected' : '' }}>urbain</option>
                    <option value="rural" {{ $agen->type === 'rural' ? 'selected' : '' }}>rural</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="situation_familiale" class="block text-sm font-medium text-gray-700 mb-2">Situation famillier:</label>
                <select name="situation_familiale" id="situation_familiale" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                    <option value={{$agen->situation_familiale}} selected>{{$agen->situation_familiale}}</option>
                    <option value="celibataire">celibataire</option>
                    <option value="marie">marie</option>
                    <option value="divorce">Divorce</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nombre_enfants" class="block text-sm font-medium text-gray-700 mb-2">Nombre enfants:</label>
                <input type="number" value="{{$agen->nombre_enfants}}" name="nombre_enfants" id="nombre_enfants" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo </label>
                <input type="file" value="{{$agen->photo}}" name="photo" id="photo" class="block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white border rounded focus:outline-none focus:ring-indigo-500 focus:ring-w-1">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="date_embauche" class="block text-sm font-medium text-gray-700 mb-2">Date embauche</label>
                <input type="date" value="{{$agen->date_embauche}}" name="date_embauche" id="date_embauche" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="flex flex-col w-full">
                <label for="Observation" class="text-sm font-medium mb-2">Description :</label>
                <input value="{{$agen->Observation}}" id="Observation" name="Observation"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm p-2.5 w-full border border-gray-300"></input>
            </div>
        </div>
        @csrf
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white font-bold rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            mise a jour d'info
        </button>


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
