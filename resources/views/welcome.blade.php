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
    <script src="
                    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js
                    "></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css
" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->
    <title>Welcome</title>
    <style>
        input.btn.btn-success {
            width: 92px;
            height: 41px;
            padding: 4px 17px;
        }


        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
        }

        .alert.success {
            background-color: #04AA6D;
        }

        .alert.info {
            background-color: #2196F3;
        }

        .alert.warning {
            background-color: #ff9800;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>
    {{-- {{$pop_up}} --}}
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <p>Lorem ipsum dolor sit amet</p>
            <label id="label-register" for="log-reg-show">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <div class="register-info-box">
            <h2>Don't have an account?</h2>
            <p>Please register yourself</p>
            {{-- <a href="{{route("userregister")}}"><label id="label-login" for="log-login-show">Register</label></a> --}}
            <button id="label-login" for="log-login-show"> <a
                    href="{{ route('userregisterpage') }}">Register</a></button><br>
            <input type="radio" name="active-log-panel" id="log-login-show">
            {{-- <div class="admin-panel">
                    <button id="label-login" for="log-login-show"> <a href="{{route("adminlogin")}}">Admin login</a></button>
                </div> --}}
        </div>

        <div class="white-panel">
            <div class="login-show">
                <h2>LOGIN</h2>
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                    @endforeach
                </div>
                <form action="{{ route('userlogin') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Email" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" class="btn btn-success" value="Login">
                </form>
            </div>
        </div>
    </div>



    @if (isset($pop_up))
        {{-- {{$pop_up}} --}}
        <h1>helo</h1>
        <script>
            Swal.fire({
                title: 'Exam Expaired',
                text: 'Please contact to admin.',
                imageUrl: 'https://www.myvi.in/content/dam/neogold/anim/session-will-expire.gif',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            })
        </script>
    @endif
    {{-- <script>
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
            return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
            // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
            if (
                event.keyCode === 123 ||
                ctrlShiftKey(e, 'I') ||
                ctrlShiftKey(e, 'J') ||
                ctrlShiftKey(e, 'C') ||
                (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
            )
                return false;
        };
    </script> --}}

    <script>
        window.onload=function(){<br />
       if(window.location.href.indexOf('?FULL')==-1)<br />
       {<br />
         window.open(window.location.href+'?FULL', '', 'fullscreen=yes, scrollbars=auto');<br />
         window.close();<br />
       }<br />
    }
      </script>
</body>

</html>
