@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Reservasi Kamar: {{ $room->tipe_kamar }}</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Tanggal Check-In</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Tanggal Check-Out</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>
        <button type="submit" class="btn btn-success">Konfirmasi Reservasi</button>
    </form>
</div>
@endsection
