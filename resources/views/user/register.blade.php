@extends('Layouts.master')
@section('header-text', 'Register Page')
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">User Register</h4>
                                    <p class="mb-0">Register Your Account For More Features</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ url('/register') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Name</label>
                                            {{-- error name message --}}
                                            @if ($errors->has('name'))
                                                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                            <input type="text" class="form-control form-control-lg" placeholder="Name"
                                                aria-label="Name" name="name" {{-- error Name --}}
                                                @if ($errors->has('name')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            {{-- error email message --}}
                                            @if ($errors->has('email'))
                                                <span class="text-sm text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                            <input type="email" class="form-control form-control-lg" placeholder="Email"
                                                aria-label="Email" name="email" {{-- error Email --}}
                                                @if ($errors->has('email')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            {{-- Error Message Password --}}
                                            @if ($errors->has('password'))
                                                <span class="text-sm text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password" name="password"
                                                {{-- Error Password --}}
                                                @if ($errors->has('password')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            {{-- Error Message Phone --}}
                                            @if ($errors->has('phone'))
                                                <span class="text-sm text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                            <input type="text" class="form-control form-control-lg" placeholder="+959"
                                                aria-label="Phone" name="phone" {{-- Error Phone --}}
                                                @if ($errors->has('phone')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">NRC</label>
                                            {{-- Error Message NRC --}}
                                            @if ($errors->has('nrc'))
                                                <span class="text-sm text-danger">{{ $errors->first('nrc') }}</span>
                                            @endif
                                            <input type="text" class="form-control form-control-lg" placeholder="NRC"
                                                aria-label="NRC" name="nrc" {{-- Error NRC --}}
                                                @if ($errors->has('nrc')) style="border-color:red; text:red;" @endif>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Address</label>
                                            {{-- Error Message Address --}}
                                            @if ($errors->has('address'))
                                                <span class="text-sm text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                            <textarea class="form-control form-control-lg" placeholder="Address" aria-label="Address" name="address"
                                                {{-- Error Address --}} @if ($errors->has('address')) style="border-color:red; text:red;" @endif>
                                            </textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Choose Your Profile Image</label>
                                            {{-- Error Message Image --}}
                                            @if ($errors->has('image'))
                                                <span class="text-sm text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                            <input type="file" class="form-control form-control-lg" placeholder="Image"
                                                aria-label="Image" name="image" {{-- Error Image --}}
                                                @if ($errors->has('image')) style="border-color:red; text:red;" @endif>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Have an account?
                                        <a href="{{ url('/login') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign
                                            in</a>
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
