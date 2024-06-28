<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les congés des agents</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="flex">
    <div class="inline-block">
        <!-- Inclure le contenu de votre barre latérale ici -->
        @include('layouts.slidebar')
    </div>

    <div class="container mx-auto px-5 mt-4 w-55">
        <div class="flex justify-between items-center">
            <caption class="p-5 text-lg text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h1 class="text-3xl font-bold mb-6">Les congés des agents:</h1>
            </caption>
        </div>
        <form action="{{ route('conges.search') }}" method="GET" >

            <input type="text" name="cin_ag" placeholder="Rechercher par CIN" class="p-2 border rounded-lg">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded-lg">Rechercher</button>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if (session()->has('message'))

                <div id="alert" class=" m-5  row alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="document.getElementById('alert').style.display='none'">x</button>
                    <strong>
                        {{ session()->get('message') }}</strong>

                </div>
            @endif
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">CIN</th>
                    <th scope="col" class="px-6 py-3">NOM complet</th>
                    <th scope="col" class="px-6 py-3">type</th>

                    <th scope="col" class="px-6 py-3">Date_depart</th>
                    <th scope="col" class="px-6 py-3">Date_fin</th>
                    <th scope="col" class="px-6 py-3">le reste</th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                @foreach($conges as $co)
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$co->cin_ag}}</td>
                        <td class="px-6 py-4">{{$co->agen->nom}}-{{$co->agen->prenom}}</td>
                        <td class="px-6 py-4">{{$co->agen->type}}</td>
                        <td class="px-6 py-4">{{$co->Date_debut}}</td>
                        <td class="px-6 py-4">
                            @if ($co->Date_Fin == now()->format('Y-m-d'))
                                <span class="text-red-500">{{$co->Date_Fin}}</span>
                            @else
                                {{$co->Date_Fin}}
                            @endif
                        </td>

                        <td class="px-6 py-4 ">
                           {{$co->reste}}jours
                        </td>
                        <td class="px-6 py-4 text-right">

                            <a href="{{route('conges.show',$co)}}" class="font-medium text-green-600 dark:text-green-500 hover:underline mx-2">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>


                </tbody>
                @endforeach
            </table>

        </div>
    </div>

</div>
</body>
</html>
