import React from 'react';
import useFetch from '../Hook/useFetch';

const HistoryOrder = ({ orders }) => {
    if (!orders || orders.length === 0) {
        return <p>Không có đơn hàng nào.</p>;
    }
    const getStatusLabel = (status) => {
        switch (status) {
            case 1:
                return 'Đã hoàn thành';
            case 2:
                return 'đơn hàng đã bị hủy';
            case null:
                return 'Đang xử lý';
            default:
                return 'Không xác định';
        }
    };

    return (
        <div className="container mx-auto p-4">
            <h1 className="text-2xl font-bold mb-4">Lịch sử Đơn Hàng</h1>
            <table className="table-auto w-full border-collapse">
                <thead>
                    <tr>
                        <th className="border p-4">Mã Đơn</th>
                        <th className="border p-4">Mã Sản Phẩm</th>
                        <th className="border p-4">Số Lượng</th>
                        <th className="border p-4">Giá</th>
                        <th className="border p-4">Trạng thái</th>

                        <th className="border p-2">Ngày Mua</th>
                    </tr>
                </thead>
                <tbody>
                    {orders.map((order) => (
                        <tr key={order.id}>
                            <td className="border p-4">{order.id}</td>
                            <td className="border p-4">{order.product_id}</td>
                            <td className="border p-4">{order.quantity}</td>
                            <td className="border p-4">{order.price}</td>
                            <td className="border p-4">{getStatusLabel(order.status)}</td>
                            <td className="border p-4">{new Date(order.created_at).toLocaleDateString()}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default HistoryOrder;
