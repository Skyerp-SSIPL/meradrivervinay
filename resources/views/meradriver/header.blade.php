<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Job Listing</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!--
         CSS
         ============================================= -->
    <link rel="stylesheet" href="{{asset('meradriver/css/linearicons.css')}}"><link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="{{asset('meradriver/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('meradriver/css/main.css')}}">
</head>

<body>
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{route('home')}}"><img src="{{asset('meradriver/img/pages/stock-photo (2).png')}}" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{route('jobs')}}">Job</a></li>
                        <li><a href="{{route('company')}}">Driver</a></li>
                       
                        <li><a href="{{route('price')}}">Customer</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                                             
                        <!-- <li><label for="toggle-register" class="ticker-btn" style="cursor: pointer;">Register</label></li> -->
                        <li><label for="toggle-login" class="ticker-btn-login" style="cursor: pointer;">Login / Sign Up</label></li>
                    </ul>
                </nav>
            </div>
        </div>
        <input type="checkbox" id="toggle-register" hidden>
        <!-- Register Form (Hidden by default) -->
        <div id="register-form">
            <!-- Close button (label toggles checkbox off) -->
            <label for="toggle-register" class="close-btn">&times;</label>
            <div class="form-content">
                <h2>Register</h2>
                <form>
                    <input type="text" placeholder="First Name" required>
                    <input type="text" placeholder="Last Name" required>
                    <input type="email" placeholder="Email" required>
                    <input type="password" placeholder="Password" required>
                    <input type="tel" placeholder="Mobile Number" required>
                    <label class="checkbox d-flex align-items-center">
                        <input type="checkbox" class="mx-2" required> I agree to Terms & Privacy
                    </label>
                    <button type="submit">Register Now</button>
                </form>
            </div>
        </div>
        <!-- login -->
        <input type="checkbox" id="toggle-login" hidden>
        <!-- Login Form Modal -->
        <div id="login-form">
            <label for="toggle-login" class="close-btn">&times;</label>
            <div class="form-content">
                <h2>Login with Mobile OTP</h2>
                <form>
                    <input type="tel" placeholder="Enter Mobile Number" required>
                    <button type="submit">Get OTP</button>
                    <p class="note">You'll receive a One-Time Password via SMS</p>
                </form>
            </div>
        </div>
    </header>