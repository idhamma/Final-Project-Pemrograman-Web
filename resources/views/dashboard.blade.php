<x-app-layout>

<link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
    <!-- SECOND NAV BAR -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Welcome ') . Auth::user()->name }}
            </h2>
            <div class="flex items-center space-x-2">
                <form id="search-form" action="{{ url('/RecommendationPage') }}" method="GET">
                    <select name="location" class="border border-gray-300 rounded-md p-2">
                        <option value="Malang">Malang</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bali">Bali</option>
                    </select>
                    <input type="date" name="rent-date" class="border border-gray-300 rounded-md p-2" required>
                    <input type="date" name="return-date" class="border border-gray-300 rounded-md p-2" required>
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
                    <label class="checkbox-container">
                        <input type="checkbox" id="relevance">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Relevance</span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" id="best-rating">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Best Rating</span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" id="distance">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Distance</span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" id="price-low-to-high">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Price Low to High</span>
                    </label>
                    <label class="checkbox-container">
                        <input type="checkbox" id="price-high-to-low">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Price High to Low</span>
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
                    <label class="checkbox-container">
                        <input type="checkbox" id="electric">
                        <span class="checkmark"></span>
                        <span class="checkbox-label">Electric</span>
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

        <!-- Main Content Area -->
        <div class="flex-1 p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Product Catalogue -->
            @php
                $motorcycles = App\Models\Motorcycle::all(); // Retrieve all motorcycles from the database
            @endphp

            @foreach ($motorcycles as $motorcycle)
            <div class="product-catalogue-1">
            <div class="catalogue-1-bar"></div>
            <div class="Motorcycle-name">{{ $motorcycle->name }}</div>
            <div class="Motorcycle-fee">Rp.{{ $motorcycle->fee }} / Day</div>
            <div class="description">{{ $motorcycle->plat_number }} | {{ $motorcycle->cc}} cc |  {{ $motorcycle->category}} |  {{ $motorcycle->location}}</div>
            <img class="image" src="storage/{{ $motorcycle->image }}" alt="Motorcycle Image" />
            </div>
            @endforeach
        </div>
        </div>
    </div>
</x-app-layout>