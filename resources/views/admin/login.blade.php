
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('cssfile/adminlogin.css')}}">
	<title>Admin Login</title>
</head>
<body>
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<h4 class="company_title">Study center</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Admin Log In</h2>
					</div>
					<div class="row">
						<form control="" action="{{route('setlogin')}}" method="POST" class="form-group">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
							<div class="row">
								<input type="text" name="email" id="username" class="form__input" placeholder="Email" value="{{old('email')}}">
                                <span>@error('email'){{$message}} @enderror</span>
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password" value="{{old('password')}}">
                                <span>@error('password'){{$message}} @enderror</span>
							</div>
							<!--div class="row">
								<input type="checkbox" name="remember_me" id="remember_me" class="">
								<label for="remember_me">Remember Me!</label>
							</div-->
							<div class="row">
								<input type="submit" name="submit" value="Login" class="btn">
							</div>
						</form>
					</div>
					<!--div class="row">
						<p>Change Password? <a href="#">Click here</a></p>
					</div-->
				</div>
			</div>
		</div>
	</div>

</body>
