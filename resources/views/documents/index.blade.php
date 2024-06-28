
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4">
    <h1 class="text-xl font-bold my-4">List of Documents</h1>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul class="divide-y divide-gray-200">
            @forelse ($documents as $document)
                <li class="p-4 hover:bg-gray-50">
                    Document ID: {{ $document->id }} <br>
                    Document Data: {{ $document->data }}
                </li>
            @empty
                <li class="p-4">No documents found.</li>
            @endforelse
        </ul>
    </div>
</div>
</body>
</html>
