<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h1 class="auth-title">Rental Costum</h1>
            <p class="auth-subtitle mb-2">Register account</p>
                 @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                @endif

                @if (session('status'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
                @endif

             <form action="{{ route('register')}}" method="POST">
            @csrf

            {{-- <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="text" class="form-control form-control-xl" placeholder="E-mail">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div> --}}
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="text" name="username" id="username" class="form-control form-control-xl" placeholder="Username" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="text" name="phone" id="phone" class="form-control form-control-xl" placeholder="Phone">
                    <div class="form-control-icon">
                        <i class="bi bi-telephone-plus"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-2">
                    <textarea type="text"  name="address" id="address" class="form-control form-control-xl" placeholder="Address" required></textarea>
                    <div class="form-control-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                </div>
                {{-- <div class="form-group position-relative has-icon-left mb-2">
                    <input type="password" class="form-control form-control-xl" placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Sign Up</button>
            </form>
            <div class="text-center mt-2 text-lg fs-5">
             <a> have an account? </a>
                <a href="login" class="btn btn-outline-primary font-bold"> Login </a>
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
