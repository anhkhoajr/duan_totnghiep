import React, { useState } from 'react';
import { Layout, Button, Row, Col, Menu, Input, Typography, Space, Badge } from 'antd';
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
    PieChartOutlined,
    OrderedListOutlined,
} from '@ant-design/icons';
import { Link, usePage } from '@inertiajs/react';

const { Header } = Layout;
const { Search } = Input;
const { Text } = Typography;

const CustomHeader = () => {
    const { props } = usePage();
    const isGuest = !props.auth.user;
    const [searchVisible, setSearchVisible] = useState(false);

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
        },
        {
            key: 'order',
            icon: <OrderedListOutlined />,
            label: <Link href={route('orders.history')}>Đơn hàng</Link>
        },
    ];

    const toggleSearch = () => {
        setSearchVisible(!searchVisible);
    };

    const onSearch = (value) => {
        console.log(value);
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
                            <Badge count={props.cartCount || 0} offset={[10, 0]}>
                                <Button
                                    type="link"
                                    icon={<ShoppingCartOutlined style={{ color: "#fff", fontSize: '20px' }} />}
                                    href={'/cart'}
                                />
                            </Badge>
                        </Space>
                    </Col>
                </Row>
            </Header>
        </Layout>
    );
};

export default CustomHeader;
