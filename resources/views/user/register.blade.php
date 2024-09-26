<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('cssfile/welcome.css') }}">
    <script src="{{ asset('jsfile/welcome.js') }}"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Register</title>
</head>

<body>
    <div class="login-reg-panel">
        <div class="register-info-box">
            <h5>“Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all,
                love of what you are doing or learning to do.”</h5>
            <p>― Pelé, Brazillian pro footballer</p>
            <input type="radio" name="active-log-panel" id="log-login-show">
            <div class="admin-panel">
            </div>
        </div>
        <div class="white-panel">
            <div class="login-show row">

                <h2>Register</h2>
                <form action="{{route('userregister')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Name" name="name">
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="Register" >
                </form>
                    <a href="{{url('/')}}" style="    display: table; margin-left: auto;"><input type="button" value="Login" id="submitDetails" class="submitDetails" style="padding: 10px 25px;"></a>
            </div>
        </div>
    </div>
</body>


</html>
