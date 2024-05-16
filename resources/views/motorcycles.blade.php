<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/motorcycles.css" type="text/css">
    <title>carspage </title>
</head>

<body>
    <!-- NAVBAR -->
    @include('navigation_bar')

    <!-- MAIN CONTENT -->
    <main style="overflow: hidden;">
        <section>
            <div class="textkategori">
                <h1>Check Out Our Categories!</h1>
            </div>
            <div class="jeniscar">
                <div class="jenis-card">
                    <h2>Mini Car</h2>
                    <div class="garis"></div>
                    <img src="../Assets/minicar.png" alt="minicar">
                    <p>'Mini' cars are the smallest types of cars you can hire. Minis are suitable for three or four
                        people for very short trips. For longer trips, they’re more suitable for one or two people.
                        Minis are often (but not necessarily) hatchbacks.</p>

                </div>
                <div class="jenis-card">
                    <h2>Sedan</h2>
                    <div class="garis"></div>
                    <img src="../Assets/Sedan.png" alt="minicar">
                    <p>If you choose a car model that’s classed as intermediate, you won’t necessarily get the exact
                        make and model you picked. But you will get a car that is also classed as sedan. This means it
                        will be more or less the same size, with the same kind of gearbox, the same number of doors and
                        seats, etc.</p>

                </div>
                <div class="jenis-card">
                    <h2>Hatch back</h2>
                    <div class="garis"></div>
                    <img src="../Assets/hachback.png" alt="minicar">
                    <p>Compact and versatile, hatchbacks are perfect for short trips. They offer comfortable seating for
                        up to three or four passengers and easy access to cargo space through their distinctive rear
                        door. Great for city driving and convenience.
                    </p>

                </div>
                <div class="jenis-card">
                    <h2>SUV</h2>
                    <div class="garis"></div>
                    <img src="../Assets/SUV.png" alt="minicar">
                    <p>SUVs (short for sport or suburban utility vehicles) are good-sized vehicles with a rugged look,
                        set higher off the road than normal cars.</p>

                </div>
            </div>
        </section>
    </main>
    <!-- FOOTER -->
    @include('footer')
</body>

</html>