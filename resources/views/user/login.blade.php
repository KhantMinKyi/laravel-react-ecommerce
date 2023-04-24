@extends('Layouts.master')
@section('header-text', 'Login Page')
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-80">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">User Login</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ url('/login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            {{-- error message --}}
                                            @if ($errors->has('email'))
                                                <span class="text-sm text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                aria-label="Email" name="email" {{-- error Email --}}
                                                @if ($errors->has('email')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            {{-- Error Message Password --}}
                                            @if ($errors->has('password'))
                                                <span class="text-sm text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password" name="password"
                                                {{-- Error Password --}}
                                                @if ($errors->has('password')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ url('/register') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign
                                            up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('../assets/img/background1.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-dark opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
