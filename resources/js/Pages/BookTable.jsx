import React, { useState, useEffect } from 'react';
import { Layout, Form, Input, Select, Button, message, Row, Col, Card } from 'antd';
import axios from 'axios';

const { Content } = Layout;
const { Option } = Select;

const BookTable = () => {
  const [formData, setFormData] = useState({
    name: '',
    booking_date: '',
    booking_time: '',
    number_of_guests: '',
    comment: '',
    table_id: '',
    phone: '',
    phoneNumber2: '',
    bookingCode: ''
  });

  const [tables, setTables] = useState([]);

  // Fetch data for tables
  useEffect(() => {
    const fetchData = async () => {
      try {
        const tableResponse = await fetch('/api/tables');
        const tableData = await tableResponse.json();
        setTables(tableData);
      } catch (error) {
        message.error('Không thể tải dữ liệu bàn');
      }
    };

    fetchData();
  }, []);

  const handleTableChange = (value) => {
    setFormData((prevData) => ({
      ...prevData,
      table_id: value
    }));
  };

  const handleSubmit = async (values) => {
    try {
      // Generate booking code if not present
      const newBooking = {
        ...values,
        bookingCode: values.bookingCode || generateBookingCode(),
        phone: values.phone,
      };

      // Gửi yêu cầu POST lên API để lưu thông tin đặt bàn
      const response = await axios.post('/api/tables/store', newBooking);

      if (response.data.success) {
        // Cập nhật trạng thái của bàn sau khi đặt thành công
        const updatedTables = tables.map((table) => {
          if (table.id === newBooking.table_id) {
            return { ...table, status: 'reserved' };  // Thay đổi trạng thái bàn
          }
          return table;
        });
        setTables(updatedTables);

        setFormData({
          name: '',
          booking_date: '',
          booking_time: '',
          number_of_guests: '',
          comment: '',
          table_id: '',
          phone: '',
          phoneNumber2: '',
          bookingCode: '',
        });

        message.success('Đặt bàn thành công');
      } else {
        message.error('Đặt bàn thất bại, vui lòng thử lại!');
      }
    } catch (error) {
      message.error('Đặt bàn thất bại, vui lòng thử lại!');
    }
  };

  const generateBookingCode = () => {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let code = '';
    for (let i = 0; i < 8; i++) {
      const randomChar = chars.charAt(Math.floor(Math.random() * chars.length));
      code += randomChar;
    }
    return code;
  };

  return (
    <Layout>
      <Content style={{ padding: '50px', backgroundColor: '#f9f9f9' }}>


        <Row gutter={[100, 104]} justify="center">
          <Col xs={24} sm={20} md={16} lg={14} xl={12}>
            <Card
              style={{
                borderRadius: '8px',
                padding: '40px',
                boxShadow: '0 4px 10px rgba(0, 0, 0, 0.1)',
                backgroundColor: '#fff',
              }}
            >
              <Form
                initialValues={formData}
                onFinish={handleSubmit}
                layout="vertical"
                style={{ width: '100%' }}
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
                  name="booking_date"
                  rules={[{ required: true, message: 'Vui lòng chọn ngày!' }]}
                >
                  <Input type="date" />
                </Form.Item>

                <Form.Item
                  label="Giờ"
                  name="booking_time"
                  rules={[{ required: true, message: 'Vui lòng chọn giờ!' }]}
                >
                  <Input type="time" />
                </Form.Item>

                <Form.Item
                  label="Số người"
                  name="number_of_guests"
                  rules={[{ required: true, message: 'Vui lòng nhập số người!' }]}
                >
                  <Input type="number" placeholder="Tối đa 10 người" />
                </Form.Item>

                <Form.Item
                  label="Bàn"
                  name="table_id"
                  rules={[{ required: true, message: 'Vui lòng chọn bàn!' }]}
                >
                  <Select
                    placeholder="Chọn bàn"
                    onChange={handleTableChange}
                    value={formData.table_id}
                  >
                    {tables.map((table) => (
                      <Option key={table.id} value={table.id} disabled={table.status === 0}>
                        {table.type} {table.status === 0 ? '(Không có sẵn)' : ''}
                      </Option>
                    ))}
                  </Select>
                </Form.Item>

                <Form.Item
                  label="Số điện thoại chính"
                  name="phone"
                  rules={[{ required: true, message: 'Vui lòng nhập số điện thoại chính!' }]}
                >
                  <Input placeholder="Nhập số điện thoại của bạn" />
                </Form.Item>



                <Form.Item label="Lời nhắn" name="comment">
                  <Input.TextArea placeholder="Gửi lời nhắn cho chúng tôi" />
                </Form.Item>

                <Form.Item>
                  <Button type="primary" htmlType="submit" block>
                    Đặt Bàn
                  </Button>
                </Form.Item>
              </Form>
            </Card>
          </Col>
        </Row>
      </Content>
    </Layout>
  );
};

export default BookTable;
