import React, { useEffect, useState } from "react";
import { useGetApi } from "../Hook/useApi";
import { Layout, Row, Col, Card, Typography, Button, Spin } from "antd";
import { Link } from "@inertiajs/react";
import { ShoppingCartOutlined, LoadingOutlined } from "@ant-design/icons";

const { Content } = Layout;
const { Title, Paragraph } = Typography;
const Product = ({ product }) => (
  <Col span={6} className="animated">
    <Card
      hoverable
      style={{
        width: 300, 
        height: 400, 
        display: "flex",
        flexDirection: "column",
        justifyContent: "space-between", 
      }}
      cover={
        <img
          alt={product.name}
          src={product.image}
          style={{
            margin: "auto",
            width: "40%", 
            height: "150px",
            objectFit: "cover",
          }}
        />
      }
    >
      <Title level={4}>{product.name}</Title>
      <Paragraph>{product.description}</Paragraph>
      <Paragraph strong>{product.price}đ</Paragraph>
      <Button
        type="primary"
        href={route("details", { id: product.id })}
        icon={<ShoppingCartOutlined />}
        style={{
          backgroundColor: "#f56a00",
          borderColor: "#f56a00",
          color: "#fff",
        }}
      >
        Đặt món
      </Button>
    </Card>
  </Col>
);


const Category = ({ category }) => (
  <div key={category.id} className="menu-title">
    <div className="container d-flex align-items-center justify-content-center border border-secondary rounded-5 text-center p-3">
      <Title level={2}>{category.name}</Title>
      <img src={category.image} alt={category.name} style={{ width: '20%', height: 'auto' }} />
    </div>
    <Row gutter={[16, 16]} className="mt-5">
      {category.products.map((product) => (
        <Product key={product.id} product={product} />
      ))}
    </Row>
  </div>
);

