<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .wrapper {
            width: 800px;
            max-width: 100%;
        }

        .header, .footer {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            font-size: 15px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header b {
            font-weight: bold;
            cursor: pointer;
        }

        .footer {
            margin-top: 30px;
        }

        h2 {
            text-align: center;
            font-weight: normal;
            font-size: 20px;
            margin-bottom: 20px;
            color: #222;
        }

        table {
            width: 85%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            font-size: 14px;
        }

        th {
            font-weight: bold;
            text-align: center;
        }

        td:nth-child(1) {
            text-align: center;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            list-style: none;
            padding: 0;
        }

        .pagination a {
            color: #337ab7;
            padding: 6px 12px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin-left: -1px;
            font-size: 14px;
        }

        .pagination a:first-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination a:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .pagination a:hover {
            background-color: #f5f5f5;
        }

        .action-link {
            color: #337ab7;
            text-decoration: none;
            margin: 0 3px;
        }

        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <div class="header">
        Home | <b><a href="{{ route('user.list') }}">Đăng xuất</a></b>
    </div>

    <h2>Danh sach user</h2>

    @if (session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Like</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->like ?: 'Chưa cập nhật' }}</td>
                    <td>
                        <div class="action-links">
                            <a href="{{ route('user.readUser', $user->id) }}">View</a>
                            <span>|</span>
                            <a href="{{ route('user.updateUser', $user->id) }}">Edit</a>
                            <span>|</span>
                            <form class="delete-form" action="{{ route('user.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Ban co chac muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">Chua co du lieu user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $users->links() }}
    </div>

    <div class="footer">
        Lap trinh web @01/2024
    </div>

</div>

</body>
</html>
    <div class="wrapper">
        <div class="header">
            Home | <b>Đăng xuất</b>
        </div>

        <h2>Danh sách user</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="" class="action-link">View</a> |
                        <a href="" class="action-link">Edit</a> |
                        <a href="" class="action-link">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            <a href="#">Previous</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Next</a>
        </div>

        <div class="footer">
            Lập trình web @01/2024
        </div>
    </div>

</body>
