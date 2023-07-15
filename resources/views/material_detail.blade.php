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
    <div class="w-screen  bg-gray-800 flex flex-row ">
        <div class="w-1/2 h-screen p-5 bg-gray-800 flex flex-col justify-between">

            <form id="codeform" method="POST" action="{{ route('test') }}"
                class="flex flex-col bg-gray-600 w-100 h-3/4 p-5 rounded-md">
                @csrf
                <textarea id="code" name="code" class="w-100 h-3/4 bg-gray-900 text-white placeholder-gray-300 p-2 rounded-md"
                    placeholder="Type your code here..."></textarea>
                <button type="submit" class="w-1/4 h-10 bg-blue-500 text-white mt-2 rounded-md">
                    Send
                </button>
            </form>

            <div class="w-100 h-2/5 bg-gray-600 flex flex-col p-5 rounded-md mt-5">
                <h2 class="text-white">
                    Your Result
                </h2>
                <p id="success_message" class="text-green-500"></p>
                <p id="error_message" class="text-red-500"></p>
            </div>
        </div>
        <div class="w-1/2 h-screen p-5 bg-gray-800 flex flex-col justify-between">

            <div class="w-100 h-screen bg-gray-600 flex flex-col p-5 rounded-md">

                @if ($question == null)
                    <p class="text-white text-2xl">Anda Telah Menyelesaikan Soal {{ $material->name }} </p><br>

                    <p class="bg-green-600 w-full h-20 text-white text-2xl font-bold text-center pt-5">
                        Total Score Anda Adalah : {{ $score }}
                    </p>
                    <a class='bg-yellow-600 h-1/6 mt-5 rounded-md text-center pt-6 text-black text-2xl font-medium'
                        id="home"href="/home">
                        Home
                    </a>
                @else
                    <h2 class="text-white bg-green-600 p-5 mb-5 rounded-md">
                        Score Anda :
                        {{ $score }}/100
                    </h2>

                    @if ($question->image != null)
                        <div class="m-6">
                            <img src="{{ url($question->image) }}" alt="" class="h-60 w-full object-contain">
                        </div>
                    @endif
                    <p class="text-white">{{ $question->question }}</p>
                @endif
                {{--                 
                    <p class="text-white">{{ $question->question }}</p>
                    <br> --}}

            </div>
            <a class='bg-green-600 h-100 mt-5 rounded-md text-center py-5 text-white text-xl font-medium hidden'
                id="next_button"href="/material/{{ $material->id }}">
                Next
            </a>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#codeform').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {
                code: $('#code').val(),
                question_id: '{{ $question->id ?? 0 }}',
                material_id: '{{ $material->id }}',
            };
            $.ajax({
                type: 'POST',
                url: '/test',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if (data.status == "success") {
                        $("#error_message").hide();
                        $("#success_message").show();
                        $("#next_button").show();
                        $("#success_message").text("Success: " + data.message);
                    } else {
                        $("#success_message").hide();
                        $("#error_message").show();
                        $("#error_message").text("Error: " + data.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                    $("#success_message").hide();
                    $("#error_message").show();
                    $("#error_message").text("Error");
                }
            });
        });
    });
</script>

</html>
