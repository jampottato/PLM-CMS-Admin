<!-- resources/views/posts/create.blade.php -->

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br><br>

    <label for="content">Content:</label>
    <textarea name="content" id="content" rows="4"></textarea><br><br>

    <button type="submit">Submit</button>
</form>
