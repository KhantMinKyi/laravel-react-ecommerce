@extends('Layouts.master')
{{-- csss --}}
@section('css')
    <style>
        .fadein {
            -webkit-animation: fadein 1s linear forwards;
            animation: fadein 1s linear forwards;
        }

        @-webkit-keyframes fadein {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadein {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
@endsection
@section('header-text', 'Home Page')
{{-- body --}}
@section('content')
    <div id="root"></div>
@endsection

{{-- script --}}
@section('script')
    <script src="{{ mix('js/home.js') }}"></script>
@endsection
