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
        <nav>
        <ul>
            <li href="#"><a href="homepage.blade.php">Homepage</a></li>
            <li href="#"><a href="{{ url('/AboutUs') }}">AboutUs</a></li>
            <li href="#"><a href="{{ url('/CarsPage') }}">Cars</a></li>
            <li href="#"><a href="{{ url('/TransactionPage') }}">My Transaction</a></li>
            <li href="#"><a href="{{ url('/myaccountpage/MyAccountPage_Login') }}">My Account</a></li>
            <li><img src="image/logo_draft.png" alt="logo_gambar"></li>
        </ul>
    </nav>
</body>
</html>