const MenuComponent = () => {
  const { data: categories, loading, error } = useGetApi("/api/menu");
  const [menuItems, setMenuItems] = useState([]);
  const FakeDanhMuc = [
    {
        id: 1,
        name: "Món tráng miệng",
        image: "/assets/img/Menu/10.jpg",
        products: [
            { id: 1, name: "Pizza thịt xông khói", image: "/assets/img/Menu/5.jpg", price: 100, description: "Thịt xông khói đặc biệt mềm và đậm đắm." },
            { id: 2, name: "Pizza chicken", image: "/assets/img/Menu/6.jpg", price: 120, description: "Thịt chicken đặc biệt mềm và đậm đắm." },
            { id: 3, name: "Tiramisu", image: "/assets/img/Menu/7.jpg", price: 50, description: "Tiramisu ngọt ngào, thơm vị cà phê." },
            { id: 4, name: "Bánh chocolate lava", image: "/assets/img/Menu/8.jpg", price: 80, description: "Bánh chocolate chảy với lớp kem mịn màng." },
          ],
    },
    {
        id: 2,
        name: "Món phụ",
        image: "/assets/img/Menu/5.jpg",
        products: [
            { id: 1, name: "Khoai tây chiên", image: "/assets/img/Menu/9.jpg", price: 40, description: "Khoai tây chiên giòn rụm, thơm ngon." },
            { id: 2, name: "Cánh gà chiên", image: "/assets/img/Menu/10.jpg", price: 70, description: "Cánh gà chiên giòn, hương vị đậm đà." },
            { id: 3, name: "Salad Caesar", image: "/assets/img/Menu/11.jpg", price: 60, description: "Salad Caesar tươi mát với sốt đặc biệt." },
        ],
    },
    {
        id: 3,
        name: "Đồ uống",
        image: "/assets/img/Menu/12.jpg",
        products: [
            { id: 1, name: "Trà sữa trân châu", image: "/assets/img/Menu/13.jpg", price: 45, description: "Trà sữa hương vị truyền thống với trân châu dẻo." },
            { id: 2, name: "Nước ép cam", image: "/assets/img/Menu/14.jpg", price: 30, description: "Nước ép cam tươi nguyên chất." },
            { id: 3, name: "Cà phê đá", image: "/assets/img/Menu/15.jpg", price: 25, description: "Cà phê Việt Nam đậm đà, pha phin truyền thống." },
        ],
    },
    {
        id: 4,
        name: "Món chính",
        image: "/assets/img/Menu/16.jpg",
        products: [
            { id: 1, name: "Cơm gà xối mỡ", image: "/assets/img/Menu/17.jpg", price: 80, description: "Cơm gà xối mỡ thơm lừng, da giòn." },
            { id: 2, name: "Phở bò", image: "/assets/img/Menu/18.jpg", price: 70, description: "Phở bò truyền thống với nước dùng đậm đà." },
            { id: 3, name: "Bún chả Hà Nội", image: "/assets/img/Menu/19.jpg", price: 75, description: "Bún chả Hà Nội ngon chuẩn vị." },
        ],
    },
    {
        id: 5,
        name: "Hải sản",
        image: "/assets/img/Menu/20.jpg",
        products: [
            { id: 1, name: "Tôm hùm nướng", image: "/assets/img/Menu/21.jpg", price: 300, description: "Tôm hùm nướng thơm lừng, hấp dẫn." },
            { id: 2, name: "Cua rang me", image: "/assets/img/Menu/22.jpg", price: 250, description: "Cua rang me chua ngọt, đậm đà." },
            { id: 3, name: "Mực chiên giòn", image: "/assets/img/Menu/23.jpg", price: 180, description: "Mực chiên giòn, giữ nguyên vị ngọt tự nhiên." },
        ],
    },
    {
        id: 6,
        name: "Món chay",
        image: "/assets/img/Menu/24.jpg",
        products: [
            { id: 1, name: "Cơm chay thập cẩm", image: "/assets/img/Menu/25.jpg", price: 60, description: "Cơm chay với rau củ và đậu phụ thơm ngon." },
            { id: 2, name: "Bún riêu chay", image: "/assets/img/Menu/26.jpg", price: 50, description: "Bún riêu chay thanh đạm, bổ dưỡng." },
            { id: 3, name: "Pizza chay", image: "/assets/img/Menu/27.jpg", price: 100, description: "Pizza chay với phô mai và rau củ tươi ngon." },
        ],
    },
];


  useEffect(() => {
    if (categories && categories.length > 0) {
      setMenuItems(categories);
    } else {
      setMenuItems(FakeDanhMuc);
    }
  }, [categories]);

  useEffect(() => {
    const handleScroll = () => {
      const elements = document.querySelectorAll(".animated");
      elements.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
          el.classList.add("visible");
        }
      });
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <Layout>
      <Content style={{ padding: '50px' }}>
        <div className="page-banner">
          <div className="container text-center">
            <Title level={1}>Thực đơn</Title>
            <Paragraph>Thưởng thức ẩm thực tuyệt vời của chúng tôi</Paragraph>
          </div>
        </div>

        {loading ? (
          <div style={{ textAlign: 'center', padding: '50px' }}>
            <Spin indicator={<LoadingOutlined style={{ fontSize: 24 }} spin />} />
            <p>Đang tải thực đơn...</p>
          </div>
        ) : error ? (
          <div style={{ textAlign: 'center', padding: '50px' }}>
            <Title level={3}>Có lỗi xảy ra khi tải dữ liệu</Title>
          </div>
        ) : (
          <div id="menu">
            <div className="menu-list">
              <div className="container">
                {menuItems.map((category) => (
                  <Category key={category.id} category={category} />
                ))}
              </div>
            </div>
          </div>
        )}
        <div className="reservation-banner">
          <div className="container text-center">
            <div className="reservation-content">
              <Title level={2}>Đặt bàn</Title>
              <Paragraph>
                Đến với nhà hàng, khách hàng sẽ thấy được không gian thoáng đãng, có những phòng riêng biệt cho hội họp hay sinh nhật.
              </Paragraph>
              <Button type="primary" href="table.html">Đặt bàn</Button>
            </div>
          </div>
        </div>
      </Content>
    </Layout>
  );
};
export default MenuComponent;
