@extends('Layouts.master')
@section('header-text', 'About Us')
@section('content')
    <div id="root"></div>
@endsection

@section('script')
    <script src="{{ mix('js/about.js') }}"></script>
@endsection
