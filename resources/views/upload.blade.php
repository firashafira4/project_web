<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
</head>
<body>

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Pilih Gambar:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Upload Gambar</button>
    </form>

</body>
</html>