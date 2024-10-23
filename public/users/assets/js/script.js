'use strict';



/**
 * Tải Trang
 * 
 * Tất loading khi mà nó đã tải loaded lên
 */

const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  document.body.classList.add("loaded");
});



/**
 *thêm sự kiện lắng nghe cho nhiều phần tử
 */

const ThemevenOne = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
}

ThemevenOne(navTogglers, "click", toggleNavbar);



/**
 * HEADER & trở về trên cùng
 */

const header = document.querySelector("[data-header]");
const nuttrove = document.querySelector("[data-back-top-btn]");

let Bandau = 0;

const anHeader = function () {
  const keoxuong = Bandau < window.scrollY;
  if (keoxuong) {
    header.classList.add("hide");
  } else {
    header.classList.remove("hide");
  }

  Bandau = window.scrollY;
}

window.addEventListener("scroll", function () {
  if (window.scrollY >= 50) {
    header.classList.add("active");
    nuttrove.classList.add("active");
    anHeader();
  } else {
    header.classList.remove("active");
    nuttrove.classList.remove("active");
  }
});



/**
 * phần mục chính slider
 */

const sliderHero = document.querySelector("[data-hero-slider]");
const cacMucSliderHero = document.querySelectorAll("[data-hero-slider-item]");
const nutTruocSlider = document.querySelector("[data-prev-btn]");
const nutSauSlider = document.querySelector("[data-next-btn]");

let viTriHienTai = 0;
let mucHoatDongCuoiCung = cacMucSliderHero[0];

const capNhatViTriSlider = function () {
  mucHoatDongCuoiCung.classList.remove("active");
  cacMucSliderHero[viTriHienTai].classList.add("active");
  mucHoatDongCuoiCung = cacMucSliderHero[viTriHienTai];
}

const chuyenTiep = function () {
  if (viTriHienTai >= cacMucSliderHero.length - 1) {
    viTriHienTai = 0;
  } else {
    viTriHienTai++;
  }

  capNhatViTriSlider();
}

nutSauSlider.addEventListener("click", chuyenTiep);

const chuyenLui = function () {
  if (viTriHienTai <= 0) {
    viTriHienTai = cacMucSliderHero.length - 1;
  } else {
    viTriHienTai--;
  }

  capNhatViTriSlider();
}

nutTruocSlider.addEventListener("click", chuyenLui);

/**
 * Chạy slide tự động
 */

let tuDongChuyenSlide;

const chuyenSlideTuDong = function () {
  tuDongChuyenSlide = setInterval(function () {
    chuyenTiep();
  }, 7000);
}

ThemevenOne([nutSauSlider, nutTruocSlider], "mouseover", function () {
  clearInterval(tuDongChuyenSlide);
});

ThemevenOne([nutSauSlider, nutTruocSlider], "mouseout", chuyenSlideTuDong);

window.addEventListener("load", chuyenSlideTuDong);


/**
 *Hiệu ứng parallax
 */

const parallaxItems = document.querySelectorAll("[data-parallax-item]");

let x, y;

window.addEventListener("mousemove", function (event) {

  x = (event.clientX / window.innerWidth * 10) - 5;
  y = (event.clientY / window.innerHeight * 10) - 5;

  // đảo ngược số ví dụ. 20 -> -20, -5 -> 5
  x = x - (x * 2);
  y = y - (y * 2);

  for (let i = 0, len = parallaxItems.length; i < len; i++) {
    x = x * Number(parallaxItems[i].dataset.parallaxSpeed);
    y = y * Number(parallaxItems[i].dataset.parallaxSpeed);
    parallaxItems[i].style.transform = `translate3d(${x}px, ${y}px, 0px)`;
  }

});

