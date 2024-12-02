import React from "react";

const Contact = () => {
  return (
    <>
      <button onClick={() => window.scrollTo(0, 0)} id="myBtn" title="Lên đầu trang">
        <i className="fas fa-arrow-up"></i>
      </button>
      <div className="page-banner">
        <div className="container">
          <h1>Liên hệ</h1>
          <p>Hãy gửi lại lời nhắn cho chúng tôi</p>
        </div>
      </div>
      <div className="container">
        <ul className="page-banner-list">
          <li>
            <a href="home.html">Trang chủ</a>
          </li>
          <i className="fas fa-chevron-right">
            <li>
              <a href="contact.html">Liên hệ</a>
            </li>
          </i>
        </ul>
      </div>
      <div className="container">
        <div className="contact-box">
          <div className="row">
            <div className="col-md-5">
              <div className="open-info">
                <h5>Giờ mở cửa:</h5>
                <div className="info-line">
                  <p>
                    <i className="fa fa-clock-o">
                      <span>
                        <b>Thứ 2 - Thứ 6:</b>
                      </span>
                      8:15 - 22:00
                      <br />
                      <span className="dm">
                        <b>Thứ 7:</b>
                      </span>
                      8:00 - 23:00
                      <br />
                      <span className="dm">
                        <b>Chủ nhật:</b>
                      </span>
                      7:00 - 23:30
                    </i>
                  </p>
                </div>
                <div className="info-line">
                  <p>
                    <i className="fa fa-calendar-check-o">
                      <span>
                        <b>Thời gian đặt trước:</b>
                      </span>
                      24/7
                    </i>
                  </p>
                </div>
              </div>
              <div className="contact-info">
                <h5>Thông tin liên hệ:</h5>
                <p>
                  <i className="fas fa-map-marker-alt ttlh">
                    <span>Số 3 Cầu Giấy, Đống Đa, Hà Nội</span>
                  </i>
                </p>
                <p>
                  <i className="fa fa-phone">
                    <span>1900 1900</span>
                  </i>
                </p>
                <p>
                  <i className="fa fa-envelope">
                    <span>hotro@email.com</span>
                  </i>
                </p>
              </div>
            </div>
            <div className="col-md-7">
              <form id="contact-form">
                <label htmlFor="name">
                  <b>Tên:</b>
                </label>
                <input
                  name="name"
                  id="name"
                  type="text"
                  placeholder="Nhập tên"
                  required
                />
                <label htmlFor="mail">
                  <b>Email:</b>
                </label>
                <input
                  name="mail"
                  id="mail"
                  type="email"
                  placeholder="Nhập email"
                  required
                />
                <label htmlFor="comment">
                  <b>Tin nhắn:</b>
                </label>
                <textarea
                  name="comment"
                  id="comment"
                  placeholder="Nhập tin nhắn"
                  required
                />
                <input type="submit" id="submit_contact" value="Gửi" />
                <div id="msg" className="message" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Contact;
