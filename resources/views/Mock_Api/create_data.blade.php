<h2>Create Data</h2>
<form action="/create-data" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" />
    <input type="text" name="email" placeholder="Email " />
    <input type="text" name="password" placeholder="Password" />
    <button type="submit">Add Data</button>
</form>
