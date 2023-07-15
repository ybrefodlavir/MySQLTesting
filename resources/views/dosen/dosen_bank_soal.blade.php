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

<body class="flex flex-row w-screen">
    <div class="w-1/2  bg-gray-800">
        <ul>
            <li class="m-5 bg-red-500 h-10 rounded-full w-60"><a class="text-black p-3 text-center"
                    href="/dosen_bank_soal">
                    Bank Soal</a>
            </li>
            <li class="m-5 bg-blue-500 h-10 rounded-full w-60"><a class="text-black p-3 text-center"
                    href="/dosen_data_material">Data
                    Materi</a>
            </li>
            <li class="m-5 bg-yellow-500 h-10 rounded-full w-60"><a class="text-black p-3"
                    href="/dosen_manage_soal">Manage
                    Soal</a>
            </li>
            <li class="m-5 bg-green-500 h-10 rounded-full w-60"><a class="text-black p-3" href="/dosen_data_nilai">Data
                    Nilai
                    Mahasiswa</a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="my-10 mx-5">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
        this.closest('form').submit();"
                        class="bg-red-200 place-self-center my-2 rounded-full text-center text-black font-medium px-10 py-3">
                        Logout
                    </a>
                </form>
            </li>
        </ul>

    </div>
    <div class="flex flex-col">
        <a href="{{ route('dosenBankSoalCreate') }}">
            <button type="button"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Tambah Data
            </button>
        </a>
        <table class="border-black border border-black-100 w-screen m-5">
            <thead class="border-black border border-black-100">
                <tr>
                    <th class="border-black border border-black-100 px-6 py-3">ID</th>
                    <th class="border-black border border-black-100 px-6 py-3">Questions</th>
                    <th class="border-black border border-black-100 px-6 py-3">Type</th>
                    <th class="border-black border border-black-100 px-6 py-3">Validation Statement</th>
                    <th class="border-black border border-black-100 px-6 py-3">Validation Value</th>
                    <th class="border-black border border-black-100 px-6 py-3">Difficulty</th>
                    <th class="border-black border border-black-100 px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-black border border-black-100">
                @foreach ($questions as $question)
                    <tr>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $question->id }}</td>
                        <td class="border-black border border-black-100 px-6 py-4 text-justify">
                            {{ $question->question }}</td>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $question->type }}</td>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $question->validation_statement }}
                        </td>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $question->validation_value }}
                        </td>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $question->difficulty }}</td>
                        <td class="border-black border border-black-100 px-6 py-4">
                            <div class="flex flex-row">
                                <a href="{{ route('dosenBankSoalEdit', $question->id) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                                <form action="{{ route('dosenBankSoalDelete', $question->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        onclick="return confirm('Are you sure you want to delete this admin?')">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>

</html>
