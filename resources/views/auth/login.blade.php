<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - HRMS Java</title>

    <link rel="shortcut icon" type="image/x-icon" href="/img/jativision.png">

    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/css/line-awesome.min.css">
    <link rel="stylesheet" href="/css/material.css">

    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/line-awesome.min.css">

    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <div class="account-logo">
                    <a href="admin-dashboard.html"><img src="/img/java_logo.png" alt="Jati Vision"></a>
                </div>

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Access to our support ticket</p>

                        <form action="{{ url('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="#">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                    <span class="fa fa-eye-slash" id="toggle-password"></span>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.6.0.min.js"></script>

    <script src="/js/bootstrap.bundle.min.js"></script>

    <script src="/js/layout.js"></script>
    <script src="/js/theme-settings.js"></script>
    <script src="/js/greedynav.js"></script>

    <script src="/js/app.js"></script>
</body>

</html>
