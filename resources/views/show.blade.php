@extends('components.nav-bar')

@section('content')
    <h1>{{ $qr->judul }}</h1>
    <p>{{ $qr->detail }}</p>
    <div>{!! $qrCode !!}</div>
@endsection