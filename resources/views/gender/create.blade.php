<form method="post" action="/genders">
    @csrf
    <label for="name">Nome:</label>
    <input id="name" name="name" type="text" required/>
    <input type="submit">
</form>