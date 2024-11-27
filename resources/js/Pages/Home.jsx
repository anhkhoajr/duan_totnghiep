import React, { useEffect, useState } from 'react';
import { useGetApi } from '../Hook/useApi';
const Home = () => {
    const { data: productsData, loading, error } = useGetApi("/api/products");
    const [products,setProducts] = useState([]);
    useEffect(() => {
        if (productsData) {
            setProducts(productsData);
        }
    }, [productsData]);
    return (
        <>
            <section className="slider ">
                <div className="text-content">
                    <h2 className="text-heading ">Thực phẩm cho tâm hồn bạn</h2>
                    <p className="text-desc">Đây là những món ăn ngon với nguyên liệu tươi mới.</p>
                    <a href="#" className="btn btn-primary slider-btn">Bắt đầu ngay</a>
                </div>
            </section>

            <section className="banner-section">
                <div className="banner-content">
                    <h3 className="banner-heading">Món ngon nhất trong ngày</h3>
                    <h2 className="banner-name">Hamburger & <br />Khoai tây chiên ngọt</h2>
                    <p className="banner-price">$19.99</p><br />
                    <a href="#" className="btn btn-primary banner-btn">Xem thực đơn của chúng tôi</a>
                </div>
            </section>

            <section className="popular-menu-section py-5">
                <div className="container">
                    <h2 className="text-center mb-4">Món ăn phổ biến</h2>
                    <p className="text-center mb-5">Trải nghiệm những món ăn mới hấp dẫn từ đầu bếp của chúng tôi.</p>
                    <div className="row g-4">
                        {products.map((pro) => (
                            <div className="col-lg-3 col-md-4 col-sm-6" key={pro.id}>
                                <div className="card shadow-sm border-light rounded-3 h-100 d-flex flex-column">
                                    <img
                                        src={`img/${pro.img}`}
                                        className="card-img-top"
                                        alt={pro.name}
                                    />
                                    <div className="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 className="card-title mb-3 text-center">{pro.name}</h5>
                                            <p className="card-text mb-3 text-center">{pro.description}</p>
                                            <span className="d-block mb-3 fw-bold text-center">{pro.price}đ</span>
                                        </div>
                                        <a href="#" className="btn btn-primary w-100 mt-auto">Đặt món ngay</a>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                    <div className="text-center mt-4">
                        <a href="#" className="btn btn-outline-secondary">Xem tất cả</a>
                    </div>
                </div>
            </section>

            <section className="search-food">
                <div className="container">
                    <div className="row search-food-title">
                        <div className="col">
                            <h5>Tìm kiếm theo món ăn</h5>
                        </div>
                        <div className="col text-end">
                            <a href="#" className="btn btn-link">
                                Xem tất cả
                                <i className="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/pizza.png" alt="Pizza" className="img-fluid" />
                            <h5>Pizza</h5>
                        </div>
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/burger.png" alt="Burger" className="img-fluid" />
                            <h5>Burger</h5>
                        </div>
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/noodles.png" alt="Mỳ" className="img-fluid" />
                            <h5>Mỳ</h5>
                        </div>
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/sub-sandwich.png" alt="Bánh mì kẹp" className="img-fluid" />
                            <h5>Bánh mì kẹp</h5>
                        </div>
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/chowmein.png" alt="Chowmein" className="img-fluid" />
                            <h5>Chowmein</h5>
                        </div>
                        <div className="col-6 search-food-items">
                            <img src="Web_Restaurant/assets/img/search/steak.png" alt="Bít tết" className="img-fluid" />
                            <h5>Bít tết</h5>
                        </div>
                    </div>
                </div>
            </section>

            <section className="service-section">
                <div className="container">
                    <div className="row">
                        <div className="col-md-3 col-sm-6">
                            <div className="service-post text-center">
                                <img src="Web_Restaurant/assets/img/search/icon1.png" alt="Nguyên liệu tươi mới" className="img-fluid mb-3" />
                                <h3>Nguyên liệu tươi mới</h3>
                                <p>Sed egestas, ante vulputa eros pede vitae luctus metus augue.</p>
                            </div>
                        </div>
                        <div className="col-md-3 col-sm-6">
                            <div className="service-post text-center">
                                <img src="Web_Restaurant/assets/img/search/icon2.png" alt="Công thức ngon nhất" className="img-fluid mb-3" />
                                <h3>Công thức ngon nhất</h3>
                                <p>Sed egestas, ante vulputa eros pede vitae luctus metus augue.</p>
                            </div>
                        </div>
                        <div className="col-md-3 col-sm-6">
                            <div className="service-post text-center">
                                <img src="Web_Restaurant/assets/img/search/icon3.png" alt="Khách hàng hài lòng" className="img-fluid mb-3" />
                                <h3>Khách hàng hài lòng</h3>
                                <p>Sed egestas, ante vulputa eros pede vitae luctus metus augue.</p>
                            </div>
                        </div>
                        <div className="col-md-3 col-sm-6">
                            <div className="service-post text-center">
                                <img src="Web_Restaurant/assets/img/search/icon4.png" alt="Thực đơn thuần chay" className="img-fluid mb-3" />
                                <h3>Thực đơn thuần chay</h3>
                                <p>Sed egestas, ante vulputa eros pede vitae luctus metus augue.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section className="banner-section2">
                <div className="banner-box text-center">
                    <h2>Đặt bàn ngay</h2>
                    <p>Đến với nhà hàng, khách hàng sẽ thấy được không gian thoáng đãng, có những phòng riêng biệt cho hội họp hay sinh nhật với màu sắc tươi sáng.</p>
                    <a href="#" className="btn btn-primary">Đặt bàn ngay</a>
                </div>
            </section>
        </>
    );
};

export default Home;
