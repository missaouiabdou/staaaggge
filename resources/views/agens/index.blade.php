<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Management</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Table style adjustments */
        table {
            border-collapse: collapse;
            /* Subtle background for header row */
            background-color: #f5f5f5;
        }
        th, td {
            padding: 1rem;
        }
        /* Hover effect for table rows */
        tr:hover {
            background-color: #e0e0e0;
        }
        td{
            background-color: white;
            font-family: arial,sans-serif;
        }
        .input-container {
            position: relative;
            display: inline-block;
            align-items: center;
            left: 60px;
            bottom: -20px;
        }

        .input {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
            outline: none;
            padding: 18px 16px;
            background-color: transparent;
            cursor: pointer;
        }

        .input::placeholder {
            color: transparent;
        }

        .input:focus::placeholder {
            color: rgb(131, 128, 128);
        }

        .input:focus,.input:not(:placeholder-shown) {
            background-color: #fff;
            border: 1px solid rgb(98, 0, 255);
            width: 290px;
            cursor: none;
            padding: 18px 16px 18px 40px;
        }

        .icon {
            position: absolute;
            left: 0;
            top: 0;
            height: 40px;
            width: 40px;
            background-color: #fff;
            border-radius: 10px;
            z-index: -1;
            fill: rgb(98, 0, 255);
            border: 1px solid rgb(98, 0, 255);
        }

        .input:hover + .icon {
            transform: rotate(360deg);
            transition: .2s ease-in-out;
        }

        .input:focus + .icon,.input:not(:placeholder-shown) + .icon {
            z-index: 0;
            background-color: transparent;
            border: none;
        }

    </style>

</head>
<body>
<div class="flex">
    <div class="inline-block ">
        <!-- Include your sidebar content here -->
        @include('layouts.slidebar')
    </div>


<div class="container mx-auto px-4 py-8 ">
    <h1 class="text-3xl font-bold mb-6 flex items-center">
        <i class="fa-solid fa-user-tie mr-2 text-blue-500"></i>
        Gestion des agents    </h1>

 <div class="input-container ">
        <form id="searchForm" action="/search" method="get">

            <input type="text" name="search" id="searchInput" class="block w-80 h-10 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="recherche agens">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        </form>
    </div>
<div class="flex justify-end">
            <a href="{{route('agens.create')}}" class="inline-flex flex justify-end justify-center px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium transition ease-in-out duration-150">
                <i class="fa-solid fa-plus mr-2"></i> Ajouter Agent
            </a>&emsp;
                <form action="{{ route('generate.pdf') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium transition ease-in-out duration-150">
                        <i class="fa-solid fa-file-pdf mr-2"></i> Exporter pdf
                    </button>
                </form>
</div>

    <div class="overflow-x-auto relative border border-gray-200 rounded-lg mt-4">
        <table class="w-full text-gray-500">
            <thead>
            <tr>
                <th class="uppercase tracking-tight">CIN</th>
                <th class="uppercase tracking-tight">Nom</th>
                <th class="uppercase tracking-tight">Prenom</th>
                <th class="uppercase tracking-tight">Date_embauche</th>
                <th class="uppercase tracking-tight">Email</th>

                <th class="uppercase tracking-tight">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($agens as $agen)

                <tr class="group hover:bg-white-100">
                    <td class="px-6 py-4 border-b border-black-12">{{ $agen->cin }}</td>
                    <td class="px-6 py-4 border-b border-black-12">{{ $agen->nom }}</td>
                    <td class="px-6 py-4 border-b border-black-12">{{ $agen->prenom }}</td>
                    <td class="px-6 py-4 border-b border-black-12">{{ $agen->date_embauche }}</td>
                    <td class="px-6 py-4 border-b border-black-12">{{ $agen->email }}</td>
                    <td class="px-6 py-4 border-b border-black-12 flex justify-end space-x-4">
                        <a href="{{  url('/addconger',$agen) }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check mt-1" viewBox="0 0 16 16">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                        </a>
                        <a href="{{ route('agens.edit', $agen->cin) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <a href="{{ route('agens.show', $agen) }}" class="text-green-500 hover:underline group-hover:text-green-700">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <form action="{{ route('agens.destroy', $agen->cin) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-white" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce agen ?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                        </form>
                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
        {{$agens->links('pagination::tailwind')}}
</div>
</div>

</body>
</html>
