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
            <br>
            <br>
            <div class="textkategori">
                <h1>Kenali Kami Lebih Dalam Lagi!</h1>
            </div>
            <div class="jeniscar">
                <div class="cuandprior">
                    <div class="jenis-card">
                        <h2>Kenapa Memilih Kita?</h2>
                        <div class="garis"></div>
                        <p>Selamat datang di Gaspol, layanan rental motor terpercaya hadir untuk memenuhi kebutuhan Anda. Dari 
                            perjalanan sehari-hari ke kantor atau kuliah sampai petualangan spektakuler, kami menyediakan 
                            pilihan motor yang beragam dan terawat dengan harga yang kompetitif, plus pemesanan yang 
                            mudah dan cepat. Gaspol tidak hanya menyediakan motor untuk disewa, tapi juga pengalaman yang tak 
                            terlupakan.
                        </p>


                    </div>
                    <div class="jenis-card">
                        <h2>Prioritas Kami</h2>
                        <div class="garis"></div>
                        <p>Di Gaspol, kami menggunakan sistem PRIORITAS sebagai prioritas kami:<br>
                            (P)elayanan yang cepat dan tanggap<br>
                            (R)amah lingkungan<br>
                            (I)novasi berkelanjutan<br>
                            (O)ptimalkan kenyamanan<br>
                            (R)incian harga transparan<br>
                            (I)ntegritas dan kepercayaan<br>
                            (T)angguh dan terawat<br>
                            (A)man berkendara<br>
                            (S)olusi fleksibel<br>
                            </p>

                        </div>
                    </div>
                    <div class="jenis-card-panjang">
                        <h2>Hubungi Kami</h2>
                        <div class="garis"></div>
                        <p>Untuk pertanyaan, saran, dan bantuan apa pun, silakan menghubungi tim Customer Service kami
                            yang tertera. Kami tidak sabar untuk mendengar opini Anda demi meningkatkan pelayanan
                            kami dan menjadikan pengalaman sewa Anda berkesan.
                        </p>

                    </div>
                </div>

            <div class="devs">
                <h1>Temui Devs dari Gaspol</h1>
                <div class="textDevs">
                    <!-- Developer 1 -->
                    <div class="dev">
                        <h2>Idham Muhamad Akbar</h2>
                    </div>

                    <!-- Developer 2 -->
                    <div class="dev">
                        <h2>Muhammad Nadhil Luthfirahman</h2>
                    </div>

                    <!-- Developer 3 -->
                    <div class="dev">
                        <h2>Orvin Kent</h2>
                    </div>
                </div>
            </div>
        </section>

        @include('footer')
</x-app-layout>