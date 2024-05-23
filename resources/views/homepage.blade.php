<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/aboutUs.css" type="text/css">
    <title>motor page </title>
</head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>
    
    <!-- MAIN CONTENT -->
<body>
    <br>
    <br>
    <div class="py-36">
        <div class="max-w-7xl mx-auto sm:px-24 lg:px-32">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="main-content">
        <div class="gradient-text">
            Start your own riding now!
        </div>
        <div class="input-form">
            <form action="">
                <select name="location">
                    <option value="indonesia">Malang</option>
                    <option value="malaysia">Surabaya</option>
                    <option value="singapura">Bali</option>
                </select>
                <input type="date" name="rent-date">
                <input type="date" name="return-date">
            </form>
            <button id="tombol" onclick="location.href='{{ url('/RecommendationPage') }}'">Search</button>
        </div>
    </div>

            </div>
        </div>
    </div>


    
    <!-- FOOTER -->
    <!-- ... -->
    <script>
        const button = document.querySelector('button'); // select the button element

        button.addEventListener('click', () => { // add a click event listener
            console.log('Button clicked!'); // do something when the button is clicked
        });
    </script>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    @include('footer')
</x-app-layout>