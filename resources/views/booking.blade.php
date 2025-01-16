@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Booking: {{ $room->tipe_kamar }}</h1>
    <img src="{{ $room->gambar }}" alt="{{ $room->tipe_kamar }}" class="w-full h-64 object-cover mb-6">
    <p class="mb-4">Harga per malam: <strong>IDR {{ number_format($room->harga_permalam, 0, ',', '.') }}</strong></p>
    <p class="mb-4">{{ $room->deskripsi }}</p>

    <form action="/booking/submit" method="POST">
        @csrf
        <input type="hidden" name="id_kamar" value="{{ $room->id }}">
        <div class="mb-4">
            <label for="nama" class="block font-medium">Nama:</label>
            <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="tanggal_checkin" class="block font-medium">Tanggal Check-in:</label>
            <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="w-full border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="tanggal_checkout" class="block font-medium">Tanggal Check-out:</label>
            <input type="date" name="tanggal_checkout" id="tanggal_checkout" class="w-full border-gray-300 rounded-md">
        </div>
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">
            Konfirmasi Booking
        </button>
    </form>
</div>
@endsection
