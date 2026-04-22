<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach user</title>
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

        .message {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #b7ddb0;
            background-color: #e9f7e5;
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

        .action-links {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-links form {
            display: inline;
            margin: 0;
        }

        .action-links a,
        .action-links button {
            color: #337ab7;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
        }

        .action-links a:hover,
        .action-links button:hover {
            text-decoration: underline;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header">
        Home | <a href="{{ route('signout') }}">Dang xuat</a>
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
                    <td>{{ $user->like ?: 'Chua cap nhat' }}</td>
                    <td>
                        <div class="action-links">
                            <a href="{{ route('user.readUser', $user->id) }}">View</a>
                            <span>|</span>
                            <a href="{{ route('user.updateUser', $user->id) }}">Edit</a>
                            <span>|</span>
                            <form action="{{ route('user.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Ban co chac muon xoa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Chua co du lieu user.</td>
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
