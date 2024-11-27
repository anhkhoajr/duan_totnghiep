import React, { useState, useEffect } from 'react';
import { Layout, Row, Col, Card, Button, Typography, InputNumber, notification } from 'antd';
import { useShopping } from "../Hook/useContentShoping";
import axios from 'axios';

const { Content } = Layout;
const { Title, Paragraph } = Typography;

const Details = ({ product: initialProduct, relatedProducts: initialRelatedProducts }) => {
  const [product, setProduct] = useState(initialProduct || null);
  const [mainImage, setMainImage] = useState(initialProduct?.image || '');
  const [quantity, setQuantity] = useState(1);
  // const [relatedProducts, setRelatedProducts] = useState(initialRelatedProducts || []);
  const { addToCart } = useShopping();
const [relatedProducts, setRelatedProducts] = useState([]);

  // Nếu sử dụng API, lấy dữ liệu từ backend
  useEffect(() => {
    if (!initialProduct) {
      const fetchProduct = async () => {
        try {
          const response = await axios.get(`/api/details/${product.id}`);
          setProduct(response.data.product);
          setMainImage(response.data.product.image);
          setRelatedProducts(response.data.relatedProducts);
        } catch (error) {
          console.error("Error fetching product details:", error);
        }
      };
      fetchProduct();
    }
  }, [initialProduct]);

  const handleAddToCart = () => {
    if (!product) return;

    const itemToAdd = {
      id: product.id,
      name: product.name,
      price: product.price,
      image: product.image,
      quantity,
    };

    addToCart(itemToAdd);
    notification.success({
      message: 'Đã thêm vào giỏ hàng',
      description: `${product.name} x${quantity} đã được thêm vào giỏ hàng.`,
      placement: 'topRight',
    });
  };

  const handleImageClick = (img) => {
    setMainImage(img);
  };

  if (!product) {
    return (
      <Content style={{ textAlign: 'center', padding: '50px' }}>
        <Title level={3}>Đang tải dữ liệu...</Title>
      </Content>
    );
  }

  return (
    <Layout>
      <Content style={{ padding: '50px', backgroundColor: '#fff' }}>
        <Row gutter={16}>
          <Col span={12}>
            <Card
              hoverable
              cover={
                <img
                  alt={product.name}
                  src={mainImage}
                  style={{ width: '100%', objectFit: 'cover', borderRadius: '10px' }}
                />
              }
            >
              <div className="small-img">
                {product.miniImages?.map((img, index) => (
                  <img
                    key={index}
                    src={img}
                    alt={product.name}
                    className="small-product-img"
                    onClick={() => handleImageClick(img)}
                  />
                ))}
              </div>
            </Card>
          </Col>
          <Col span={12}>
            <div>
              <Title level={2}>{product.name}</Title>
              <Paragraph>Giá: {product.price} VNĐ</Paragraph>
              <Paragraph>{product.description}</Paragraph>
              <InputNumber
                min={1}
                value={quantity}
                onChange={setQuantity}
                style={{ marginBottom: '10px' }}
              />
              <Button type="primary" onClick={handleAddToCart}>
                Thêm Vào Giỏ Hàng
              </Button>
            </div>
          </Col>
        </Row>

        <section style={{ marginTop: '50px' }}>
          <Title level={3}>Sản phẩm liên quan</Title>
          <Row gutter={16}>
            {relatedProducts.map((item) => (
              <Col key={item.id} span={8}>
                <Card
                  hoverable
                  cover={
                    <img
                      alt={item.name}
                      src={item.image}
                      style={{ width: '100%', objectFit: 'cover' }}
                    />
                  }
                >
                  <Card.Meta title={item.name} description={`${item.price} VNĐ`} />
                </Card>
              </Col>
            ))}
          </Row>
        </section>
      </Content>
    </Layout>
  );
};

export default Details;
