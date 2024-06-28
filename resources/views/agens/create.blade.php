<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Registration</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<style>
    .invalid {
        border-color: red; /* Example error style */
    }
</style>
<body>
<div class="flex">
    <div class="inline-block ">
        <!-- Include your sidebar content here -->
        @include('layouts.slidebar')
    </div>

<div class="container mx-auto px-4 py-8 w-55">

    @foreach($errors->all() as $index => $error)
        <div id="alert{{ $index }}" class="m-5 row bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <button type="button" class="absolute top-0 right-0 px-4 py-3" onclick="removeError({{ $index }})">
                <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.879 6.879a.75.75 0 011.061 0L10 8.939l2.06-2.06a.75.75 0 111.06 1.06L11.06 10l2.06 2.06a.75.75 0 11-1.06 1.06L10 11.06l-2.06 2.06a.75.75 0 01-1.06-1.06L8.94 10 6.88 7.94a.75.75 0 010-1.06z"/></svg>
            </button>
            <strong>{{ $error }}</strong>
        </div>
    @endforeach

    <script>
        function removeError(index) {
            var errorElement = document.getElementById('alert' + index);
            if (errorElement) {
                errorElement.remove();
            }
        }
    </script>



    <h1 class="text-3xl font-bold mb-6">Agent Registration</h1>
    <form action="{{ route('agens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="cin" class="block text-sm font-medium text-gray-700 mb-2">CIN (*):</label>
                <input type="text" name="cin" id="cin" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required onkeyup="validateCIN(this)">
                <script>
                    function validateCIN(inputField) {
                        const cinRegex = /^[A-Za-z]{1,2}\d{3,6}$/;
                        const cinValue = inputField.value;
                    }

                </script>
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">nom (*):</label>
                <input type="text" name="nom" id="nom" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2"> prenom (*):</label>
                <input type="text" name="prenom" id="prenom" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="phone" class="block text-sm font-medium text&-gray-700 mb-2">telephone (*):</label>
                <input type="text" name="phone" id="phone" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address (*):</label>
                <input type="email" name="email" id="email" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Address (*):</label>
                <input type="text"
                               name="adresse"
                               id="adresse" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">Date naissance (*):</label>
                <input type="date" name="date_naissance" id="date_naissance" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="lieux_naissance" class="block text-sm font-medium text-gray-700 mb-2">lieux naissance (*):</label>
                <input type="text" name="lieux_naissance" id="lieux_naissance" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type (*):</label>
                <select name="type" id="type" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                    <option value="urbain">Urban</option>
                    <option value="rural">Rural</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="situation_familiale" class="block text-sm font-medium text-gray-700 mb-2">Marital Status (*):</label>
                <select name="situation_familiale" id="situation_familiale" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
                    <option value="celibataire">celibataire</option>
                    <option value="marie">marie</option>

                    <option value="divorce">divorce</option>
                </select>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="nombre_enfants" class="block text-sm font-medium text-gray-700 mb-2">Nombre d'enfants:</label>
                <input type="number" name="nombre_enfants" id="nombre_enfants" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo (*):</label>
                <input type="file" name="photo" id="photo" class="block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white border rounded focus:outline-none focus:ring-indigo-500 focus:ring-w-1">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="date_embauche" class="block text-sm font-medium text-gray-700 mb-2">Date embauche (*):</label>
                <input type="date" name="date_embauche" id="date_embauche" class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:ring-w-1 text-gray-700 shadow-sm" required>
            </div>
        </div>
        <div class="flex flex-col w-full">
            <label for="Observation" class="text-sm font-medium mb-2">Description  (*):</label>
            <textarea id="Observation" name="Observation" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm p-2.5 w-full border border-gray-300"></textarea>
        </div>

        <div class="mb-6">
            <p class="block text-sm font-medium text-gray-700 mb-2">tu as un diplome? (*)</p>
            <div class="flex items-center mb-2">
                <input type="radio" id="yesDiploma" name="diploma" value="yes">
                <label for="yesDiploma" class="ml-2 mr-6">Oui</label>
                <input type="radio" id="noDiploma" name="diploma" value="no">
                <label for="noDiploma" class="ml-2">Non</label>
            </div>
        </div>



        <div class="flex justify-end">
            @csrf
            <button type="submit" onclick="processForm()" class="inline-flex items-center mt-2 px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white font-bold rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer Agent
            </button>
        </div>

    </form>


</div>
</div>
</body>
</html>
