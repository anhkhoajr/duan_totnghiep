import React, { useState } from 'react';
import { Layout, Form, Input, Select, Button, message } from 'antd';
import { usePostApi } from "../Hook/useApi";
import { useShopping } from "../Hook/useContentShoping";
const { Content } = Layout;
const { Option } = Select;

const BookTable = () => {
  const { addBooking } = useShopping();
  const { postData } = usePostApi('/api/booktable/create');
  const [formData, setFormData] = useState({
    name: '',
    date: '',
    time: '',
    guest: '',
    comment: '',
    floor: '',
    table: '',
    phoneNumber1: '',
    phoneNumber2: '',
    bookingCode: ''
  });

  const fakeData = [
    { id: '1', name: 'Tầng 1', ban: [
        { id: '1', name: 'Bàn 1', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '2', name: 'Bàn 2', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '3', name: 'Bàn 3', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '4', name: 'Bàn 4', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '5', name: 'Bàn 5', status: Math.random() > 0.5 ? 1 : 0 }
    ]},
    { id: '2', name: 'Tầng 2', ban: [
        { id: '6', name: 'Bàn 6', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '7', name: 'Bàn 7', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '8', name: 'Bàn 8', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '9', name: 'Bàn 9', status: Math.random() > 0.5 ? 1 : 0 },
        { id: '10', name: 'Bàn 10', status: Math.random() > 0.5 ? 1 : 0 }
    ]}
  ];

  const generateBookingCode = () => {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let code = '';
    for (let i = 0; i < 8; i++) {
      const randomChar = chars.charAt(Math.floor(Math.random() * chars.length));
      code += randomChar;
    }
    return code;
  };

  const handleFloorChange = (value) => {
    setFormData((prevData) => ({
      ...prevData,
      floor: value,
      table: ''
    }));
  };

  const handleTableChange = (value) => {
    setFormData((prevData) => ({
      ...prevData,
      table: value 
    }));
  };

  const handleSubmit = async (values) => {
    try {
      const newBooking = { ...values, bookingCode: generateBookingCode() };
      const response = await postData(newBooking);
      addBooking(newBooking);
      message.success('Đặt bàn thành công!');
      setFormData({
        name: '',
        date: '',
        time: '',
        guest: '',
        comment: '',
        floor: '',
        table: '',
        phoneNumber1: '',
        phoneNumber2: '',
        bookingCode: ''
      });
    } catch (error) {
      message.error('Đặt bàn thất bại, vui lòng thử lại!');
    }
  };

  return (
    <Layout>
      <Content style={{ padding: '50px' }}>
        <div className="page-banner">
          <div className="container">
            <h1>Đặt Bàn</h1>
            <p>Đặt bàn cho bạn hoặc cho nhiều người</p>
          </div>
        </div>

        <div className="container">
          <h1>Đặt Bàn</h1>
          <Form
            initialValues={formData}
            onFinish={handleSubmit}
          >
            <Form.Item
              label="Họ tên"
              name="name"
              rules={[{ required: true, message: 'Vui lòng nhập họ tên!' }]}
            >
              <Input placeholder="Nhập tên của bạn" />
            </Form.Item>

            <Form.Item
              label="Ngày"
              name="date"
              rules={[{ required: true, message: 'Vui lòng chọn ngày!' }]}
            >
              <Input type="date" />
            </Form.Item>

            <Form.Item
              label="Giờ"
              name="time"
              rules={[{ required: true, message: 'Vui lòng chọn giờ!' }]}
            >
              <Input type="time" />
            </Form.Item>

            <Form.Item
              label="Số người"
              name="guest"
              rules={[{ required: true, message: 'Vui lòng nhập số người!' }]}
            >
              <Input type="number" placeholder="Tối đa 6 người" />
            </Form.Item>

            <Form.Item
              label="Tầng"
              name="floor"
              rules={[{ required: true, message: 'Vui lòng chọn tầng!' }]}
            >
              <Select placeholder="Chọn tầng" onChange={handleFloorChange}>
                {fakeData.map(floor => (
                  <Option key={floor.id} value={floor.id}>{floor.name}</Option>
                ))}
              </Select>
            </Form.Item>

            <Form.Item
              label="Bàn"
              name="table"
              rules={[{ required: true, message: 'Vui lòng chọn bàn!' }]}
            >
              <Select placeholder="Chọn bàn" onChange={handleTableChange} value={formData.table}>
                {formData.floor && fakeData.find(f => f.id === formData.floor).ban.map(table => (
                  <Option key={table.id} value={table.id} disabled={table.status === 0}>
                    {table.name} {table.status === 0 ? '(Không có sẵn)' : ''}
                  </Option>
                ))}
              </Select>
            </Form.Item>

            <Form.Item
              label="Số điện thoại chính"
              name="phoneNumber1"
              rules={[{ required: true, message: 'Vui lòng nhập số điện thoại!' }]}
            >
              <Input placeholder="Nhập số điện thoại của bạn" />
            </Form.Item>

            <Form.Item
              label="Số điện thoại dự phòng"
              name="phoneNumber2"
            >
              <Input placeholder="Nhập số điện thoại khác (Nếu có)" />
            </Form.Item>

            <Form.Item
              label="Lời nhắn"
              name="comment"
            >
              <Input.TextArea placeholder="Gửi lời nhắn cho chúng tôi" />
            </Form.Item>

            <Form.Item>
              <Button type="primary" htmlType="submit">Đặt Bàn</Button>
            </Form.Item>
          </Form>
        </div>
      </Content>
    </Layout>
  );
};

export default BookTable;
