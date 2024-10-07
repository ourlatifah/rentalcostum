<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RentalCostum.test</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12 flex-column">
        <div id="auth-left">
        @if (session('status'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
        @endif
            <h1 class="auth-title">Rental Costum</h1>
            <p class="auth-subtitle mb-2">Log in to access.</p> 

            <form action="{{ route('login')}}" method="POST">
            @csrf

                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="text" name="username" class="form-control form-control-xl" placeholder="Username" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('username')
                <span class="invalid-feedback d-block" role="alert">
                <Strong>{{$message}}</Strong></span>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback d-block" role="alert">
                <Strong>{{$message}}</Strong></span>
                @enderror

                {{-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-1">Log in</button>
            </form>
            <div class="text-center mt-2 text-lg fs-4">
                <a href="register" class="font-bold">Sign up</a>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
