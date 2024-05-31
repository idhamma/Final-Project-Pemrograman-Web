<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Location</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Start Date</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">End Date</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Status</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Duration (days)</th>
                                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Price</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php
                                    $transactions = App\Models\Transaction::where('id_user', Auth::user()->id)->get();
                                @endphp

                                @foreach($transactions as $transaction)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->location }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->rental_date }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->return_date }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->status }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->duration }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $transaction->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

