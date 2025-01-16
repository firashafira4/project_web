<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Foto</title>
</head>
<body>
    <h1>Daftar Foto</h1>

    <div style="display: flex; flex-wrap: wrap;">
        @foreach ($photos as $photo)
            <div style="margin: 10px;">
            <img src="{{ asset('images/rooms/deluxe5.jpg') }}" alt="Deluxe Room" style="width: 200px;height:auto;">
                <p>Foto ID: {{ $photo->id }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>