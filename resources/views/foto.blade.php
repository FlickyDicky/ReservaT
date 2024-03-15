<form action="{{ route('photo.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo" accept="image/*">
    <button type="submit">Upload Photo</button>
</form>
