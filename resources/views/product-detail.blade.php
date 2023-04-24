@extends('Layouts.master')
@section('css')
@endsection
@section('header-text', $product->name)
@section('content')
    <div class="container" id="root">


    </div>
@endsection

@section('script')
    <script>
        window.product_slug = "{{ $slug }}"
    </script>
    <script src="{{ mix('js/productDetail.js') }}"></script>
@endsection
