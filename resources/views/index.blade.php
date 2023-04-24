@extends('Layouts.master')
{{-- csss --}}
@section('css')
@endsection
{{-- body --}}
@section('content')
    <div class="bg-image"
        style="
    background-image: url({{ asset('/assets/img/vr-bg.jpg') }});
    height: 50vh;
    background-size: cover;
    background-position: center;
  ">
    </div>
    <div class="container">
        <div class="card mt-4 mx-4 p-4 shadow-none ">
            <div class="thumbnail">
                <h4 class="text-primary">Top Popluar Categories</h4>
                <hr class="horizontal dark">
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row border rounded p-1 m-1">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/img/bruce-mars.jpg') }}" style="width: 100px; "
                                            class="rounded">
                                    </div>
                                    <div class="col-6">
                                        <b>Electronic</b>
                                        <p>10 items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item py-5">
                        <div class="row">
                            <div class="col-sm-6">slide 3</div>
                            <div class="col-sm-6">slide 4</div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon "aria-hidden="true"></span>
                <span class="visually-hidden ">Next</span>
            </button>
            <hr class="horizontal dark">
        </div>
        <div class="row">
        </div>
    </div>
@endsection

{{-- script --}}
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
