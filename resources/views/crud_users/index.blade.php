<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach user</title>
    <style>
        body { background: white; color: black; margin: 0; padding: 0; }
        a { color: black; text-decoration: none; }
        a:hover { color: white; background: black; padding: 2px 5px; }
        button, .btn { background: white; color: black; border: 1px solid black; padding: 5px 10px; cursor: pointer; }
        button:hover, .btn:hover { background: black; color: white; }
        input, textarea { background: white; color: black; border: 1px solid black; padding: 5px; }
        input:focus, textarea:focus { outline: 2px solid black; }
        table { border-collapse: collapse; border: 1px solid black; width: 100%; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
        .message { padding: 10px; border: 1px solid black; margin-bottom: 10px; }
        .empty { text-align: center; padding: 20px; border: 1px solid black; }
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