import React, { useEffect, useState } from "react";
import { Layout, Row, Col, Card, Typography, Button, Spin } from "antd";
import { ShoppingCartOutlined, LoadingOutlined } from "@ant-design/icons";
import { useGetApi } from "../Hook/useApi";

const { Content } = Layout;
const { Title, Paragraph } = Typography;

const Product = ({ product }) => (
  <Col xs={24} sm={12} md={8} lg={6} className="animated">
    <Card
      hoverable
      style={{
        width: "100%",
        height: "100%",
        display: "flex",
        flexDirection: "column",
        justifyContent: "space-between",
        borderRadius: "10px",
        boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
        transition: "transform 0.3s ease",
      }}
      cover={
        <img
          alt={product.name}
          src={`/img/${product.img}`}
          style={{
            width: "100%",
            height: "200px",
            objectFit: "cover",
            borderRadius: "10px 10px 0 0",
          }}
        />
      }
    >
      <Title level={4} style={{ textAlign: "center", marginBottom: "10px" }}>
        {product.name}
      </Title>
      <Paragraph ellipsis={{ rows: 2 }} style={{ textAlign: "center" }}>
        {product.description}
      </Paragraph>
      <Paragraph strong style={{ textAlign: "center", color: "#f56a00" }}>
        {product.price}đ
      </Paragraph>
      <Button
        type="primary"
        icon={<ShoppingCartOutlined />}
        style={{
          backgroundColor: "#f56a00",
          borderColor: "#f56a00",
          color: "#fff",
          marginTop: "10px",
          width: "100%",
          height: "40px",
          borderRadius: "5px",
        }}
        href={`/details/${product.id}`}
      >
        Đặt món
      </Button>
    </Card>
  </Col>
);

const Category = ({ category }) => (
  <div key={category.id} className="menu-category" style={{ marginBottom: "50px" }}>
    <div
      className="container d-flex align-items-center justify-content-center border rounded-5 text-center p-3"
      style={{
        backgroundColor: "#f7f7f7",
        boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
        marginBottom: "20px",
      }}
    >
      <Title level={2} style={{ margin: 0 }}>
        {category.name}
      </Title>
      {category.image && (
        <img
          src={`/img/${category.img}`}
          alt={category.name}
          style={{ width: "50px", height: "50px", marginLeft: "10px" }}
        />
      )}
    </div>
    <Row gutter={[16, 16]}>
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
      <Content style={{ padding: "50px 20px", backgroundColor: "#fff" }}>
        <div className="page-banner" style={{ marginBottom: "40px", padding: "20px 0" }}>
          <div className="container text-center">
            <Title level={1} style={{ fontSize: "36px", color: "#001529" }}>
              Thực đơn
            </Title>
            <Paragraph style={{ fontSize: "18px", color: "#555" }}>
              Thưởng thức ẩm thực tuyệt vời của chúng tôi
            </Paragraph>
          </div>
        </div>

        {loading ? (
          <div style={{ textAlign: "center", padding: "50px" }}>
            <Spin indicator={<LoadingOutlined style={{ fontSize: 24 }} spin />} />
            <p style={{ fontSize: "18px" }}>Đang tải thực đơn...</p>
          </div>
        ) : error ? (
          <div style={{ textAlign: "center", padding: "50px" }}>
            <Title level={3} style={{ color: "#f56a00" }}>
              Có lỗi xảy ra khi tải dữ liệu
            </Title>
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

        <div className="reservation-banner" style={{ marginTop: "80px", padding: "40px 0" }}>
          <div className="container text-center">
            <div className="reservation-content" style={{ maxWidth: "600px", margin: "0 auto" }}>
              <Title level={2} style={{ fontSize: "28px", color: "#333" }}>
                Đặt bàn
              </Title>
              <Paragraph style={{ fontSize: "18px", color: "#555" }}>
                Đến với nhà hàng, khách hàng sẽ thấy được không gian thoáng đãng, có những phòng riêng biệt cho hội họp hay sinh nhật.
              </Paragraph>
              <Button
                type="primary"
                size="large"
                href="/table"
                style={{
                  backgroundColor: "#f56a00",
                  borderColor: "#f56a00",
                  color: "#fff",
                  padding: "10px 40px",
                  fontSize: "18px",
                }}
              >
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
