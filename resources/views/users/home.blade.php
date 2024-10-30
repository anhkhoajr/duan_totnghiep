<!-- resources/views/home.blade.php -->
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

          <p class="label-2 section-subtitle slider-reveal">Truyền Thống & Vệ Sinh</p>
          <h1 class="display-1 hero-title slider-reveal">
            Vì tình yêu dành cho <br>
            ẩm thực ngon lành
          </h1>

          <p class="body-2 hero-text slider-reveal">
            Hãy đến cùng gia đình và tận hưởng niềm vui từ những món ăn ngon tuyệt hảo
          </p>

          <a href="menus.html" class="btn btn-primary slider-reveal">
            <span class="text text-1">Xem Menu</span>

            <span class="text text-2" aria-hidden="true">Xem Menu</span>
          </a>

        </li>

        <li class="slider-item" data-hero-slider-item>

          <div class="slider-bg">
            <img src="{{asset('users/assets/images/hero-slider-2.jpg')}}" width="1880" height="950" alt="" class="img-cover">
          </div>

          <p class="label-2 section-subtitle slider-reveal">Trải Nghiệm Thú Vị</p>

          <h1 class="display-1 hero-title slider-reveal">
            Hương vị lấy cảm hứng <br>
            từ các mùa
          </h1>

          <p class="body-2 hero-text slider-reveal">
            Cùng gia đình đến và cảm nhận niềm vui từ những món ăn ngon khó cưỡng
          </p>

          <a href="menus.html" class="btn btn-primary slider-reveal">
            <span class="text text-1">Xem Menu</span>

            <span class="text text-2" aria-hidden="true">Xem Menu</span>
          </a>

        </li>

        <li class="slider-item" data-hero-slider-item>

          <div class="slider-bg">
            <img src="{{asset('users/assets/images/hero-slider-3.jpg')}}" width="1880" height="950" alt="" class="img-cover">
          </div>

          <p class="label-2 section-subtitle slider-reveal">Tuyệt Vời & Ngon Miệng</p>

          <h1 class="display-1 hero-title slider-reveal">
            Nơi mỗi hương vị kể <br>
            một câu chuyện
          </h1>

          <p class="body-2 hero-text slider-reveal">
            Hãy đưa gia đình đến và thưởng thức niềm vui từ những món ăn hấp dẫn
          </p>

          <a href="menu" class="btn btn-primary slider-reveal">
            <span class="text text-1">Xem Menu</span>

            <span class="text text-2" aria-hidden="true">Xem Menu</span>
          </a>

        </li>

      </ul>

      <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
        <ion-icon name="chevron-back"></ion-icon>
      </button>

      <button class="slider-btn next" aria-label="slide to next" data-next-btn>
        <ion-icon name="chevron-forward"></ion-icon>
      </button>

      <a href="#" class="hero-btn has-after">
        <img src="{{asset('users/assets/images/hero-icon.png')}}" width="48" height="48" alt="booking icon">

        <span class="label-2 text-center span">Đặt Bàn Ngay</span>
      </a>

    </section>





    <!-- 
        - #Dịch Vụ
      -->

    <section class="section service bg-black-10 text-center" aria-label="service">
      <div class="container">

        <p class="section-subtitle label-2">Hương vị dành cho bậc vương giả</p>

        <h2 class="headline-1 section-title">Chúng Tôi Cung Cấp Dịch Vụ Hàng Đầu</h2>

        <p class="section-text">
          Chúng tôi cung cấp dịch vụ hàng đầu với những món ăn tuyệt vời được chế biến từ nguyên liệu tươi ngon nhất. Đội ngũ đầu bếp tài năng của chúng tôi không chỉ tạo ra những hương vị độc đáo mà còn mang đến trải nghiệm ẩm thực tuyệt vời cho mỗi khách hàng. Hãy đến với chúng tôi để cảm nhận sự khác biệt và tận hưởng những giây phút đáng nhớ bên gia đình và bạn bè
        </p>

        <ul class="grid-list">

          <li>
            <div class="service-card">

              <a href="#" class="has-before hover:shine">
                <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <img src="{{asset('users/assets/images/service-1.jpg')}}" width="285" height="336" loading="lazy" alt="Breakfast"
                    class="img-cover">
                </figure>
              </a>

              <div class="card-content">

                <h3 class="title-4 card-title">
                  <a href="#">Bữa Sáng</a>
                </h3>

                <a href="#" class="btn-text hover-underline label-2">Xem Menu</a>

              </div>

            </div>
          </li>

          <li>
            <div class="service-card">

              <a href="#" class="has-before hover:shine">
                <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <img src="{{asset('users/assets/images/service-2.jpg')}}" width="285" height="336" loading="lazy" alt="Appetizers"
                    class="img-cover">
                </figure>
              </a>

              <div class="card-content">

                <h3 class="title-4 card-title">
                  <a href="#">Món Khai Vị</a>
                </h3>

                <a href="#" class="btn-text hover-underline label-2">Xem Menu</a>

              </div>

            </div>
          </li>

          <li>
            <div class="service-card">

              <a href="#" class="has-before hover:shine">
                <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                  <img src="{{asset('users/assets/images/service-3.jpg')}}" width="285" height="336" loading="lazy" alt="Drinks"
                    class="img-cover">
                </figure>
              </a>

              <div class="card-content">

                <h3 class="title-4 card-title">
                  <a href="#">Thức Uống</a>
                </h3>

                <a href="#" class="btn-text hover-underline label-2">Xem Menu</a>

              </div>

            </div>
          </li>

        </ul>

        <img src="{{asset('users/assets/images/shape-1.png')}}" width="246" height="412" loading="lazy" alt="shape"
          class="shape shape-1 move-anim">
        <img src="{{asset('users/assets/images/shape-2.png')}}" width="343" height="345" loading="lazy" alt="shape"
          class="shape shape-2 move-anim">

      </div>
    </section>





    <!-- 
        - #Về Chúng tôi
      -->

    <section class="section about text-center" aria-labelledby="about-label" id="about">
      <div class="container">

        <div class="about-content">

          <p class="label-2 section-subtitle" id="about-label">Câu chuyện của chúng tôi</p>

          <h2 class="headline-1 section-title">Mỗi hương vị đều kể một câu chuyện</h2>

          <p class="section-text">
            Tại nhà hàng của chúng tôi, mỗi món ăn không chỉ đơn thuần là thực phẩm, mà còn là một câu chuyện độc đáo được truyền tải qua từng hương vị. Những nguyên liệu tươi ngon, được chọn lọc kỹ lưỡng, kết hợp với những bí quyết nấu nướng tinh tế, mang đến cho bạn những trải nghiệm ẩm thực đầy ý nghĩa. Mỗi hương vị từ món khai vị đến món chính đều gợi nhớ về những kỷ niệm, văn hóa và truyền thống khác nhau. Chúng tôi mời bạn cùng khám phá hành trình ẩm thực này, nơi mỗi món ăn là một trang trong cuốn sách thú vị của cuộc sống
          </p>

          <div class="contact-label">Đặt Chỗ Qua Điện Thoại</div>

          <a href="tel:0962615941" class="body-1 contact-number hover-underline">096-2615-522</a>

          <a href="#" class="btn btn-primary">
            <span class="text text-1">Tìm Hiểu Thêm</span>

            <span class="text text-2" aria-hidden="true">Tìm Hiểu Thêm</span>
          </a>

        </div>

        <figure class="about-banner">

          <img src="{{asset('users/assets/images/about-banner.jpg')}}" width="570" height="570" loading="lazy" alt="about banner"
            class="w-100" data-parallax-item data-parallax-speed="1">

          <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
            <img src="{{asset('users/assets/images/about-abs-image.jpg')}}" width="285" height="285" loading="lazy" alt=""
              class="w-100">
          </div>

          <div class="abs-img abs-img-2 has-before">
            <img src="{{asset('users/assets/images/badge-2.png')}}" width="133" height="134" loading="lazy" alt="">
          </div>

        </figure>

        <img src="{{asset('users/assets/images/shape-3.png')}}" width="197" height="194" loading="lazy" alt="" class="shape">

      </div>
    </section>





    <!-- 
        - #Món Đặc Biệt
      -->

    <section class="special-dish text-center" aria-labelledby="dish-label">

      <div class="special-dish-banner">
        <img src="{{asset('users/assets/images/special-dish-banner.jpg')}}" width="940" height="900" loading="lazy" alt="special dish"
          class="img-cover">
      </div>

      <div class="special-dish-content bg-black-10">
        <div class="container">

          <img src="{{asset('users/assets/images/badge-1.png')}}" width="28" height="41" loading="lazy" alt="badge" class="abs-img">

          <p class="section-subtitle label-2">Món Ăn Đặc Biệt</p>

          <h2 class="headline-1 section-title">Mì tortellini tôm hùm</h2>

          <p class="section-text">
            Mì tortellini tôm hùm là sự kết hợp hoàn hảo giữa ẩm thực Ý và hương vị biển. Những chiếc tortellini mềm mại được nhồi đầy thịt tôm hùm tươi ngon, thường được phục vụ trong nước sốt kem béo ngậy. Món ăn này mang đến trải nghiệm ẩm thực sang trọng, đầy hấp dẫn cho thực khách.
          </p>

          <div class="wrapper">
            <del class="del body-3">400.000VNĐ</del>
            <span>-</span>
            <span class="span body-1">200.000VNĐ</span>
          </div>

          <a href="{{ route('users.menus') }}" class="btn btn-primary">
            <span class="text text-1">Xem Menu</span>

            <span class="text text-2" aria-hidden="true">Xem Menu</span>
          </a>

        </div>
      </div>

      <img src="{{asset('users/assets/images/shape-4.png')}}" width="179" height="359" loading="lazy" alt="" class="shape shape-1">

      <img src="{{asset('users/assets/images/shape-9.png')}}" width="351" height="462" loading="lazy" alt="" class="shape shape-2">

    </section>





    <!-- 
        - #Thực Đơn
      -->

    <section class="section menu" aria-label="menu-label" id="menu">
      <div class="container">

        <p class="section-subtitle text-center label-2">Lựa Chọn Đặc Biệt</p>

        <h2 class="headline-1 section-title text-center">Thực Đơn Ngon Miệng</h2>

        <ul class="grid-list">

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-1.png')}}" width="100" height="100" loading="lazy" alt="Greek Salad"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Salad Hy Lạp</a>
                  </h3>

                  <span class="badge label-1">Theo Mùa</span>

                  <span class="span title-2">250.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Cà chua, ớt chuông xanh, dưa chuột cắt lát, hành tây, ô liu, và phô mai feta.
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-2.png')}}" width="100" height="100" loading="lazy" alt="Lasagne"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Mì lasagna</a>
                  </h3>

                  <span class="span title-2">400.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Rau củ, phô mai, thịt xay, sốt cà chua, gia vị và các loại gia vị
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-3.png')}}" width="100" height="100" loading="lazy" alt="Butternut Pumpkin"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Bí ngô bơ</a>
                  </h3>

                  <span class="span title-2">100.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Bí ngô bơ Dầu ô liu Muối và tiêu Các loại gia vị như bột tỏi, bột hành hoặc các loại thảo mộc
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-4.png')}}" width="100" height="100" loading="lazy" alt="Tokusen Wagyu"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Wagyu thượng hạng</a>
                  </h3>

                  <span class="badge label-1">Mới</span>

                  <span class="span title-2">390.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Thịt bò Wagyu, Muối và tiêu Dầu ô liu,Gừng,Tỏi
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-5.png')}}" width="100" height="100" loading="lazy" alt="Olivas Rellenas"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Ô liu nhồi</a>
                  </h3>

                  <span class="span title-2">250.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Bơ với thịt cua, hành tây đỏ, salad cua nhồi ớt chuông đỏ và ớt chuông xanh.
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="menu-card hover:card">

              <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                <img src="{{asset('users/assets/images/menu-6.png')}}" width="100" height="100" loading="lazy" alt="Opu Fish"
                  class="img-cover">
              </figure>

              <div>

                <div class="title-wrapper">
                  <h3 class="title-3">
                    <a href="{{ route('users.chitiet') }}" class="card-title">Cá Opu</a>
                  </h3>

                  <span class="span title-2">490.000VNĐ</span>
                </div>

                <p class="card-text label-1">
                  Cá Opu,Dầu ô liu hoặc bơ,Muối và tiêu,Tỏi,Chanh,Rau thơm
                </p>

              </div>

            </div>
          </li>

        </ul>

        <p class="menu-text text-center">
          Trong suốt mùa đông, hàng ngày từ <span class="span">7:00 pm</span> to <span class="span">9:00 pm</span>
        </p>

        <a href="menus.html" class="btn btn-primary">
          <span class="text text-1">Xem Menu</span>

          <span class="text text-2" aria-hidden="true">Xem Menu</span>
        </a>

        <img src="{{asset('users/assets/images/shape-5.png')}}" width="921" height="1036" loading="lazy" alt="shape"
          class="shape shape-2 move-anim">
        <img src="{{asset('users/assets/images/shape-6.png')}}" width="343" height="345" loading="lazy" alt="shape"
          class="shape shape-3 move-anim">

      </div>
    </section>





    <!-- 
        - #Nhận xét của khách hàng
      -->

    <section class="section testi text-center has-bg-image"
      style="background-image: url('users/assets/images/testimonial-bg.jpg')" aria-label="testimonials" id="contact">
      <div class="container">

        <div class="quote">”</div>

        <p class="headline-2 testi-text">
          Tôi muốn cảm ơn bạn vì đã mời tôi đến bữa tối tuyệt vời hôm nọ. Món ăn thật sự xuất sắc.
        </p>

        <div class="wrapper">
          <div class="separator"></div>
          <div class="separator"></div>
          <div class="separator"></div>
        </div>

        <div class="profile">
          <img src="{{asset('users/assets/images/testi-avatar.jpg')}}" width="100" height="100" loading="lazy" alt="Sam Jhonson"
            class="img">

          <p class="label-2 profile-name">MR.Bla Bla Bla</p>
        </div>

      </div>
    </section>





    <!-- 
        - #Đặt Chỗ
      -->

    <section class="reservation">
      <div class="container">

        <div class="form reservation-form bg-black-10" id="contact">

          <form action="" class="form-left">

            <h2 class="headline-1 text-center">Đặt Chỗ Trực Tuyến</h2>

            <p class="form-text text-center">
              Yêu cầu đặt chỗ <a href="tel:0962615522" class="link">096-2615-522</a>
              hoặc điền vào mẫu đơn đặt hàng
            </p>

            <div class="input-wrapper">
              <input type="text" name="name" placeholder="Họ Tên" autocomplete="off" class="input-field">

              <input type="tel" name="phone" placeholder="Số Điện Thoại" autocomplete="off" class="input-field">
            </div>

            <div class="input-wrapper">

              <div class="icon-wrapper">
                <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                <select name="person" class="input-field">
                  <option value="1-person">1 Người</option>
                  <option value="2-person">2 Người</option>
                  <option value="3-person">3 Người</option>
                  <option value="4-person">4 Người</option>
                  <option value="5-person">5 Người</option>
                  <option value="6-person">6 Người</option>
                  <option value="7-person">7 Người</option>
                </select>

                <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
              </div>

              <div class="icon-wrapper">
                <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>

                <input type="date" name="reservation-date" class="input-field">

                <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
              </div>

              <div class="icon-wrapper">
                <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                <select name="person" class="input-field">
                  <option value="08:00am">08 : 00 am</option>
                  <option value="09:00am">09 : 00 am</option>
                  <option value="010:00am">10 : 00 am</option>
                  <option value="011:00am">11 : 00 am</option>
                  <option value="012:00am">12 : 00 am</option>
                  <option value="01:00pm">01 : 00 pm</option>
                  <option value="02:00pm">02 : 00 pm</option>
                  <option value="03:00pm">03 : 00 pm</option>
                  <option value="04:00pm">04 : 00 pm</option>
                  <option value="05:00pm">05 : 00 pm</option>
                  <option value="06:00pm">06 : 00 pm</option>
                  <option value="07:00pm">07 : 00 pm</option>
                  <option value="08:00pm">08 : 00 pm</option>
                  <option value="09:00pm">09 : 00 pm</option>
                  <option value="10:00pm">10 : 00 pm</option>
                </select>

                <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
              </div>

            </div>

            <textarea name="message" placeholder="Ghi Chú" autocomplete="off" class="input-field"></textarea>

            <button type="submit" class="btn btn-secondary">
              <span class="text text-1">Đặt Bàn</span>

              <span class="text text-2" aria-hidden="true">Đặt Bàn</span>
            </button>

          </form>

          <div class="form-right text-center" style="background-image: url('users/assets/images/form-pattern.png')">

            <h2 class="headline-1 text-center">Liên Hệ</h2>

            <p class="contact-label">Yêu cầu đặt chỗ</p>

            <a href="tel:0962615522" class="body-1 contact-number hover-underline">096-2615-522</a>

            <div class="separator"></div>

            <p class="contact-label">Địa Chỉ</p>

            <address class="body-4">
              FWN Restaurant, HCM City, <br>
              Quận Tân Bình,64 Nguyễn Phúc Chu
            </address>

            <p class="contact-label">Thời Gian Trưa</p>

            <p class="body-4">
              Thứ 2 Tới Chủ Nhật <br>
              11.00 am - 2.30pm
            </p>

            <p class="contact-label">Thời Gian Tối</p>

            <p class="body-4">
              Thứ 2 Tới Chủ Nhật <br>
              05.00 pm - 10.00pm
            </p>

          </div>

        </div>

      </div>
    </section>





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

        <img src="{{asset('users/assets/images/shape-7.png')}}" width="208" height="178" loading="lazy" alt="shape"
          class="shape shape-1">

        <img src="{{asset('users/assets/images/shape-8.png')}}" width="120" height="115" loading="lazy" alt="shape"
          class="shape shape-2">

      </div>
    </section>





    <!-- 
        - #Sự Kiện
      -->

    <section class="section event bg-black-10" aria-label="blog-label" id="blog">
      <div class="container">

        <p class="section-subtitle label-2 text-center">Cập nhật gần đây</p>

        <h2 class="section-title headline-1 text-center">Sự kiện sắp tới</h2>

        <ul class="grid-list">

          <li>
            <div class="event-card has-before hover:shine">

              <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                <img src="{{asset('users/assets/images/event-1.jpg')}}" width="350" height="450" loading="lazy"
                  alt="Thức ăn ngon và hương vị độc đáo tạo trải nghiệm tuyệt vời." class="img-cover">

                <time class="publish-date label-2" datetime="2024-09-15">15/09/2024</time>
              </div>

              <div class="card-content">
                <p class="card-subtitle label-2 text-center">Thức ăn, Hương vị</p>

                <h3 class="card-title title-2 text-center">
                  Thức ăn ngon và hương vị độc đáo tạo trải nghiệm tuyệt vời.
                </h3>
              </div>

            </div>
          </li>

          <li>
            <div class="event-card has-before hover:shine">

              <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                <img src="{{asset('users/assets/images/event-2.jpg')}}" width="350" height="450" loading="lazy"
                  alt="Thực phẩm lành mạnh cung cấp dinh dưỡng và năng lượng cho cơ thể." class="img-cover">

                <time class="publish-date label-2" datetime="2024-09-08">08/09/2024</time>
              </div>

              <div class="card-content">
                <p class="card-subtitle label-2 text-center">Thực phẩm lành mạnh</p>

                <h3 class="card-title title-2 text-center">
                  Thực phẩm lành mạnh cung cấp dinh dưỡng và năng lượng cho cơ thể.
                </h3>
              </div>

            </div>
          </li>

          <li>
            <div class="event-card has-before hover:shine">

              <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                <img src="{{asset('users/assets/images/event-3.jpg')}}" width="350" height="450" loading="lazy"
                  alt="Công thức nấu ăn hướng dẫn cách chế biến món ngon" class="img-cover">

                <time class="publish-date label-2" datetime="2024-09-03">03/09/2024</time>
              </div>

              <div class="card-content">
                <p class="card-subtitle label-2 text-center">Công thức nấu ăn</p>

                <h3 class="card-title title-2 text-center">
                  Công thức nấu ăn hướng dẫn cách chế biến món ngon
                </h3>
              </div>

            </div>
          </li>

        </ul>

        <a href="#" class="btn btn-primary">
          <span class="text text-1">Xem Blog</span>

          <span class="text text-2" aria-hidden="true">Xem Blog</span>
        </a>

      </div>
    </section>

  </article>
</main>