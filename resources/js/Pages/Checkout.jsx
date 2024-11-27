import React, { useState, useEffect } from "react";
import { Layout, Typography, Button, Row, Col, Divider, List, Avatar, notification, Select, Alert } from "antd";
import { QrcodeOutlined, DollarOutlined, IdcardOutlined, BankOutlined, CheckCircleOutlined } from "@ant-design/icons";
import { usePostApi } from "../Hook/useApi";

const { Content } = Layout;
const { Title, Paragraph } = Typography;
const { Option } = Select;

const BankAccount = [
  { name: "Ngân hàng TMCP Á Châu", shortName: "ACB", bankcode: "970416", accountNo: "0862267487", nameaccountNo: "Nguyen Anh Quoc" },
  { name: "Ngân hàng TMCP An Bình", shortName: "ABBank", bankcode: "970423", accountNo: "1234567890", nameaccountNo: "Tran Minh Hoang" },
  { name: "Ngân hàng TMCP Đầu tư và Phát triển Việt Nam", shortName: "BIDV", bankcode: "970418", accountNo: "1122334455", nameaccountNo: "Le Thi Lan" },
  { name: "Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam", shortName: "Agribank", bankcode: "970405", accountNo: "2233445566", nameaccountNo: "Nguyen Thi Mai" },
  { name: "Ngân hàng TMCP Phương Đông", shortName: "OCB", bankcode: "970448", accountNo: "6677889900", nameaccountNo: "Pham Minh Son" }
];

const Checkout = () => {
  const [selectedBank, setSelectedBank] = useState(BankAccount[0]);
  const [checkoutData, setCheckoutData] = useState(null);
  const { postData, data, error } = usePostApi("/api/payment/confirm");

  useEffect(() => {
    const data = sessionStorage.getItem("checkout");
    if (data) {
      setCheckoutData(JSON.parse(data));
    }
  }, []);

  const handlePaymentNotification = () => {
    notification.success({
      message: "Thanh toán thành công!",
      description: "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.",
    });
    // sử dụng api
    // postPaymentData();
  };

  const generateQRUrl = (bankcode, accountNo, amount, addinfo) => {
    return `https://qrcode.io.vn/api/generate/${bankcode}/${accountNo}/${amount}/${addinfo}`;
  };

  const handleBankChange = (value) => {
    const selected = BankAccount.find((bank) => bank.shortName === value);
    setSelectedBank(selected);
  };

  const postPaymentData = async () => {
    if (checkoutData) {
      try {
        const values = {
          bank: selectedBank.shortName,
          accountNo: selectedBank.accountNo,
          amount: checkoutData.price,
          menuCode: checkoutData.menuCode,
        };
        const response = await postData(values);
        if (response && response.success) {
          notification.success({
            message: "Xác nhận thanh toán thành công!",
            description: "Chúng tôi đã nhận được thanh toán của bạn.",
          });
        } else {
          notification.error({
            message: "Lỗi khi xác nhận thanh toán!",
            description: "Vui lòng thử lại sau.",
          });
        }
      } catch (error) {
        notification.error({
          message: "Lỗi khi kết nối đến máy chủ!",
          description: "Có sự cố khi gửi thông tin thanh toán. Vui lòng thử lại.",
        });
      }
    }
  };

  return (
    <Layout>
      <Content style={{ padding: "50px" }}>
        <div
          className="checkout-container"
          style={{
            backgroundColor: "#fff",
            padding: "30px",
            borderRadius: "10px",
            boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
          }}
        >
          <Title level={2} className="text-center" style={{ color: "#001529" }}>
            Thanh toán bằng ATM
          </Title>
          <Paragraph className="text-center">
            Quét mã QR bên dưới để thực hiện thanh toán. Hãy đảm bảo rằng bạn đã điền đúng số tiền.
          </Paragraph>
          <Divider />

          {/* Dropdown to select the bank */}
          <Row gutter={[16, 16]} justify="center" style={{ marginBottom: "20px" }}>
            <Col>
              <Select
                defaultValue={selectedBank.shortName}
                style={{ width: 300 }}
                onChange={handleBankChange}
              >
                {BankAccount.map((bank) => (
                  <Option key={bank.shortName} value={bank.shortName}>
                    <BankOutlined style={{ marginRight: 8 }} />
                    {bank.name}
                  </Option>
                ))}
              </Select>
            </Col>
          </Row>

          {checkoutData ? (
            <>
              <Row gutter={[16, 16]} justify="center" style={{ marginBottom: "20px" }}>
                <Col>
                  <div className="qr-code-container" style={{ textAlign: "center" }}>
                    <img
                      src={generateQRUrl(
                        selectedBank.bankcode,
                        selectedBank.accountNo,
                        checkoutData.price,
                        checkoutData.menuCode
                      )}
                      alt="QR Code Thanh Toán"
                      style={{
                        width: "200px",
                        height: "200px",
                        border: "1px solid #ddd",
                        borderRadius: "10px",
                        boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
                      }}
                    />
                  </div>
                </Col>
              </Row>

              <Paragraph className="text-center">
                Vui lòng chuyển khoản vào tài khoản dưới đây:
              </Paragraph>

              {/* Danh sách thông tin ngân hàng */}
              <Row gutter={[16, 16]} justify="center">
                <Col span={12}>
                  <List
                    itemLayout="horizontal"
                    dataSource={[
                      { icon: <BankOutlined />, title: "Ngân hàng", description: selectedBank.name },
                      { icon: <IdcardOutlined />, title: "Số tài khoản", description: selectedBank.accountNo },
                      { icon: <QrcodeOutlined />, title: "Tên tài khoản", description: selectedBank.nameaccountNo },
                      { icon: <DollarOutlined />, title: "Số tiền", description: `${checkoutData.price} VNĐ` },
                      { icon: <CheckCircleOutlined />, title: "Mã đặt hàng", description: checkoutData.menuCode },
                    ]}
                    renderItem={(item) => (
                      <List.Item>
                        <List.Item.Meta avatar={<Avatar icon={item.icon} />} title={item.title} description={item.description} />
                      </List.Item>
                    )}
                  />
                  <Divider />
                </Col>
              </Row>

              <div className="text-center">
                <Button
                  type="primary"
                  onClick={() => {
                    handlePaymentNotification();
                    // postPaymentData(); 
                  }}
                  style={{
                    backgroundColor: "#1890ff",
                    borderColor: "#1890ff",
                    color: "#fff",
                    fontSize: "16px",
                    height: "45px",
                    width: "200px",
                    borderRadius: "5px",
                    boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
                    transition: "all 0.3s ease",
                  }}
                >
                  Xác nhận đã thanh toán
                </Button>

              </div>
            </>
          ) : (
            <Alert
              message="Vui lòng đặt món ăn rồi mới thanh toán"
              type="warning"
              showIcon
              style={{ textAlign: "center", margin: "20px" }}
            />
          )}
          <Divider />
        </div>
      </Content>
    </Layout>
  );
};

export default Checkout;
