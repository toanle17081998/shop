<!doctype html>
<html class="no-js" lang="">

<head>
    @include('Admin.Layout.Component.head')
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('backend/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <div class="h1" style="text-align:center;">{{ $title }}</div>
                    @include('Admin.Layout.Component.alert')
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="error-message">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Mật khẩu">
                            @if ($errors->has('password'))
                                <span class="error-message">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                            </label>
                            <label class="pull-right">
                                <a href="#"> Quên mật khẩu?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Bạn chưa có tài khoản ? <a href="#"> Đăng ký ngay</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

</html>
