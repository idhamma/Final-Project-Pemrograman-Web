<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Homepage</title>
</head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Selamat Datang') }}
        </h2>
    </x-slot>
    
<!--Main-->
<section>
    <br>
    <br>

    <div class="slogan">
        <h1>Start Your Own Riding Now!</h1>
        <br>
        <br>
        <h2>Jelajahi Malang, Surabaya, dan Bali bersama Gaspol</h2>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="explore">
        <a href="{{ route('dashboard') }}">Jelajahi Sekarang</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="main-content">
        <!--Layanan-->
        <section class="layanan">
            <h3 class="judul-section">Layanan Kami</h3>
            <div class="layanan-cards">
                <div class="layanan-card">
                    <i class="fas fa-motorcycle"></i>
                    <h4>Layanan Rental Cepat</h4>
                    <p>Sewa motor dengan cepat menggunakan website canggih Gaspol, dengan layanan 24 jam dan respons seperti kilat</p>
                </div>
                <div class="layanan-card">
                    <i class="fas fa-tools"></i>
                    <h4>Perawatan & Service</h4>
                    <p>Tersedia perawatan dan service untuk memastikan motor selalu dalam kondisi terbaik untuk petualangan Anda</p>
                </div>
                <div class="layanan-card">
                    <i class="fas fa-road"></i>
                    <h4>Jajaran Motor yang Bervariasi</h4>
                    <p>Lineup motor yang lengkap sesuai dengan kebutuhan petualangan Anda</p>
                </div>
            </div>
        </section>
        <br>

        <!--Testimoni-->
        <section class="testimoni">
            <h3 class="judul-section">Testimoni Pelanggan</h3>
            <div class="testimoni-cards">
                <div class="testimoni-card">
                    <p>"Gaspol sangat memudahkan saya dalam menyewa motor! Prosesnya cepat, pilihannya banyak, dan pelayanannya luar biasa."</p>
                    <span>- Wawan, Jakarta</span>
                </div>
                <div class="testimoni-card">
                    <p>"Sangat puas dengan layanan Gaspol. Motor yang saya sewa dalam kondisi prima dan harga sewanya sangat terjangkau."</p>
                    <span>- Gusti, Garut</span>
                </div>
                <div class="testimoni-card">
                    <p>"Gaspol benar-benar mengutamakan kenyamanan pelanggan. Situsnya mudah digunakan dan tim customer servicenya sangat responsif!"</p>
                    <span>- Virga, Jember</span>
                </div>
                <div class="testimoni-card">
                    <p>"Gaspol keren"</p>
                    <span>- Putu, Bali</span>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
    </div>
</section>

    @include('footer')
</x-app-layout>