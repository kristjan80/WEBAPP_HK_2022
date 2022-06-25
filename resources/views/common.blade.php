@php
    use Illuminate\Support\Carbon;
@endphp
@include('header', ['time' => Carbon::now()->format('H:i:s')])

@yield('content')

@include('footer')