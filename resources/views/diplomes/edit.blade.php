<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplome Registration</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional additional styling */
        .continue-application {
            --color: black;
            --background: blue;
            --background-hover: #3A4059;
            --background-left: #2B3044;
            --folder: #F3E9CB;
            --folder-inner: #BEB393;
            --paper: #FFFFFF;
            --paper-lines: #BBC1E1;
            --paper-behind: #E1E6F9;
            --pencil-cap: #fff;
            --pencil-top: #275EFE;
            --pencil-middle: #fff;
            --pencil-bottom: #5C86FF;
            --shadow: rgba(13, 15, 25, .2);
            border: none;
            outline: none;
            cursor: pointer;
            position: relative;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            line-height: 19px;
            -webkit-appearance: none;
            -webkit-tap-highlight-color: transparent;
            padding: 17px 29px 17px 69px;
            transition: background 0.3s;
            color: var(--color);
            background: var(--bg, var(--background));
        }

        .continue-application > div {
            top: 0;
            left: 0;
            bottom: 0;
            width: 53px;
            position: absolute;
            overflow: hidden;
            border-radius: 5px 0 0 5px;
            background: var(--background-left);
        }

        .continue-application > div .folder {
            width: 23px;
            height: 27px;
            position: absolute;
            left: 15px;
            top: 13px;
        }

        .continue-application > div .folder .top {
            left: 0;
            top: 0;
            z-index: 2;
            position: absolute;
            transform: translateX(var(--fx, 0));
            transition: transform 0.4s ease var(--fd, 0.3s);
        }

        .continue-application > div .folder .top svg {
            width: 24px;
            height: 27px;
            display: block;
            fill: var(--folder);
            transform-origin: 0 50%;
            transition: transform 0.3s ease var(--fds, 0.45s);
            transform: perspective(120px) rotateY(var(--fr, 0deg));
        }

        .continue-application > div .folder:before, .continue-application > div .folder:after,
        .continue-application > div .folder .paper {
            content: "";
            position: absolute;
            left: var(--l, 0);
            top: var(--t, 0);
            width: var(--w, 100%);
            height: var(--h, 100%);
            border-radius: 1px;
            background: var(--b, var(--folder-inner));
        }

        .continue-application > div .folder:before {
            box-shadow: 0 1.5px 3px var(--shadow), 0 2.5px 5px var(--shadow), 0 3.5px 7px var(--shadow);
            transform: translateX(var(--fx, 0));
            transition: transform 0.4s ease var(--fd, 0.3s);
        }

        .continue-application > div .folder:after,
        .continue-application > div .folder .paper {
            --l: 1px;
            --t: 1px;
            --w: 21px;
            --h: 25px;
            --b: var(--paper-behind);
        }

        .continue-application > div .folder:after {
            transform: translate(var(--pbx, 0), var(--pby, 0));
            transition: transform 0.4s ease var(--pbd, 0s);
        }

        .continue-application > div .folder .paper {
            z-index: 1;
            --b: var(--paper);
        }

        .continue-application > div .folder .paper:before, .continue-application > div .folder .paper:after {
            content: "";
            width: var(--wp, 14px);
            height: 2px;
            border-radius: 1px;
            transform: scaleY(0.5);
            left: 3px;
            top: var(--tp, 3px);
            position: absolute;
            background: var(--paper-lines);
            box-shadow: 0 12px 0 0 var(--paper-lines), 0 24px 0 0 var(--paper-lines);
        }

        .continue-application > div .folder .paper:after {
            --tp: 6px;
            --wp: 10px;
        }

        .continue-application > div .pencil {
            height: 2px;
            width: 3px;
            border-radius: 1px 1px 0 0;
            top: 8px;
            left: 105%;
            position: absolute;
            z-index: 3;
            transform-origin: 50% 19px;
            background: var(--pencil-cap);
            transform: translateX(var(--pex, 0)) rotate(35deg);
            transition: transform 0.4s ease var(--pbd, 0s);
        }

        .continue-application > div .pencil:before, .continue-application > div .pencil:after {
            content: "";
            position: absolute;
            display: block;
            background: var(--b, linear-gradient(var(--pencil-top) 55%, var(--pencil-middle) 55.1%, var(--pencil-middle) 60%, var(--pencil-bottom) 60.1%));
            width: var(--w, 5px);
            height: var(--h, 20px);
            border-radius: var(--br, 2px 2px 0 0);
            top: var(--t, 2px);
            left: var(--l, -1px);
        }

        .continue-application > div .pencil:before {
            -webkit-clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
            clip-path: polygon(0 5%, 5px 5%, 5px 17px, 50% 20px, 0 17px);
        }

        .continue-application > div .pencil:after {
            --b: none;
            --w: 3px;
            --h: 6px;
            --br: 0 2px 1px 0;
            --t: 3px;
            --l: 3px;
            border-top: 1px solid var(--pencil-top);
            border-right: 1px solid var(--pencil-top);
        }

        .continue-application:before, .continue-application:after {
            content: "";
            position: absolute;
            width: 10px;
            height: 2px;
            border-radius: 1px;
            background: var(--color);
            transform-origin: 9px 1px;
            transform: translateX(var(--cx, 0)) scale(0.5) rotate(var(--r, -45deg));
            top: 26px;
            right: 16px;
            transition: transform 0.3s;
        }

        .continue-application:after {
            --r: 45deg;
        }

        .continue-application:hover {
            --cx: 2px;
            --bg: var(--background-hover);
            --fx: -40px;
            --fr: -60deg;
            --fd: .15s;
            --fds: 0s;
            --pbx: 3px;
            --pby: -3px;
            --pbd: .15s;
            --pex: -24px;
        }

    </style>
