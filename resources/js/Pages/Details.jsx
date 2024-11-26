import React, { useState } from 'react';
import { Layout, Row, Col, notification, Card, Button, Typography, InputNumber } from 'antd';
import { FaHeart, FaLeaf, FaUtensils, FaBell } from 'react-icons/fa';
import { useShopping } from "../Hook/useContentShoping";
import "../../css/style.css";

const { Content } = Layout;
const { Title, Paragraph } = Typography;

const Details = () => {
  const FakeMenuItems = [
    {
      id: 2,
      name: "Burger bò nướng",
      image: "/assets/img/Menu/8.jpg",
      price: 120,
      description: "Burger bò nướng thơm ngon kèm với rau sống và phô mai.",
      mini_image: [
        "/assets/img/Menu/8.jpg",
        "/assets/img/Menu/9.jpg",
        "/assets/img/Menu/10.jpg"
      ]
    },
    {
      id: 3,
      name: "Cơm gà xối mỡ",
      image: "/assets/img/Menu/11.jpg",
      price: 90,
      description: "Cơm gà xối mỡ với nước mắm chua ngọt đậm đà.",
      mini_image: [
        "/assets/img/Menu/11.jpg",
        "/assets/img/Menu/12.jpg",
        "/assets/img/Menu/13.jpg"
      ]
    },
  ];

  const [mainImage, setMainImage] = useState(FakeMenuItems[0].image);
  const [quantity, setQuantity] = useState(1);
  const [selectedItem, setSelectedItem] = useState(FakeMenuItems[0]);

  const { addToCart } = useShopping();

  const handleImageClick = (img) => {
    setMainImage(img);
  };

  const handleAddToMenu = () => {
    const itemToAdd = {
      id: selectedItem.id,
      name: selectedItem.name,
      price: selectedItem.price,
      image: selectedItem.image,
      quantity,
    };
    addToCart(itemToAdd);
    notification.success({
      message: 'Món ăn đã được thêm vào menu của bàn',
      description: `${selectedItem.name} x${quantity} đã được thêm vào menu của bàn.`,
      placement: 'topRight',
    });
  };

  const handleItemChange = (item) => {
    setSelectedItem(item);
    setMainImage(item.image);
  };

  return (
    <Layout>
      <Content style={{ padding: '50px 50px', backgroundColor: '#fff' }}>
        <div className="mt-5 container menu2 section-menu">
          <section id="spdetail" className="menu-details">
            <Row gutter={16}>
              <Col span={12}>
                <div className="product-details">
                  <Title level={2}>{selectedItem.name}</Title>
                  <Paragraph>Giá: {selectedItem.price} VNĐ</Paragraph>
                  <Paragraph>Thời gian: 6 phút</Paragraph>
                  <Paragraph>Calo: 100</Paragraph>
                  <InputNumber
                    min={1}
                    value={quantity}
                    onChange={setQuantity}
                    style={{ marginBottom: '10px' }}
                  />
                  <Button
                    type="primary"
                    className="btn btn-primary"
                    onClick={handleAddToMenu}
                  >
                    Thêm Vào Menu Của Bàn
                  </Button>
                  <Card title="Mô Tả Món Hàng" style={{ marginTop: '20px' }}>
                    <Paragraph>{selectedItem.description}</Paragraph>
                  </Card>
                </div>
              </Col>
              <Col span={12}>
                <Card
                  hoverable
                  cover={<img alt={selectedItem.name} src={mainImage} style={{ margin: 'auto', width: '80%', height: 'auto' }} />}
                >
                  <div className="small-img">
                    {selectedItem.mini_image.length > 0 ? (
                      selectedItem.mini_image.map((img, index) => (
                        <img
                          key={index}
                          src={img}
                          alt={selectedItem.name}
                          className="small-product-img"
                          onClick={() => handleImageClick(img)}
                        />
                      ))
                    ) : (
                      <p>No images available</p>
                    )}
                  </div>
                </Card>
              </Col>
            </Row>
          </section>
          <section>
            <Title level={3}>Các Món ăn Khác</Title>
            <Row gutter={16}>
              {FakeMenuItems.map((item) => (
                <Col key={item.id} span={8}>
                  <Card
                    hoverable
                    cover={<img alt={item.name} src={item.image} style={{ width: '100%', height: 'auto' }} />}
                    onClick={() => handleItemChange(item)}
                  >
                    <Card.Meta title={item.name} description={item.description} />
                  </Card>
                </Col>
              ))}
            </Row>
          </section>
        </div>
        <section className="section features text-center" style={{ marginTop: '50px' }}>
          <div className="container">
            <Title level={3} className="section-subtitle">Tại Sao Nên Chọn Chúng Tôi</Title>
            <Title level={2}>Thế Mạnh</Title>
            <Row gutter={16}>
              {[{
                title: "Thực phẩm an toàn", text: "Thực phẩm an toàn giúp bảo vệ sức khỏe và dinh dưỡng.", icon: <FaHeart />
              },
              {
                title: "Môi trường dễ chịu", text: "Môi trường trong lành tạo cảm giác thư giãn và dễ chịu.", icon: <FaLeaf />
              },
              {
                title: "Đầu bếp có tay nghề", text: "Đầu bếp tài năng mang đến những món ăn tuyệt vời.", icon: <FaUtensils />
              },
              {
                title: "Sự kiện & Tiệc", text: "Sự kiện và tiệc tùng mang đến niềm vui cho mọi người.", icon: <FaBell />
              }].map((feature, index) => (
                <Col span={6} key={index}>
                  <Card className="feature-card" hoverable>
                    <div className="card-icon">{feature.icon}</div>
                    <Title level={4} className="card-title">{feature.title}</Title>
                    <Paragraph className="card-text">{feature.text}</Paragraph>
                  </Card>
                </Col>
              ))}
            </Row>
          </div>
        </section>
      </Content>
    </Layout>
  );
};

export default Details;
