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
    <div class="w-1/4 h-screen bg-gray-800">
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
        </ul>
    </div>

    <div class="m-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dosenDataMaterialUpdate', $material->id) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium">Name</label>
                <input type="text" name="name" id="" placeholder="{{ $material->name }}"
                    value="{{ $material->name }}" class="w-96">
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                <input type="text" name="description" id="" placeholder="{{ $material->description }}"
                    value="{{ $material->description }}" class="w-96">
            </div>

            <div class="mb-6">
                <label for="is_exam" class="block mb-2 text-sm font-medium">Is Exam</label>
                {{-- <input type="text" name="is_exam" id="" placeholder="write the material name here"
                    class="w-96"> --}}
                @if ($material->is_exam == 0)
                    <div class="flex items-center mb-4">
                        <input id="" type="radio" name="is_exam" value=0
                            class="w-4 h-4 border-black-300 focus:ring-2 focus:ring-black dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-white dark:border-gray-600"
                            checked>
                        <label for="is_exam" class="block ml-2 text-sm font-medium text-black dark:text-black">
                            0
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="" type="radio" name="is_exam" value=1
                            class="w-4 h-4 border-black-300 focus:ring-2 focus:ring-black dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-white dark:border-gray-600">
                        <label for="is_exam" class="block ml-2 text-sm font-medium text-black dark:text-black">
                            1
                        </label>
                    </div>
                @else
                    <div class="flex items-center mb-4">
                        <input id="" type="radio" name="is_exam" value=0
                            class="w-4 h-4 border-black-300 focus:ring-2 focus:ring-black dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-white dark:border-gray-600">
                        <label for="is_exam" class="block ml-2 text-sm font-medium text-black dark:text-black">
                            0
                        </label>
                    </div>

                    <div class="flex items-center mb-4">
                        <input id="" type="radio" name="is_exam" value=1
                            class="w-4 h-4 border-black-300 focus:ring-2 focus:ring-black dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-white dark:border-gray-600"
                            checked>
                        <label for="is_exam" class="block ml-2 text-sm font-medium text-black dark:text-black">
                            1
                        </label>
                    </div>
                @endif
            </div>

            <div class="mb-6">
                <label for="path" class="block mb-2 text-sm font-medium">Path</label>
                <input type="text" name="path" id="" placeholder="{{ $material->path }}"
                    value="{{ $material->path }}" class="w-96">
            </div>

            <div class="mb-6">
                <label for="order" class="block mb-2 text-sm font-medium">Order</label>
                <input type="text" name="order" id="" placeholder="{{ $material->order }}"
                    value="{{ $material->order }}" class="w-96">
            </div>

            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">submit</button>
        </form>
    </div>

</body>

</html>
