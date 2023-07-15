<!doctype html>
<html lang="en">

<head>
    <title>TESTING MYSQL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body class="bg-gray-800">
    <div class="w-screen h-screen bg-gray-800 flex flex-col text-white justify-center">

        <form method="POST" action="{{ route('logout') }}" class="mt-20 mr-20 self-end">
            @csrf

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
        this.closest('form').submit();"
                class="bg-red-200 place-self-center my-2 rounded-full text-center text-black font-medium px-10 py-5">
                Logout
            </a>
        </form>

        @foreach ($materials as $material)
            <div class="flex gap-2">
                <a href="/material/{{ $material->id }}"
                    class="w-1/2 h-32 bg-{{ $material->color }} place-self-center my-2 rounded-full text-center pt-12 text-black text-2xl font-medium">
                    Soal Latihan {{ $material->name }}
                </a>
                @if (!$material->is_exam)
                    <a href="/material/download/{{ $material->id }}"
                        class="bg-blue-200 place-self-center my-2 rounded-full text-center text-black font-medium p-3">
                        Download {{ $material->name }}
                    </a>
                @endif
            </div>
        @endforeach

    </div>
</body>

</html>
