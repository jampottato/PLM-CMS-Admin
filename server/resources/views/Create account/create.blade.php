<!-- Form to collect user information -->
<form method="POST" action="{{ route('userdatas.store') }}">
    @csrf

    <label for="usertype">User Type:</label>
    <input type="text" id="usertype" name="usertype" required><br><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="createdBy">Created By:</label>
    <input type="text" id="createdBy" name="createdBy" required><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br><br>

    <button type="submit">Create User</button>
</form>


<!-- Table to display existing users -->
<table>
    <thead>
        <tr>
            <th>User Type</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created By</th>
            <th>Description</th>
            <th>Created On</th>
            <th>Last Update</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($newUserDatas as $userData)
        <tr>
            <td>{{ $userData->usertype }}</td>
            <td>{{ $userData->name }}</td>
            <td>{{ $userData->email }}</td>
            <td>{{ $userData->createdBy }}</td>
            <td>{{ $userData->description }}</td>
            <td>{{ $userData->createdOn }}</td>
            <td>{{ $userData->lastUpdate }}</td>
            <td>
                <!-- Update button linked to edit route -->
                <a href="{{ route('userdatas.edit', ['userData' => $userData->id]) }}">Update</a>
                
                <!-- Delete button linked to destroy route -->
                <form method="POST" action="{{ route('userdatas.destroy', ['userData' => $userData->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
