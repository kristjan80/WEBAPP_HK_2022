
@php
    // This template is used for all other templates. It aggregates header and footer templates and uses yield directive that is replaced with the specific templates content
    // Used for time value on the navbar
    use Illuminate\Support\Carbon;
@endphp
@include('header', ['time' => Carbon::now()->format('H:i:s')])

@yield('content')

@include('footer')