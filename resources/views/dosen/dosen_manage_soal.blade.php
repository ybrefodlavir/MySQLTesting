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

<body class="flex flex-row">
    <div class="w-1/4 bg-gray-800">
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
        <a href="{{ route('dosenManageSoalCreate') }}">
            <button type="button"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Tambah Data
            </button>
        </a>
        <table class="border-black border border-black-100 m-5 w-screen ">
            <thead class="border-black border border-black-100">
                <tr>
                    <th class="border-black border border-black-100 px-6 py-3">ID</th>
                    <th class="border-black border border-black-100 px-6 py-3">Material Type</th>
                    <th class="border-black border border-black-100 px-6 py-3">Question</th>
                    <th class="border-black border border-black-100 px-6 py-3">Order</th>
                    <th class="border-black border border-black-100 px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="border-black border border-black-100">
                @foreach ($materialqs as $materialq)
                    <tr>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $materialq->id }}</td>
                        <td class="border-black border border-black-100 px-6 py-4">
                            @foreach ($materials as $material)
                                @if ($materialq->material_id == $material->id)
                                    {{ $material->name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border-black border border-black-100 px-6 py-4">

                            @foreach ($questions as $question)
                                @if ($materialq->question_id == $question->id)
                                    {{ $question->question }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border-black border border-black-100 px-6 py-4">{{ $materialq->order }}</td>
                        <td class="border-black border border-black-100 px-6 py-4">
                            <div class="flex flex-row">
                                <a href="{{ route('dosenManageSoalEdit', $materialq->id) }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>

                                <form action="{{ route('dosenManageSoalDelete', $materialq->id) }}" method="POST"
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
