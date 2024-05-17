<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navigation_bar.css" type="text/css">
    <title>Document</title>
</head>
<body>
        <!-- NAVBAR -->
        @if(Auth::check())
            <nav>
                <ul>
                    <li><img src="image/logo.png" alt="logo"></li>
                    <li href="#"><a href="{{ route('homepage') }}">Homepage</a></li>
                    <li href="#"><a href="{{ route('aboutus') }}">About Us</a></li>
                    <li href="#"><a href="{{ route('motorcycles') }}">Motorcyles</a></li>
                    <li href="#"><a href="{{ url('/TransactionPage') }}">My Transaction</a></li>

                    <x-dropdown-link :href="route('profile.edit')">
                            {{ __('My Account') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                    </form>
                </ul>
            </nav>
        @else
            <nav>
                <ul>
                    <li><img src="image/logo.png" alt="logo"></li>
                    <li href="#"><a href="{{ route('homepage') }}">Homepage</a></li>
                    <li href="#"><a href="{{ route('aboutus') }}">About Us</a></li>
                    <li href="#"><a href="{{ route('motorcycles') }}">Carstest</a></li>
                    <li href="#"><a href="{{ route('login') }}">Login</a></li>
                    <li href="#"><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </nav>
        @endif

</body>
</html>