<x-app-layout>
<link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">

<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome ') . Auth::user()->name }}
        </h2>
        <div class="flex items-center space-x-2">
            <form id="search-form" action="" method="GET">
                <select id="location" name="location" class="border border-gray-300 rounded-md p-2">
                    <option value="">All location</option>
                    <option value="Malang">Malang</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Bali">Bali</option>
                </select>
                <input type="date" name="rental_date" class="border border-gray-300 rounded-md p-2" required>
                <input type="date" name="return_date" class="border border-gray-300 rounded-md p-2" required>
                <button type="submit" id="tombol" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
            </form>
        </div>
    </div>
</x-slot>

<div class="flex">
    <!-- Filter Box -->
    <div class="group-35">
        <div>
            <div class="section">
                <div class="section-title">SORT BY</div>
                <label class="radio-container">
                    <input type="radio" name="sort" id="price-low-to-high">
                    <span class="checkmark"></span>
                    <span class="radio-label">Price Low to High</span>
                </label>
                <label class="radio-container">
                    <input type="radio" name="sort" id="price-high-to-low">
                    <span class="checkmark"></span>
                    <span class="radio-label">Price High to Low</span>
                </label>
            </div>
            <div class="section">
                <div class="section-title">TRANSMISSION TYPE</div>
                <label class="checkbox-container">
                    <input type="checkbox" id="matic">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Matic</span>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" id="manual">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Manual</span>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" id="clutch">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Clutch</span>
                </label>
            </div>
            <div class="section">
                <div class="section-title">FUEL TYPE</div>
                <label class="checkbox-container">
                    <input type="checkbox" id="gasoline">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Gasoline</span>
                </label>
                <label class="checkbox-container">
                    <input type="checkbox" id="electric2">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Electric</span>
                </label>
            </div>
        </div>
        <div class="button-container">
            <div class="button reset">RESET</div>
            <div class="button apply">APPLY</div>
        </div>
    </div>

    <div class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @php
        $location = request()->input('location');
        if($location == null) {
            $motorcycles = App\Models\Motorcycle::where('status', true)->get();
        } else {
            $motorcycles = App\Models\Motorcycle::where('location', $location)->where('status', true)->get();
        }
        @endphp

        @foreach ($motorcycles as $motorcycle)
        <div class="product-catalogue-1">
            <div class="catalogue-1-bar"></div>
            <div class="Motorcycle-name">{{$motorcycle->brand}} {{ $motorcycle->name }} {{$motorcycle->year}}</div>
            <div class="Motorcycle-fee">Rp.{{ $motorcycle->fee }} / Day</div>
            <div class="description">{{ $motorcycle->plat_number }} | {{ $motorcycle->cc}} cc |  {{ $motorcycle->category}} |  {{ $motorcycle->location}}</div>
            <button type="button" class="rent-now-button" onclick="rentNow({{$motorcycle->id}})">Rent Now</button>

            <script>
            function rentNow(id) {
                let params = new URLSearchParams(window.location.search);
                let rentDate = params.get('rental_date');
                let returnDate = params.get('return_date');

                console.log(rentDate);
                console.log(returnDate);

                if (rentDate != null && returnDate != null) {
                    $.ajax({
                        url: '/getMotorcycle/' + id,
                        method: 'GET',
                        success: function(response) {
                            var motorcycle = response;
                            var rentDateObj = new Date(rentDate);
                            var returnDateObj = new Date(returnDate);
                            var days = Math.ceil((returnDateObj - rentDateObj) / (1000 * 60 * 60 * 24));
                            var totalFee = days * motorcycle[0].fee;

                            var id = motorcycle[0].id;
                            var brand = motorcycle[0].brand;
                            var name = motorcycle[0].name;
                            var year = motorcycle[0].year;
                            var plat_number = motorcycle[0].plat_number;
                            var location = motorcycle[0].location;

                            if (confirm(`Anda akan memesan motor ` + brand + ` ` + name + ` ` + year + ` ` + plat_number + ` selama ` + days + ` hari dengan total biaya Rp. ` + totalFee + `. Lanjutkan?`)) {
                                $.ajax({
                                    url: '/rentMotorcycle',
                                    method: 'POST',
                                    data: {
                                        id_user: {{ Auth::user()->id }},
                                        id_motorcycle: id,
                                        status: 'Booked',
                                        rental_date: rentDate,
                                        return_date: returnDate,
                                        location: location,
                                        duration: days,
                                        total_fee: totalFee,
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function() {
                                        alert('Transaksi berhasil! Motor telah dipesan.');
                                        location.reload();
                                    },
                                    error: function(xhr) {
                                        console.error('Error saat melakukan transaksi: ', xhr);
                                        alert('Gagal melakukan transaksi. Silakan coba lagi.');
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error('Error saat mendapatkan data motor: ', xhr);
                            alert('Gagal mendapatkan data motor. Silakan coba lagi.');
                        }
                    });
                } else {
                    alert('Silakan pilih tanggal sewa dan tanggal pengembalian.');
                }
            }

            </script>

            <img class="image" src="storage/{{ $motorcycle->image }}" alt="Motorcycle Image" />
        </div>
        @endforeach
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-layout>
