<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Leonidas Restaurant</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/leonidaslog.png" alt="img" />
                        </div>
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="POST" action="{{ route('signup.store') }}">
                            @csrf
                            <div class="form-login">
                                <label>First Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your first name" name="firstname" />
                                    <img src="assets/img/icons/users1.svg" alt="img" />
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Last Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your last name" name="lastname" />
                                    <img src="assets/img/icons/users1.svg" alt="img" />
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your email address" name="email" />
                                    <img src="assets/img/icons/mail.svg" alt="img" />
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        name="password" />
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="Customer">
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>
                        </form>
                        <div class="signinform text-center">
                            <h4>
                                Already a user?
                                <a href="{{ route('signin') }}" class="hover-a">Sign In</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/log.png" alt="img" />
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
