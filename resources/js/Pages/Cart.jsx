import React, { useState, useCallback } from 'react';
import { Layout, Table, Button, Typography, Checkbox, Col, Row, Space, message, Card } from 'antd';
import { useShopping } from "../Hook/useContentShoping";
import { ShoppingCartOutlined, CheckCircleOutlined, DeleteOutlined } from '@ant-design/icons';
import { usePostApi } from '../Hook/useApi';
import { Inertia } from '@inertiajs/inertia';
const { Title } = Typography;
const { Content } = Layout;

const Cart = () => {
  const { cart, removeFromCart, updateCartQuantity, Booking } = useShopping();
  const [selectedItems, setSelectedItems] = useState([]);
  const { postData, data, error } = usePostApi("/api/cart/confirm");

  const handleSelectItem = useCallback((id) => {
    setSelectedItems((prevSelectedItems) => {
      if (prevSelectedItems.includes(id)) {
        return prevSelectedItems.filter(itemId => itemId !== id);
      }
      return [...prevSelectedItems, id];
    });
  }, []);
  const handleSelectAll = useCallback((e) => {
    if (e.target.checked) {
      const allSelectedItems = cart.map(item => item.id);
      setSelectedItems(allSelectedItems);
    } else {
      setSelectedItems([]);
    }
  }, [cart]);
  const generateRandomCode = useCallback(() => {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let code = '';
    for (let i = 0; i < 8; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      code += characters[randomIndex];
    }
    return code;
  }, []);

  const handleAddCheckOut = useCallback(async () => {
    if (!Booking || Booking.length === 0) {
      message.error("Vui lòng thêm địa chỉ đặt bàn");
      return;
    }
    if (selectedItems.length === 0) {
      message.error("Vui lòng chọn ít nhất một món ăn để thanh toán.");
      return;
    }
    const menuCode = generateRandomCode();
    selectedItems.forEach(id => removeFromCart(id));
    setSelectedItems([]);
    message.success("Đặt bàn thành công");
    const totalCartPrice = selectedItems.reduce((total, id) => {
      const item = cart.find(cartItem => cartItem.id === id);
      if (item) {
        return total + (item.price * item.quantity);
      }
      return total;
    }, 0);

    const checkout = {
      name: Booking.name,
      date: Booking.date,
      time: Booking.time,
      guest: Booking.guest,
      comment: Booking.comment,
      floor: Booking.floor,
      table: Booking.table,
      phoneNumber1: Booking.phoneNumber1,
      phoneNumber2: Booking.phoneNumber2,
      items: selectedItems.map(id => cart.find(item => item.id === id)),
      menuCode: menuCode,
      price: totalCartPrice,
      status: 'pending',
      created_at: new Date(),
      updated_at: new Date(),
    };
    const response = await postData(checkout);
    sessionStorage.setItem('checkout', JSON.stringify(checkout)); 
    Inertia.visit(route('checkout'));
  
  }, [selectedItems, cart, Booking, removeFromCart, generateRandomCode, postData, data, error]);

  // Remove selected items from the cart
  const handleRemoveSelectedItems = useCallback(() => {
    selectedItems.forEach(id => removeFromCart(id));
    setSelectedItems([]);
  }, [selectedItems, removeFromCart]);

  // Columns for the cart table
  const columns = [
    {
      title: (
        <Checkbox
          onChange={handleSelectAll}
          checked={selectedItems.length === cart.length}
        />
      ),
      key: 'select-all',
      render: (_, record) => (
        <Checkbox
          checked={selectedItems.includes(record.id)}
          onChange={() => handleSelectItem(record.id)}
        />
      ),
    },
    {
      title: 'Hình ảnh',
      dataIndex: 'image',
      key: 'image',
      render: (image) => (
        <img src={image} alt="product" style={{ width: 50, height: 50, objectFit: 'cover', borderRadius: '8px' }} />
      ),
    },
    {
      title: 'Tên sản phẩm',
      dataIndex: 'name',
      key: 'name',
      render: (name) => <span style={{ fontWeight: 'bold' }}>{name}</span>,
    },
    {
      title: 'Số lượng',
      dataIndex: 'quantity',
      key: 'quantity',
      render: (quantity, record) => (
        <div>
          <Button
            onClick={() => updateCartQuantity(record.id, record.quantity - 1)}
            disabled={record.quantity <= 1}
            icon={<DeleteOutlined />}
            style={{ marginRight: '5px', backgroundColor: '#f5222d', color: 'white' }}
          />
          <span style={{ margin: '0 10px' }}>{quantity}</span>
          <Button
            onClick={() => updateCartQuantity(record.id, record.quantity + 1)}
            icon={<CheckCircleOutlined />}
            style={{ backgroundColor: '#52c41a', color: 'white' }}
          />
        </div>
      ),
    },
    {
      title: 'Giá',
      dataIndex: 'price',
      key: 'price',
      render: (price) => `${price} VNĐ`,
    },
    {
      title: 'Thao tác',
      key: 'action',
      render: (text, record) => (
        <Button
          danger
          onClick={() => removeFromCart(record.id)}
          icon={<DeleteOutlined />}
          style={{ backgroundColor: '#ff4d4f', color: 'white' }}
        >
          Xóa
        </Button>
      ),
    },
  ];

  // Calculate total price for selected items
  const totalPrice = cart.reduce(
    (total, item) => (selectedItems.includes(item.id) ? total + item.price * item.quantity : total),
    0
  );

  // Booking details columns
  const bookingColumns = [
    {
      title: 'Thông tin',
      dataIndex: 'info',
      key: 'info',
    },
    {
      title: 'Chi tiết',
      dataIndex: 'detail',
      key: 'detail',
    },
  ];

  // Booking details data
  const bookingData = Booking ? [
    { key: '1', info: 'Tên khách hàng', detail: Booking.name },
    { key: '2', info: 'Số điện thoại', detail: Booking.phoneNumber1 },
    { key: '3', info: 'Ngày', detail: Booking.date },
    { key: '4', info: 'Giờ', detail: Booking.time },
    { key: '5', info: 'Số người', detail: Booking.guest },
    { key: '6', info: 'Tầng', detail: Booking.floor },
    { key: '7', info: 'Bàn', detail: Booking.table },
    { key: '8', info: 'Lời nhắn', detail: Booking.comment },
  ] : [];

  return (
    <Layout style={{ minHeight: '100vh' }}>
      <Content style={{ padding: '20px', backgroundColor: '#f9f9f9' }}>
        <Title level={2} style={{ textAlign: 'center', fontWeight: 'bold' }}>
          Món ăn đã chọn
        </Title>

        {cart.length === 0 ? (
          <p style={{ textAlign: 'center', fontSize: '16px', color: '#888' }}>Hiện tại bạn chưa lựa chọn món ăn nào.</p>
        ) : (
          <>
            <Row gutter={20}>
              <Col span={16}>
                <Card>
                  <Table
                    dataSource={cart}
                    columns={columns}
                    rowKey="id"
                    pagination={false}
                  />
                  <div style={{ textAlign: 'right', marginTop: '20px' }}>
                    <Title level={3}>
                      Tổng cộng: {totalPrice} VNĐ
                    </Title>
                    <Space>
                      <Button
                        type="primary"
                        danger
                        onClick={handleRemoveSelectedItems}
                        disabled={selectedItems.length === 0}
                        icon={<DeleteOutlined />}
                      >
                        Xóa các món đã chọn
                      </Button>
                      <Button
                        type="primary"
                        onClick={handleAddCheckOut}
                        icon={<ShoppingCartOutlined />}
                      >
                        Tiến hành đặt bàn
                      </Button>
                    </Space>
                  </div>
                </Card>
              </Col>

              <Col span={8}>
                <Card>
                  <Table
                    dataSource={bookingData}
                    columns={bookingColumns}
                    pagination={false}
                    showHeader={false}
                    rowKey="key"
                  />
                </Card>
              </Col>
            </Row>
          </>
        )}
      </Content>
    </Layout>
  );
};

export default Cart;
