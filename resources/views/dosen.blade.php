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
    <div class="h-screen w-1/4 bg-gray-800">
        <ul>
            <li class="m-5 bg-gray-400 h-10 rounded-full"><a class="text-black p-3 text-center" href="/dosen">
                    Bank Soal</a>
            </li>
            <li class="m-5 bg-red-500 h-10 rounded-full"><a class="text-black p-3 text-center" href="#">Data
                    Materi</a>
            </li>
            <li class="m-5 bg-blue-500 h-10 rounded-full"><a class="text-black p-3" href="#">Data Soal Latihan</a>
            </li>
            <li class="m-5 bg-yellow-500 h-10 rounded-full"><a class="text-black p-3" href="#">Data Soal Exam</a>
            </li>
            <li class="m-5 bg-green-500 h-10 rounded-full"><a class="text-black p-3" href="#">Data Nilai
                    Mahasiswa</a>
            </li>
        </ul>
    </div>

    <table class="border-black border border-black-100 m-10 w-screen">
        <thead class="border-black border border-black-100">
            <tr>
                <th class="border-black border border-black-100">ID</th>
                <th class="border-black border border-black-100">Name</th>
                <th class="border-black border border-black-100">Email</th>
                <th class="border-black border border-black-100">Actions</th>
            </tr>
        </thead>
        <tbody class="border-black border border-black-100">
            <tr>
                <td class="border-black border border-black-100">value id</td>
                <td class="border-black border border-black-100">value name</td>
                <td class="border-black border border-black-100">value email</td>
                <td class="border-black border border-black-100">
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <form action="" method="POST" style="display: inline-block;">

                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this admin?')">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
