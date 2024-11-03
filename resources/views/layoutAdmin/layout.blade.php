<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Thêm CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Thêm Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <!-- Thêm CSS tùy chỉnh -->
    <link rel="stylesheet" href="{{ asset('layout_admin/assets/css/main.css') }}">

    <style>
        /* Màu nền cho container */
        .container {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Thay đổi màu sắc cho các card */
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        /* Định dạng tiêu đề của card */
        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Định dạng alert thông báo */
        .alert {
            border-radius: 5px;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        /* Định dạng nút bấm */
        .btn-primary {
            background-color: #28a745;
            border: none;
        }

        /* Định dạng danh sách mặt hàng */
        .list-group-item {
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Định dạng tiêu đề các phần */
        h2,
        h4 {
            color: #343a40;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">

        <div class="app-main">
            @include('layoutAdmin.header')
            <div class="main-content">
                <h3 class="title-page">
                    @yield('title')
                </h3>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Thêm JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
