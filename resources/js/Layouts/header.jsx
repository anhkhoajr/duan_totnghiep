import React, { useState } from 'react';
import { Layout, Button, Row, Col, Menu, Input, Typography, Space, Badge, Modal, List, Card } from 'antd';
import { 
    HomeOutlined, 
    AppstoreOutlined, 
    BookOutlined, 
    PhoneOutlined, 
    LoginOutlined, 
    UserAddOutlined, 
    LogoutOutlined, 
    SearchOutlined, 
    ShoppingCartOutlined, 
    HeartOutlined, 
    PieChartOutlined ,

} from '@ant-design/icons';
import { Link, usePage } from '@inertiajs/react';
import { useShopping } from '../Hook/useContentShoping';

const { Header } = Layout;
const { Search } = Input;
const { Text, Title } = Typography;

const CustomHeader = () => {
    const { props } = usePage();
    const isGuest = !props.auth.user;
    const [searchVisible, setSearchVisible] = useState(false);
    const [cartVisible, setCartVisible] = useState(false);

    const { cart, removeFromCart } = useShopping(); 

    const totalPrice = cart.reduce((total, item) => total + item.price * item.quantity, 0);

    const menuItems = [
        {
            key: 'home',
            icon: <HomeOutlined />,
            label: <Link href={route('home')}>Trang chủ</Link>
        },
        {
            key: 'menu',
            icon: <AppstoreOutlined />,
            label: <Link href={route('menu')}>Thực đơn</Link>
        },
        {
            key: 'booktable',
            icon: <BookOutlined />,
            label: <Link href={route('booktable')}>Đặt bàn</Link>
        },
        {
            key: 'products',
            icon: <PieChartOutlined />,
            label: <Link href={route('products')}>Tất cả món</Link>
        },
        {
            key: 'blog',
            icon: <BookOutlined />,
            label: <Link href={route('blog')}>Giới thiệu</Link>
        },
        {
            key: 'contact',
            icon: <PhoneOutlined />,
            label: <Link href={route('contact')}>Liên hệ</Link>
        }
    ];

    const toggleSearch = () => {
        setSearchVisible(!searchVisible);
    };

    const onSearch = (value) => {
        console.log(value);
    };

    const openCart = () => {
        setCartVisible(true); 
    };

    const closeCart = () => {
        setCartVisible(false); 
    };

    return (
        <Layout>
            <Header style={{ backgroundColor: "#001529", padding: '0 20px' }}>
                <Row align="middle" justify="space-between" style={{ height: '64px' }}>
                    <Col>
                        <Space>
                            <AppstoreOutlined style={{ fontSize: '24px', color: "#FFD700" }} />
                            <Text style={{ color: "#FFD700", fontSize: '24px', margin: 0 }}>Gr8.</Text>
                        </Space>
                    </Col>

                    <Col flex="auto">
                        <Menu
                            mode="horizontal"
                            theme="dark"
                            style={{ backgroundColor: "#001529", borderBottom: 'none' }}
                            items={menuItems}
                        />
                    </Col>

                    <Col>
                        <Space align="center">
                            {isGuest ? (
                                <>
                                    <Button type="primary" icon={<LoginOutlined />} href={route('admin.login')}>
                                        Đăng nhập
                                    </Button>
                                    <Button type="default" icon={<UserAddOutlined />} href={route('admin.register')}>
                                        Đăng ký
                                    </Button>
                                </>
                            ) : (
                                <>
                                    <Text style={{ color: "#fff" }}>{props.auth.user.name}</Text>
                                    <Button
                                        danger
                                        icon={<LogoutOutlined />}
                                        href={route('logout')}
                                    >
                                        Đăng xuất
                                    </Button>
                                </>
                            )}
                                {searchVisible && (
                                <Search
                                    placeholder="Tìm kiếm..."
                                    onSearch={onSearch}
                                    enterButton
                                    style={{ width: 200 }}
                                />
                            )}
                            <Button
                                type="link"
                                icon={<SearchOutlined style={{ color: "#fff", fontSize: '20px' }} />}
                                onClick={toggleSearch}
                            />
                            <Badge count={cart.length} offset={[10, 0]}>
                                <Button
                                    type="link"
                                    icon={<ShoppingCartOutlined style={{ color: "#fff", fontSize: '20px' }} />}
                                    onClick={openCart} 
                                />
                            </Badge>
                        </Space>
                    </Col>
                </Row>
            </Header>

            <Modal
                title="Món ăn bạn đã chọn"
                open={cartVisible}
                onCancel={closeCart}
                footer={[<Button key="close" onClick={closeCart}>Đóng</Button>]}
            >
                <div style={{ marginBottom: '20px' }}>
                    <Title level={3}>Tổng cộng: {totalPrice} VNĐ</Title>
                    <Button type="primary" style={{ marginTop: '10px' }}>
                        <Link onClick={closeCart} href={'/cart'}>Đặt món
                         </Link>
                    </Button>
                </div>

                {cart.length > 0 ? (
                    <List
                        dataSource={cart}
                        renderItem={item => (
                            <List.Item
                                actions={[<Button type="link" onClick={() => removeFromCart(item.id)}>Xóa</Button>]}
                            >
                                <Card style={{ width: '100%', display: 'flex', alignItems: 'center' }}>
                                    <img 
                                        alt={item.name} 
                                        src={item.image} 
                                        style={{ width: 50, height: 50, objectFit: 'cover', marginRight: 16 }} 
                                    />
                                    <div>
                                        <Card.Meta
                                            title={item.name}
                                            description={`Giá: ${item.price} VNĐ x ${item.quantity}`}
                                        />
                                    </div>
                                </Card>
                            </List.Item>
                        )}
                    />
                ) : (
                    <Text>Menu của bạn đang trống.</Text>
                )}
            </Modal>
        </Layout>
    );
};

export default CustomHeader;
