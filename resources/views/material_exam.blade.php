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
    <div class="w-screen h-screen bg-gray-800 flex flex-row ">
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


        </div>
        <div class="w-1/2 h-screen p-5 bg-gray-800 flex flex-col justify-between">

            <div class="w-100 h-screen bg-gray-600 flex flex-col p-5 rounded-md">
                <h2 class="text-white bg-green-600 p-5 mb-5 rounded-md">
                    Persentase
                    {{ $percentage }}/100
                </h2>
                @if ($question == null)
                    <p class="bg-green-600 w-full h-20 text-white text-2xl font-bold text-center pt-5">
                        Total Score Anda Adalah : {{ $score }}
                    </p>
                    <a class='bg-yellow-600 h-1/6 mt-5 rounded-md text-center pt-6 text-black text-2xl font-medium'
                        id="home"href="/">
                        Home
                    </a>
                @else
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
            <a class='bg-green-600 h-1/6 mt-5 rounded-md text-center pt-5 text-white hidden'
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
                    $("#next_button").show();
                },
                error: function() {}
            });
        });
    });
</script>

</html>
