<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/aboutUs.css" type="text/css">
    <title>motor page </title>
</head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <section>
            <div class="textkategori">
                <h1>Check Out Our Categories!</h1>
            </div>
            <div class="jeniscar">
                <div class="cuandprior">
                    <div class="jenis-card">
                        <h2> Why Choose Us?</h2>
                        <div class="garis"></div>
                        <p>Ventur is your trusted choice for affordable car rentals. We connect travelers with car
                            owners, making exploration easy on your wallet. We prioritize quality and reliability,
                            ensuring you get a dependable ride every time.

                            Our user-friendly platform lets you effortlessly list your car or find the perfect vehicle
                            for your trip. With a dedicated support team by your side, Ventur is your go-to for
                            budget-friendly, convenient car rentals. Join us today and experience travel the Ventur way.
                        </p>


                    </div>
                    <div class="jenis-card">
                        <h2>Our Priority</h2>
                        <div class="garis"></div>
                        <p>Economical & Easy Car Rental:
                            Ventur makes car rentals easy and budget-friendly. We bring together car owners and
                            travelers, creating a convenient marketplace for economical exploration. Owners can earn by
                            sharing their vehicles, while renters find reliable and affordable transportation.

                            User-Friendly Platform:
                                Ventur streamlines the rental process with a user-friendly platform. List your car for rent
                                or discover the ideal vehicle for your trip effortlessly. It's a win-win for car owners and
                                travelers.
                            </p>

                        </div>
                    </div>
                    <div class="jenis-card-panjang">
                        <h2>Reach Us Out!</h2>
                        <div class="garis"></div>
                        <p>For any inquiries, feedback, or assistance, please don't hesitate to reach out to our customer
                            support team. We are here to serve you and make your car rental experience memorable.</p>

                    </div>
                </div>
        </section>

        @include('footer')
</x-app-layout>