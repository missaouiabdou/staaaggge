<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
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
    <!-- Sidebar -->
    <div class="w-30">
        @include('layouts.slidebar')
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold">LES DIPLOMES:</h1>
            <a href="{{route('diplomes.create')}}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium transition ease-in-out duration-150">
                <i class="fa-solid fa-plus mr-2"></i> Ajouter diplomes
            </a>
        </div>

                <div class="input-container mb-7 block">
        <form id="searchForm" action="/search_diplomes" method="get">

            <input type="text" name="filliere" id="searchInput" class="flex w-80 h-10 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="recherche agens">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        </form>

    </div>


        <div class="w-full">

                <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id_Diplom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Niveau
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Instution
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date_obtenu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mention
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Domaine
                        </th>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                    </tr>
                    </thead>
                    @foreach($diplom as $d)

                    <tbody class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <tr>
                            <th scope="row" class="px-8 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$d->ID_Dipolm}}
                            </th>
                            <td class="px-6 py-4">
                                {{$d->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->niveau}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->institution}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->date_obtenu}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->mention}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->cin}}
                            </td>
                            <td class="px-6 py-4">
                                {{$d->filliere}}
                            </td>
                            <td class="px-6 py-2">
                                <div class="flex">
                                    <a href="{{ route('diplomes.show', $d->id) }}" class="text-green-500 hover:underline group-hover:text-green-700 mr-4">
                                        <i class="fas fa-eye"></i> <!-- FontAwesome eye icon -->
                                    </a>
                                    <a href="{{ route('diplomes.edit', $d->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">
                                        <i class="fas fa-edit"></i> <!-- FontAwesome edit icon -->
                                    </a>
                                    <form action="{{ route('diplomes.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-white" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette diplom ?')">
                                            <i class="fas fa-trash-alt"></i> <!-- FontAwesome trash icon -->
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach


                </table>
            </div>
            {{$diplom->links('pagination::tailwind')}}

        </div>
    </div>
</div>

</body>
</html>
