<h2>Edit Data</h2>
<form action="{{ route('edit-data', $dataList['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="Name" value={{ $dataList['name'] }} />
    <input type="text" name="email" placeholder="Email " value={{ $dataList['email'] }} />
    <input type="text" name="password" placeholder="Password" value={{ $dataList['password'] }} />
    <button type="submit">Edit Data</button>
</form>

{{-- <form method="POST" action="{{ route('update-user', $userData['id']) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $userData['name'] }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $userData['email'] }}" required>
    </div>
    <!-- Other input fields for editing -->

    <button type="submit">Update</button>
</form> --}}
