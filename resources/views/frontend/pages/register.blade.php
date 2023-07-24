<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.style')
</head>

<body id="login">

  @include('frontend.partials.header')

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ url('/register') }}" method="post">
					@csrf
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input mb-0" data-validate = "Valid name is: Joe Blake">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="User Name"></span>
					</div>
					@error('name')
						<p class="text-danger m-0">Please Provide Your Name!!</p>
						
					@enderror
					<div class="wrap-input100 validate-input mb-0" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					@error('email')
						<p class="text-danger m-0">Please Provide Your Email!!</p>
						
					@enderror

					<div class="wrap-input100 validate-input mb-0" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					@error('password')
						<p class="text-danger m-0">Please Provide Valid Password!!</p>
					@enderror
					<div class="wrap-input100 validate-input mb-0" data-validate="Enter Confirm password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="confirm_password">
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					@error('confirm_password')
					<p class="text-danger m-0">Password and Confirm Password doesn't match!!</p>
					
				@enderror
					<div class="container-login100-form-btn mt-3">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-115 pt-3">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="{{ url('/login') }}">
							Sign In
						</a>
					</div>
				</form>
        <div class="back-icon">
          <a href="index.html"><i class="fas fa-arrow-left"></i></a>
      </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

    <!-- Page Footer -->
    
    @include('frontend.partials.footer')
	
    @include('frontend.partials.custom')

</body>

</html>