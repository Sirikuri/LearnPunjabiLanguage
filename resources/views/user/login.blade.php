<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS files  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <title>Login</title>
</head>
<body>
    <!-- THis is the Login page -->
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login"  method="post" action="{{route('user_register_login')}}">
                    @csrf
                                @if (session('alert'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>{{ session('alert') }}</strong>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								
							@endif
                            @if (session('success'))
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>{{ session('success') }}</strong>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								@endif
                    <h1 style="color: #6661A0;">LOGIN</h1>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name ="email" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <h5>Don't Have a account</h5>
                    <a style="color: white;" href="{{route('user_signup')}}">Sign up</a>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <script src="{{ asset('admin.js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>