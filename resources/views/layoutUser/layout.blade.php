<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWN - Amazing & Delicious Food</title>
    <meta name="tile" content="FWN - Amazing & Delicious Food">
    <meta name="description" content="Đây Là Giao Diện HTML Được Phát Triển Bởi FWN-Team">
    <!--- Favico  -->
    <link rel="shortcut icon" href="./favicon.svg" type="images/svg+xml">
    <!--- google front link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
    <!--- link Css-->
    <link rel="stylesheet" href="{{asset('users/assets/css/style.css')}}">
    <!--- Load Hình Ảnh   -->
    <link rel="preload" as="image" href="{{asset('users/assets/images/hero-slider-1.jpg')}}">
    <link rel="preload" as="image" href="{{asset('users/assets/images/hero-slider-2.jpg')}}">
    <link rel="preload" as="image" href="{{asset('users/assets/images/hero-slider-3.jpg')}}">
</head>

<body id="top">
    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text">FWN</p>
    </div>
    <div class="topbar">
        <div class="container">

            <address class="topbar-item">
                <div class="icon">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">
                    FWN Restaurant,64 Nguyễn Phúc Chu,Phường 15,Quận Tân Bình,TP.HCM
                </span>
            </address>

            <div class="separator"></div>

            <div class="topbar-item item-2">
                <div class="icon">
                    <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">Hoạt Động : 8.00 am to 10.00 pm</span>
            </div>

            <a href="tel:0962615522" class="topbar-item link">
                <div class="icon">
                    <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">096-2615-522</span>
            </a>

            <div class="separator"></div>

            <a href="mailto:FWN@restaurant.com" class="topbar-item link">
                <div class="icon">
                    <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                </div>

                <span class="span">FWN@restaurant.com</span>
            </a>

        </div>
    </div>
    <header>
        <h1>@yield('title')</h1>
    </header>
    @include('layoutUser.header')

    <main>
        @yield('users.content')
    </main>
    @include('layoutUser.footer')
    <!-- 
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>






    <!-- 
    - custom js link
  -->
    <script src="{{asset('users/assets/js/script.js')}}"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>