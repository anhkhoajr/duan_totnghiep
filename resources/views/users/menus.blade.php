@extends('layoutUser.layout')

@section('title', 'Home Page') <!-- Đặt title cho trang -->

@section('content')
    <h2>Welcome to the Home Page</h2>
    <p>This is the content of the home page.</p>
@endsection
<main>
    <article>

      <!-- 
        - #Phần Giới Thiệu Chính
      -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
              <img src="{{asset('users/assets/images/hero-slider-1.jpg')}}" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">MENUS</p>

            <h1 class="display-1 hero-title slider-reveal">
                Vì tình yêu dành cho <br>
                ẩm thực ngon lành
            </h1>

            <p class="body-2 hero-text slider-reveal">
                Hãy đến cùng gia đình và tận hưởng niềm vui từ những món ăn ngon tuyệt hảo
            </p>

         

          </li>
        </ul>

        <button class="slider-btn prev" >
         
        </button>

        <button class="slider-btn next" >
          
        </button>

        <a href="#" class="hero-btn has-after">
          <img src="{{asset('users/assets/images/hero-icon.png')}}" width="48" height="48" alt="booking icon">

          <span class="label-2 text-center span">Đặt Bàn Ngay</span>
        </a>

      </section>





      <!-- 
        - #Thực Đơn
      -->

      
        <div class="container menu2 section-menu"> 
            <!-- lọc -->
             <div class="filter-bar " data-filter-bar>
                <div class="title-wrapper">
                    <span class="material-symbols-outlined" aria-hidden="true">filter_list</span>

                    <p class="title-medium">
                        Bộ Lọc
                    </p>

                    <button class="close-btn has-state" aria-label="Close filter bar" data-filter-toggler>
                        <span class="material-symbols-outlined" aria-hidden="true">close</span>
                    </button>
                </div>

                <div class="filter-content">
                    <div class="search-wrapper">
                        <div class="input-outlined">
                            <label for="search" class="body-large label">
                                Tìm Kiếm
                            </label>
                            <input type="search" name="search" id="search" placeholder="Tìm Món" class="input-field body-large">
                        </div>
                    </div>
                    <div class="accordion-container" data-accordion>
                        <button class="accordion-btn has-state" aria-controls="cook-time" aria-expanded="false" data-accordion-btn>
                            <span class="material-symbols-outlined" aria-hidden="true">timer</span>
                            <p class="label-large">Thời Gian Nấu</p>
                            <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                        </button>
                        <div class="accordion-content" id="cook-time">
                            <div class="accordion-overflow"  data-filter="time">
                                <label class="filter-chip label-large">
                                    &lt; 5 phút
                                    <input type="checkbox" name="cook-time" id="" value="5" aria-label="5 hoặc ít hơn" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 5 phút - 10 phút
                                    <input type="checkbox" name="cook-time" id="" value="5-10" aria-label="5 hoặc 10 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 10 phút - 20 phút
                                    <input type="checkbox" name="cook-time" id="" value="10-20" aria-label="10 hoặc 20 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 20 phút - 30 phút
                                    <input type="checkbox" name="cook-time" id="" value="20-30" aria-label="20 hoặc 30 phút" class="checkbox">
                                </label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-container" data-accordion>
                        <button class="accordion-btn has-state" aria-controls="cook-time" aria-expanded="false" data-accordion-btn>
                            <span class="material-symbols-outlined" aria-hidden="true">timer</span>
                            <p class="label-large">Calo</p>
                            <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                        </button>
                        <div class="accordion-content" id="cook-time">
                            <div class="accordion-overflow" data-filter="time">
                                <label class="filter-chip label-large">
                                    &lt; 100 calo
                                    <input type="checkbox" name="cook-time" id="" value="100" aria-label="5 hoặc ít hơn" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 100 - 200 calo
                                    <input type="checkbox" name="cook-time" id="" value="100-200" aria-label="5 hoặc 10 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 10 phút - 20 phút
                                    <input type="checkbox" name="cook-time" id="" value="10-20" aria-label="10 hoặc 20 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 20 phút - 30 phút
                                    <input type="checkbox" name="cook-time" id="" value="20-30" aria-label="20 hoặc 30 phút" class="checkbox">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-container" data-accordion>
                        <button class="accordion-btn has-state" aria-controls="cook-time" aria-expanded="false" data-accordion-btn>
                            <span class="material-symbols-outlined" aria-hidden="true">timer</span>
                            <p class="label-large">Thời Gian Nấu</p>
                            <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                        </button>
                        <div class="accordion-content" id="cook-time">
                            <div class="accordion-overflow" data-filter="time">
                                <label class="filter-chip label-large">
                                    &lt; 5 phút
                                    <input type="checkbox" name="cook-time" id="" value="5" aria-label="5 hoặc ít hơn" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 5 phút - 10 phút
                                    <input type="checkbox" name="cook-time" id="" value="5-10" aria-label="5 hoặc 10 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 10 phút - 20 phút
                                    <input type="checkbox" name="cook-time" id="" value="10-20" aria-label="10 hoặc 20 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 20 phút - 30 phút
                                    <input type="checkbox" name="cook-time" id="" value="20-30" aria-label="20 hoặc 30 phút" class="checkbox">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-container" data-accordion>
                        <button class="accordion-btn has-state" aria-controls="cook-time" aria-expanded="false" data-accordion-btn>
                            <span class="material-symbols-outlined" aria-hidden="true">timer</span>
                            <p class="label-large">Thời Gian Nấu</p>
                            <span class="material-symbols-outlined trailing-icon" aria-hidden="true">expand_more</span>
                        </button>
                        <div class="accordion-content" id="cook-time">
                            <div class="accordion-overflow" data-filter="time">
                                <label class="filter-chip label-large">
                                    &lt; 5 phút
                                    <input type="checkbox" name="cook-time" id="" value="5" aria-label="5 hoặc ít hơn" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 5 phút - 10 phút
                                    <input type="checkbox" name="cook-time" id="" value="5-10" aria-label="5 hoặc 10 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 10 phút - 20 phút
                                    <input type="checkbox" name="cook-time" id="" value="10-20" aria-label="10 hoặc 20 phút" class="checkbox">
                                </label>
                                <label class="filter-chip label-large">
                                    &lt; 20 phút - 30 phút
                                    <input type="checkbox" name="cook-time" id="" value="20-30" aria-label="20 hoặc 30 phút" class="checkbox">
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="filter-action">
                    
                    <button class="btn btn-seacondary label-large has-state" data-filter-clear >
                        <span class="text text-1">Xóa</span>

                        <span class="text text-2" aria-hidden="true">Xóa</span>
                        
                    </button>
                    
                    <button class="btn btn-primary label-large" data-filter-toggler data-filter-submit>
                        <span class="text text-1">Ok</span>

                        <span class="text text-2" aria-hidden="true">OK</span>                   
                     </button>
                </div>
             </div>
             <div class="overlay" data-overlay data-filter-toggler>
             </div>
             <div class="thucdon-container container">
                <div class="title-wrapper">
                    <h2 class="headline-small">Tất Cả Thực Đơn</h2>
                    <button class="btn-menu btn-menu-secondary btn-filter has-state" aria-label="Mở Bảng Lọc" data-filter-toggler data-filter-btn>
                        <span class="material-symbols-outlined" aria-hidden="true">filter_list</span>
                        <div class="wrapper">
                            <span class="label-text">
                                Lọc
                            </span>
                            <div class="badge label-small" data-filter-count>
                                9
                            </div>
                        </div>
                    </button>
                    
                </div>
                <div class="grid-list-menu" data-grid-list>
                    <!-- phần này nếu muốn chờ load sản phẩm lên để hiện sản phẩm load thì dùng ko thì dùng cái card-menu để hiện sẩn phẩm bên dưới -->
                    <div class="card-menu skeleton-card"> 
                        <div class="skeleton card-banner"></div>
                        <div class="card-body">
                            <div class="skeleton card-title"></div>
                            <div class="skeleton card-text"></div>
                        </div>
                    </div>
                    <!-- cái này để hiện sản phẩm nè -->
                    <div class="card-menu">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/menu-6.png')}}" alt="Tên món" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>    
                            </h3>
                            <div class="meta-wrapper">
                                <div class="meta-item">
                                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                    <span class="label-medium">2 phút</span>
                                </div>
                                <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                                    <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                    <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-menu">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/menu-6.png')}}" alt="Tên món" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>    
                            </h3>
                            <div class="meta-wrapper">
                                <div class="meta-item">
                                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                    <span class="label-medium">2 phút</span>
                                </div>
                                <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                                    <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                    <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-menu">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/menu-6.png')}}" alt="Tên món" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>    
                            </h3>
                            <div class="meta-wrapper">
                                <div class="meta-item">
                                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                    <span class="label-medium">2 phút</span>
                                </div>
                                <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                                    <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                    <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-menu">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/menu-6.png')}}" alt="Tên món" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>    
                            </h3>
                            <div class="meta-wrapper">
                                <div class="meta-item">
                                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                    <span class="label-medium">2 phút</span>
                                </div>
                                <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                                    <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                    <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card-menu skeleton-card">
                        <div class="skeleton card-banner"></div>
                        <div class="card-body">
                            <div class="skeleton card-title"></div>
                            <div class="skeleton card-text"></div>
                        </div>
                    </div>
                    <div class="card-menu">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/2024-03-18.png')}}" alt="Tên món" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>    
                            </h3>
                            <div class="meta-wrapper">
                                <div class="meta-item">
                                    <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                                    <span class="label-medium">2 phút</span>
                                </div>
                                <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                                    <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                                    <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <a href="" class="btn btn-secondary label-large has-state">
                    <span class="text text-1 text-center">
                Xem Thêm
                </span>
                <span class="text text-2" aria-label="true">
                    Xem Thêm
                </span>
            </a>
                
                <div class="load-more grid-list" data-load-more>
                    <p class="body-medium info-text">
                        Blablalablalal
                    </p>
                </div>
                    <!-- <div class="card skeleton-card">
                        <div class="skeleton card-banner">

                        </div>
                        <div class="card-body">
                            <div class="skeleton card-title">
                                <div class="skeleton card-text">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <figure class="card-media img-holder-menu">
                            <img src="{{asset('users/assets/images/menu-6.png')}}" alt="" width="200" height="200" loading="lazy" class="img-cover-menu" >
                        </figure>
                        <div class="card-body">
                            <h3 class="title-small">
                                <a href="{{ route('users.chitiet') }}" class="card-link">
                                    Món Ăn
                                </a>

                            </h3>
                            <div class="meta-wrapper">
                                <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                            </div>
                            <span class="label-medium">2 phút</span>
                        </div>
                        <button class="icon-btn has-state removed" aria-label="thêm vào giỏ hàng">
                            <span class="material-symbols-outlined bookmark-add" aria-hidden="true">bookmark_add</span>
                            <span class="material-symbols-outlined bookmark" aria-hidden="true">bookmark</span>
                        </button>
                        
                    </div>
                    
                </div>
                <a href="" class="btn btn-secondary label-large has-state">Xem Chi Tiết</a> -->
               
            </div>
           
            <!-- ảnh nền -->
          <img src="{{asset('users/assets/images/shape-5.png')}}" width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="{{asset('users/assets/images/shape-6.png')}}" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
    


      <!-- 
        - #Thế Mạnh
      -->

      <section class="section features text-center" aria-label="features">
        <div class="container">

          <p class="section-subtitle label-2">Tại Sao Nên Chọn Chúng Tôi</p>

          <h2 class="headline-1 section-title">Thế Mạnh</h2>

          <ul class="grid-list">

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="{{asset('users/assets/images/features-icon-1.png')}}" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Thực phẩm an toàn</h3>

                <p class="label-1 card-text">Thực phẩm an toàn giúp bảo vệ sức khỏe và dinh dưỡng.</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="{{asset('users/assets/images/features-icon-2.png')}}" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Môi trường dễ chịu</h3>

                <p class="label-1 card-text">Môi trường trong lành tạo cảm giác thư giãn và dễ chịu</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="{{asset('users/assets/images/features-icon-3.png')}}" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Đầu bếp có tay nghề</h3>

                <p class="label-1 card-text">Đầu bếp tài năng mang đến những món ăn tuyệt vời</p>

              </div>
            </li>

            <li class="feature-item">
              <div class="feature-card">

                <div class="card-icon">
                  <img src="{{asset('users/assets/images/features-icon-4.png')}}" width="100" height="80" loading="lazy" alt="icon">
                </div>

                <h3 class="title-2 card-title">Sự kiện & Tiệc</h3>

                <p class="label-1 card-text">Sự kiện và tiệc tùng mang đến niềm vui cho mọi người.</p>

              </div>
            </li>

          </ul>

        </div>
      </section>





    </article>
</main>