@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Booking Confirmation for {{ $room->tipe_kamar }}</h2>
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id_kamar }}">
        <input type="hidden" name="room_price" value="{{ $room->harga_permalam }}">

        <!-- Guest Information -->
        <div class="mb-3">
            <label for="guest_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="guest_name" name="guest_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="guests" name="guests" min="1" max="{{ $room->kapasitas }}" required>
        </div>

        <!-- Stay Duration -->
        <div class="mb-3">
            <label for="check_in" class="form-label">Check In</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check Out</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>

        <!-- Payment Details -->
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="cash">Cash</option>
                <option value="qr">QR Payment</option>
                <option value="transfer">Bank Transfer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select class="form-control" id="payment_status" name="payment_status" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </div>
    </form>
</div>
@endsection
