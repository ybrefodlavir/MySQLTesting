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
        <form action="{{ route('dosenManageSoalUpdate', $materialq->id) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="type" class="block mb-2 text-sm font-medium">Material Type</label>
                <select name="material_id" id="" class="w-full">
                    @foreach ($materials as $material)
                        @if ($material->id == $materialq->material_id)
                            <option selected="{{ $material->id }}" value="{{ $material->id }}">{{ $material->name }}
                            </option>
                        @else
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="type" class="block mb-2 text-sm font-medium">Question</label>
                <select name="question_id" id="" class="w-full">
                    @foreach ($questions as $question)
                        @if ($question->id == $materialq->question_id)
                            <option selected="{{ $question->id }}" value="{{ $question->id }}" class="w-24">
                                {{ $question->question }}</option>
                        @else
                            <option value="{{ $question->id }}" class="w-24">{{ $question->question }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="order" class="block mb-2 text-sm font-medium">Order</label>
                <input type="text" name="order" id="" placeholder="{{ $materialq->order }}"
                    value="{{ $materialq->order }}" class="w-full">
            </div>

            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">submit</button>
        </form>
    </div>

</body>

</html>
