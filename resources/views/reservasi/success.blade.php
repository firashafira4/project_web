@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Booking Successful!</h2>
    <p>Your reservation has been confirmed. Reservation ID: {{ $reservation->id_reservasi }}</p>
    <p>Total Price: IDR {{ number_format($reservation->total_harga, 0, ',', '.') }}</p>
    <p>Status: {{ ucfirst($reservation->status) }}</p>
</div>
@endsection
