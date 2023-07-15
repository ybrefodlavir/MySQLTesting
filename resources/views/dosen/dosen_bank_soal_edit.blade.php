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
        <form action="{{ route('dosenBankSoalUpdate', $question->id) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="question" class="block mb-2 text-sm font-medium">Question</label>
                <textarea cols="100" rows="6" name="question" id="" placeholder="{{ $question->question }}">{{ $question->question }}</textarea>

            </div>

            <div class="mb-6">
                <label for="type" class="block mb-2 text-sm font-medium">Type</label>
                <select name="type" id="" class="w-full">
                    @foreach ($question_types as $item)
                        @if ($item == $question->type)
                            <option selected="{{ $item }}">{{ $item }}</option>
                        @else
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="validation_statement" class="block mb-2 text-sm font-medium">Validation Statement</label>
                <textarea name="validation_statement" id="" cols="100" rows="6"
                    placeholder="{{ $question->validation_statement }}">{{ $question->validation_statement }}</textarea>
            </div>

            <div class="mb-6">
                <label for="validation_value" class="block mb-2 text-sm font-medium">Validation Value</label>
                <textarea name="validation_value" id="" cols="100" rows="6"
                    placeholder="{{ $question->validation_value }}">{{ $question->validation_value }}</textarea>
            </div>

            <div class="mb-6">
                <label for="difficulty" class="block mb-2 text-sm font-medium">Difficulty</label>
                <select name="difficulty" id="" class="w-full">
                    @foreach ($question_difficulty as $item)
                        @if ($item == $question->difficulty)
                            <option selected="{{ $item }}">{{ $item }}</option>
                        @else
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">submit</button>
        </form>
    </div>

</body>

</html>
