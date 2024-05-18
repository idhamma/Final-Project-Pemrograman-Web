<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/motorcycles.css" type="text/css">
    <title>motor page </title>
</head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Motorcycle') }}
        </h2>
    </x-slot>

    <section>
        <div class="textkategori">
            <h1>Cek Motor-Motor yang Kita Sediakan!</h1>
        </div>

        <div class="jeniscar">
            <div class="jenis-card">
                <h2>Motor Bebek</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="bebek">
                <p>Motor bebek, pilihan praktis untuk perjalanan sehari-hari dengan desain ramping dan konsumsi bahan 
                    bakar yang irit. Mudah dikendarai dan lincah di jalan, motor bebek dari Gaspol siap memberikan 
                    kenyamanan dan efisiensi setiap hari.
                </p>
            </div>

            <div class="jenis-card">
                <h2>Matic</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="automatic">
                <p>Motor matic, kendaraan stylish dan ergonomis yang menawarkan kemudahan manuver dan efisiensi bahan 
                    bakar. Praktis dan nyaman, motor matic dari Gaspol siap menemani Anda menembus kemacetan dengan gaya.
                </p>
            </div>

            <div class="jenis-card">
                <h2>Off-road</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="offroad">
                <p>Motor off-road, dirancang untuk menaklukkan medan terjal dengan performa tangguh dan suspensi handal.
                    Ideal untuk petualangan ekstrem, motor off-road dari Gaspol siap membawa Anda menjelajahi alam bebas 
                    dengan percaya diri.
                </p>
            </div>

            <div class="jenis-card">
                <h2>Sports</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="sports">
                <p>Motor sport, simbol kecepatan dan gaya dengan desain aerodinamis dan performa tinggi. Dirancang untuk 
                    pengalaman berkendara yang mendebarkan, motor sport dari Gaspol menawarkan tenaga maksimal dan handling 
                    presisi. Pilih motor sport dan rasakan adrenalin di setiap perjalanan!
                </p>
            </div>

            <div class="jenis-card">
                <h2>Motor Gede</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="moge">
                <p>Moge atau motor gede, kendaraan mewah yang menawarkan kekuatan dan kenyamanan luar biasa. Dengan mesin 
                    berkapasitas besar dan desain yang gagah, moge dari Gaspol memberikan pengalaman berkendara premium. 
                    Nikmati sensasi perjalanan yang penuh tenaga dan prestise!
                </p>
            </div>

            <div class="jenis-card">
                <h2>Electric</h2>
                <div class="garis"></div>
                <img src="image/sample/motor.png" alt="electric">
                <p>Motor electric, solusi ramah lingkungan dengan teknologi canggih untuk berkendara hening dan bebas emisi.
                    Hemat energi dan biaya operasional, motor electric dari Gaspol memberikan pengalaman berkendara modern 
                    dan berkelanjutan.
                </p>
            </div>
        </div>
    </section>

        @include('footer')
</x-app-layout>