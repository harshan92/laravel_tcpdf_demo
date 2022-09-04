<div class="container">
    <h1>User list</h1>
    <table border="1" cellpadding="5" width="100%" style="margin-bottom: 100px;">
        <tr>
            <th width="20%">ID</th>
            <th width="40%">Name</th>
            <th width="40%">Email</th>
        </tr>
       @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>
</div>