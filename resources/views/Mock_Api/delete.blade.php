<form method="POST" action="{{ route('delete-user', $user['id']) }}">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
</form>
