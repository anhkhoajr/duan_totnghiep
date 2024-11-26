import React, { useState } from "react";

const Payment = ({ orderItems, totalAmount, bookingId }) => {
  const [paymentMethod, setPaymentMethod] = useState("");
  const [formData, setFormData] = useState({
    cardNumber: "",
    expiryDate: "",
    cvv: "",
    walletNumber: "",
  });

  const handlePaymentMethodChange = (e) => {
    setPaymentMethod(e.target.value);
  };

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
  };

  return (
    <main>
      {/* Banner */}
      <div className="page-banner">
        <div className="container">
          <h1>Thanh Toán</h1>
          <p>Hãy xác nhận thông tin và thanh toán đơn hàng của bạn.</p>
        </div>
      </div>

      {/* Breadcrumb */}
      <div className="container">
        <ul className="page-banner-list">
          <li>
            <a href="#">Trang chủ</a>
          </li>
          <i className="fas fa-chevron-right" />
          <li>
            <a href="#">Thanh Toán</a>
          </li>
        </ul>
      </div>

      <div id="payment">
        <div className="payment-summary">
          <div className="container">
            <h2 className="text-center mb-4">Thông tin đơn hàng</h2>

            {/* Order items table */}
            <table className="table table-bordered">
              <thead>
                <tr>
                  <th>Tên Món</th>
                  <th>Số Lượng</th>
                  <th>Giá</th>
                  <th>Tổng</th>
                </tr>
              </thead>
              <tbody>
                {orderItems.map((item) => (
                  <tr key={item.id}>
                    <td>{item.product.name}</td>
                    <td>{item.quantity}</td>
                    <td>{item.price.toLocaleString()} VND</td>
                    <td>{(item.quantity * item.price).toLocaleString()} VND</td>
                  </tr>
                ))}
              </tbody>
            </table>

            {/* Total amount */}
            <div className="text-end mb-4">
              <h4>Tổng Tiền: {totalAmount.toLocaleString()} VND</h4>
            </div>

            {/* Payment form */}
            <h3>Thông tin thanh toán</h3>
            <form onSubmit={handleSubmit}>
              {/* Payment method selection */}
              <div className="mb-3">
                <label htmlFor="paymentMethod" className="form-label">
                  Chọn phương thức thanh toán
                </label>
                <select
                  name="paymentMethod"
                  id="paymentMethod"
                  className="form-select"
                  value={paymentMethod}
                  onChange={handlePaymentMethodChange}
                  required
                >
                  <option value="" disabled>
                    Chọn phương thức thanh toán
                  </option>
                  <option value="credit_card">Thẻ tín dụng</option>
                  <option value="e_wallet">Ví điện tử (Momo, ZaloPay, v.v.)</option>
                  <option value="cash_on_delivery">Thanh toán khi nhận hàng</option>
                </select>
              </div>

              {/* Credit card payment fields */}
              {paymentMethod === "credit_card" && (
                <div id="creditCardFields">
                  <div className="mb-3">
                    <label htmlFor="cardNumber" className="form-label">
                      Số thẻ
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="cardNumber"
                      name="cardNumber"
                      value={formData.cardNumber}
                      onChange={handleInputChange}
                    />
                  </div>
                  <div className="mb-3">
                    <label htmlFor="expiryDate" className="form-label">
                      Ngày hết hạn
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="expiryDate"
                      name="expiryDate"
                      value={formData.expiryDate}
                      onChange={handleInputChange}
                    />
                  </div>
                  <div className="mb-3">
                    <label htmlFor="cvv" className="form-label">
                      CVV
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="cvv"
                      name="cvv"
                      value={formData.cvv}
                      onChange={handleInputChange}
                    />
                  </div>
                </div>
              )}

              {/* E-wallet payment fields */}
              {paymentMethod === "e_wallet" && (
                <div id="eWalletFields">
                  <div className="mb-3">
                    <label htmlFor="walletNumber" className="form-label">
                      Số ví điện tử
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="walletNumber"
                      name="walletNumber"
                      value={formData.walletNumber}
                      onChange={handleInputChange}
                    />
                  </div>
                </div>
              )}

              {/* Payment button */}
              <div className="text-center">
                <button type="submit" className="btn btn-success btn-lg">
                  Xác Nhận Thanh Toán
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

  );
};

export default Payment;
