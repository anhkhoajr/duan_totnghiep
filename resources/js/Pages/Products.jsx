import React, { useState, useEffect, useMemo } from "react";
import { Layout, Row, Col, Card, Button, Typography, Select, Slider } from "antd";
import { useGetApi } from "../Hook/useApi";
import { ShoppingCartOutlined, EyeOutlined, StarOutlined } from '@ant-design/icons';

const { Content } = Layout;
const { Title, Paragraph } = Typography;
const { Option } = Select;
const Products = () => {
  const { data: products, loading: productsLoading, error: productsError } = useGetApi("/api/products");
  const { data: categories, loading: categoriesLoading, error: categoriesError } = useGetApi("/api/categories");
  
  const [filters, setFilters] = useState({ category: "all", maxPrice: null, sortBy: "priceAsc" });
  const [displayProducts, setDisplayProducts] = useState([]);
  const [displayCategories, setDisplayCategories] = useState([]);
  const FakeProducts = [
    {
      id: 1,
      name: "Pizza thịt xông khói",
      image: "/assets/img/Menu/5.jpg",
      price: 100,
      description: "Thịt xông khói đặc biệt mềm và đậm đắm.",
      category: 1,
      views: 200,
      sales: 50,
    },
    {
      id: 2,
      name: "Pizza hải sản",
      image: "/assets/img/Menu/6.jpg",
      price: 150,
      description: "Pizza hải sản với các loại tôm, mực và cá hồi tươi ngon.",
      category: 2,
      views: 300,
      sales: 75,
    },
  ];
  const FakeCategories = [
    { id: 1, name: "Thịt" },
    { id: 2, name: "Hải sản" },
    { id: 3, name: "Trái cây" },
    { id: 4, name: "Đồ uống" },
    { id: 5, name: "Nước uống" },
    { id: 6, name: "Đồ lạnh" },
    { id: 7, name: "Thức ăn" },
    { id: 8, name: "Thức uống" },
    { id: 9, name: "Đồ gia dụng" },
    { id: 10, name: "Đồ chơi" },
    { id: 11, name: "Đồ chay" },
  ];
  useEffect(() => {
    setDisplayCategories(FakeCategories);
    setDisplayProducts(FakeProducts);
    if (products?.length > 0) {
       setDisplayProducts(products);
    }
    if (categories?.length > 0) {
      setDisplayCategories(categories);
    }
    
  }, [products, categories]);

  const handleCategoryChange = (value) => setFilters((prevFilters) => ({ ...prevFilters, category: value }));
  const handlePriceChange = (value) => setFilters((prevFilters) => ({ ...prevFilters, maxPrice: value }));
  const handleSortChange = (value) => setFilters((prevFilters) => ({ ...prevFilters, sortBy: value }));
  const handleReset = () => setFilters({ category: "all", maxPrice: null, sortBy: "priceAsc" });

  const filteredProducts = useMemo(() => {
    return displayProducts.filter((product) => {
      if (filters.category !== "all" && product.category !== parseInt(filters.category)) {
        return false;
      }
      if (filters.maxPrice !== null && product.price > filters.maxPrice) {
        return false;
      }
      return true;
    });
  }, [displayProducts, filters]);

  const sortedProducts = useMemo(() => {
    return filteredProducts.sort((a, b) => {
      switch (filters.sortBy) {
        case "priceAsc":
          return a.price - b.price;
        case "priceDesc":
          return b.price - a.price;
        case "mostViewed":
          return b.views - a.views;
        case "bestSeller":
          return b.sales - a.sales;
        default:
          return 0;
      }
    });
  }, [filteredProducts, filters.sortBy]);

  const ProductItem = ({ product }) => (
    <Card hoverable style={{ marginBottom: "20px", borderRadius: "10px", boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)" }}>
      <div className="d-flex justify-content-center">
      <img src={product.image} alt={product.name} style={{ width: "50%", height: "auto", objectFit: "cover", borderRadius: "10px" }} />
      </div>
      <Title level={4} style={{ color: "#1890ff", marginTop: "10px" }}>{product.name}</Title>
      <Paragraph>{product.description}</Paragraph>
      <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
        <Paragraph style={{ fontWeight: "bold", fontSize: "16px" }}>{product.price} VND</Paragraph>
        <Button type="primary" href={route('details', { id: product.id })}  icon={<ShoppingCartOutlined />} style={{ backgroundColor: "#f56a00", borderColor: "#f56a00", color: "#fff" }}>Đặt món</Button>
     
      </div>
      <div style={{ marginTop: "10px", display: "flex", justifyContent: "space-between" }}>
        <div style={{ display: "flex", alignItems: "center" }}>
          <EyeOutlined style={{ color: "#1890ff", marginRight: "5px" }} />
          <span>{product.views} Views</span>
        </div>
        <div style={{ display: "flex", alignItems: "center" }}>
          <StarOutlined style={{ color: "#fadb14", marginRight: "5px" }} />
          <span>{product.sales} Sales</span>
        </div>
      </div>
    </Card>
  );

  const Filter = () => {
    const maxPrice = Math.max(...displayProducts.map((product) => product.price)) || 0;
    const minPrice = Math.min(...displayProducts.map((product) => product.price)) || 0;
    
    return (
      <div style={{ marginBottom: "20px", display: "flex", justifyContent: "space-between" }}>
        <Select placeholder="Category" style={{ width: "150px", marginRight: "20px" }} onChange={handleCategoryChange} value={filters.category}>
          <Option value="all">Tất cả</Option>
          {displayCategories.map((category) => (
            <Option key={category.id} value={category.id.toString()}>{category.name}</Option>
          ))}
        </Select>

        <div style={{ display: "flex", alignItems: "center" }}>
          <span>Thấp nhất</span>
          <Slider min={minPrice} max={maxPrice} step={10} value={filters.maxPrice} onChange={handlePriceChange} tooltipVisible={true} tipFormatter={(value) => `${value} VND`} style={{ width: "200px", marginRight: "20px" }} />
          <span>Cao nhất</span>
        </div>

        <Select placeholder="Sort by" style={{ width: "150px", marginRight: "20px" }} onChange={handleSortChange} value={filters.sortBy}>
          <Option value="priceAsc">Giá  thấp nhất </Option>
          <Option value="priceDesc">Giá cao nhất</Option>
          <Option value="mostViewed">Lượt xem nhiều nhất</Option>
          <Option value="bestSeller">Bán chạy nhất</Option>
        </Select>
        <Button onClick={handleReset} style={{ backgroundColor: "#ff4d4f", color: "#fff" }}>Reset</Button>
      </div>
    );
  };

  return (
    <Layout>
      <Content style={{ padding: "50px" }}>
        <Filter />
        <Row gutter={[16, 16]}>
          {productsLoading && <p>Loading products...</p>}
          {categoriesLoading && <p>Loading categories...</p>}
          {sortedProducts?.map((product) => (
            <Col key={product.id} span={8}>
              <ProductItem product={product} />
            </Col>
          ))}
        </Row>
      </Content>
    </Layout>
  );
};

export default Products;
