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

<body>
    <div class="w-screen h-screen bg-gray-800 flex flex-col place-content-center">

        <form class="flex flex-col place-self-center w-1/2">
            <input class="h-5 text-black p-10 text-2xl" placeholder="Nama" type="name" name="name"
                id="name"><br>
            <input class="h-5 text-black p-10 text-2xl" placeholder="Email" type="email" name="email"
                id="email"><br>
            <input class="h-5 text-black p-10 text-2xl" placeholder="Password" type="password" name="password"
                id="password"><br>
            <button class="bg-kuning text-2xl font-medium h-20" classtype="submit">Register</button>
        </form><br>
        <div class="flex flex-row place-content-center">
            <p class="text-white text-xl">Already have account?</p>
            <a href="">
                <p class="text-hijau text-xl">Login</p>
            </a>
        </div>
    </div>
</body>

</html>
