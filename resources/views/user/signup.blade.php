<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS files  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <title>Sign up</title>
</head>
<body>
    <!-- THis is the sign up page -->
    <div class="container">
                                
        <div class="screen">
            <div class="screen__content">
                <form class="login"  method="post" action="{{route('register_user_post')}}">
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
                    @csrf
                    <h1 style="color: #6661A0; margin-top: -100px;">SIGN UP</h1>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name ="first_name" placeholder="First Name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="text" class="login__input" name ="last_name" placeholder="Last Name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="date" class="login__input" name ="dob" placeholder="DOB">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="number" class="login__input" min-length="11" max-length="11" name ="phone" placeholder="Phone">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" name ="email" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name ="password" placeholder="Password">
                    </div>
                    <input type="hidden" class="login__input" value="2" name ="role_id" placeholder="Email">
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Sign up Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <h5>Already Have an account</h5>
                    <a style="color: white;" href="{{route('user_login')}}">Login</a>
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