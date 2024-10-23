<header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="{{asset('users/assets/images/logo.svg')}}" width="160" height="50" alt="FWN - Home">
      </a>
      
      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="{{asset('users/assets/images/logo.svg')}}" width="160" height="50" alt="FWN - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="{{ route('home') }}" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Trang Chủ</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="{{ route('products.menus') }}" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Menus</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Về Chúng Tôi</span>
            </a>
          </li>
          <li class="navbar-item">
            <a href="" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Tài Khoản </span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Blog</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Liên Hệ</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Thăm Quan</p>

          <address class="body-4">
            FWN Restaurant, HCM City, <br>
            Quận Tân Bình,64 Nguyễn Phúc Chu
          </address>

          <p class="body-4 navbar-text">Mở Cửa: 9.30 am - 2.30pm</p>

          <a href="mailto:FWN@restaurant.com" class="body-4 sidebar-link">FWN@restaurant.com</a>

          <div class="separator"></div>

          <p class="contact-label">Booking Request</p>

          <a href="tel:0962615522" class="body-1 contact-number hover-underline">
            096-2615-522
          </a>
        </div>

      </nav>

      
      
      <a href="#" class="btn btn-secondary">
        <span class="text text-1"><ion-icon name="cart-outline"></ion-icon></span>

        <span class="text text-2" aria-hidden="true"><ion-icon name="cart-outline"></ion-icon></span>
        
      </a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>