</head>
<body>
<div class="flex">
    <div class="inline-block ">
        <!-- Include your sidebar content here -->
        @include('layouts.slidebar')
    </div>

    <div class="container mx-auto px-4 py-8 w-55">
        <h1 class="text-3xl font-bold mb-6">Diplome Modifier</h1>
        <form action="{{route('diplomes.update',['diplome' => $diplome->id])}}" method="Post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="cin" class="block text-sm font-medium text-gray-700 mb-2">ID-DIPLOM:</label>
                    <input type="text" value="{{$diplome->ID_Dipolm}}" name="ID_Dipolm" id="ID_Dipolm" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name:</label>
                    <input type="text" name="name" value="{{$diplome->name}}" id="name" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="institution" class="block text-sm font-medium text-gray-700 mb-2">Instut</label>
                    <input type="text" value="{{$diplome->institution}}" name="institution" id="institution" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="filliere" class="block text-sm font-medium text-gray-700 mb-2">Domaine</label>
                    <input type="text" value="{{$diplome->filliere}}" name="filliere" id="filliere" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm">
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="niveau" class="block text-sm font-medium text-gray-700 mb-2">Niveau</label>
                    <select name="niveau" id="niveau" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>

                        <option value="BAC" {{ $diplome->niveau == 'BAC' ? 'selected' : '' }}>BAC</option>
                        <option value="BAC+2" {{ $diplome->niveau == 'BAC+2' ? 'selected' : '' }}>BAC+2</option>
                        <option value="BAC+3" {{ $diplome->niveau == 'BAC+3' ? 'selected' : '' }}>BAC+3</option>
                        </select>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="mention" class="block text-sm font-medium text-gray-700 mb-2">Mention</label>
                    <input type="text"
                           name="mention"
                           id="mention" value="{{$diplome->mention}}" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="date_obtenu" class="block text-sm font-medium text-gray-700 mb-2">Date_Obtenu:</label>
                    <input type="date" name="date_obtenu" id="date_obtenu" value="{{$diplome->date_obtenu}}"
                           class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm"
                           required placeholder="YYYY-MM-DD">
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">photo</label>
                    <input name='photo' class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>


                </div>


                </div>






            <div class="flex justify-end">
                @csrf
                <button class="continue-application">
                    <div>
                        <div class="pencil"></div>
                        <div class="folder">
                            <div class="top">
                                <svg viewBox="0 0 24 27">
                                    <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                </svg>
                            </div>
                            <div class="paper"></div>
                        </div>
                    </div>
                    saved diplome
                </button>
            </div>





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
</div>
</body>
</html>
