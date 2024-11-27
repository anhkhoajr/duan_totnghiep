import React, { useEffect, useState } from "react";
import { Layout, Row, Col, Card, Typography, Button, Spin } from "antd";
import { ShoppingCartOutlined, LoadingOutlined } from "@ant-design/icons";
import { useGetApi } from "../Hook/useApi";

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
            width: "80%",
            height: "150px",
            objectFit: "cover",
          }}
        />
      }
    >
      <Title level={4}>{product.name}</Title>
      <Paragraph ellipsis={{ rows: 2 }}>{product.description}</Paragraph>
      <Paragraph strong style={{ color: "#f56a00" }}>{product.price}đ</Paragraph>
      <Button
        type="primary"
        href={`/details/${product.id}`}
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
  <div key={category.id} className="menu-category">
    <div
      className="container d-flex align-items-center justify-content-center border border-secondary rounded-5 text-center p-3"
      style={{ marginBottom: "30px" }}
    >
      <Title level={2}>{category.name}</Title>
      {category.image && (
        <img
          src={category.image}
          alt={category.name}
          style={{ width: "10%", height: "auto", marginLeft: "10px" }}
        />
      )}
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

  useEffect(() => {
    if (categories && categories.length > 0) {
      setMenuItems(categories);
    }
  }, [categories]);

  return (
    <Layout>
      <Content style={{ padding: "50px" }}>
        <div className="page-banner" style={{ marginBottom: "30px" }}>
          <div className="container text-center">
            <Title level={1}>Thực đơn</Title>
            <Paragraph>Thưởng thức ẩm thực tuyệt vời của chúng tôi</Paragraph>
          </div>
        </div>

        {loading ? (
          <div style={{ textAlign: "center", padding: "50px" }}>
            <Spin indicator={<LoadingOutlined style={{ fontSize: 24 }} spin />} />
            <p>Đang tải thực đơn...</p>
          </div>
        ) : error ? (
          <div style={{ textAlign: "center", padding: "50px" }}>
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

        <div className="reservation-banner" style={{ marginTop: "50px" }}>
          <div className="container text-center">
            <div className="reservation-content">
              <Title level={2}>Đặt bàn</Title>
              <Paragraph>
                Đến với nhà hàng, khách hàng sẽ thấy được không gian thoáng đãng,
                có những phòng riêng biệt cho hội họp hay sinh nhật.
              </Paragraph>
              <Button type="primary" href="/table">
                Đặt bàn
              </Button>
            </div>
          </div>
        </div>
      </Content>
    </Layout>
  );
};

export default MenuComponent;
