<head>
<link rel="stylesheet" href="assets/css/transactions.css" type="text/css">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction ') }}
        </h2>
    </x-slot>

    <div class="my-container">
    <div class="my-container-inner">
        <div class="my-box">
            <div class="my-box-inner transaction-container">
                {{ __("There is no transaction") }}
            </div>
        </div>
    </div>
</div>
</x-app-layout>