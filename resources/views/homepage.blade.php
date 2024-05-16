<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css" type="text/css">
    <title>Responsive Navbar</title>
</head>

<body>
    @include('navigation_bar')

    <!-- MAIN CONTENT -->
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

    <!-- FOOTER -->
    <!-- ... -->
    <script>
        const button = document.querySelector('button'); // select the button element

        button.addEventListener('click', () => { // add a click event listener
            console.log('Button clicked!'); // do something when the button is clicked
        });
    </script>
</body>

</html>