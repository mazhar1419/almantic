<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        Sign In — Almantic
    </title>

 <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">

    <style>

        :root {
            --primary: #659287;
            --mint: #80B9A9;
            --soft: #B2D8C2;
            --light: #E8F5E9;

            --black: #111111;
            --white: #FFFFFF;

            --cream: #FAFCF8;
            --gray: #64706B;
            --danger: #D9534F;

            --border: 3px solid var(--black);

            --shadow: 8px 8px 0 var(--black);

            --small-shadow: 4px 4px 0 var(--black);
        }


        * {
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            margin: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

            background:
                var(--cream);

            color:
                var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        /* ==================================================
           WRAPPER
        ================================================== */

        .page {

            width:
                min(100%, 980px);

            display:
                grid;

            grid-template-columns:
                .9fr 1.1fr;

            border:
                var(--border);

            background:
                var(--white);

            box-shadow:
                var(--shadow);
        }


        /* ==================================================
           LEFT PANEL
        ================================================== */

        .brand-panel {

            position:
                relative;

            min-height:
                620px;

            padding:
                42px;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                space-between;

            background:
                var(--primary);

            border-right:
                var(--border);

            overflow:
                hidden;
        }


        .brand-panel::before {

            content: "";

            position:
                absolute;

            width:
                190px;

            height:
                190px;

            right:
                -80px;

            top:
                80px;

            border:
                4px solid var(--black);

            background:
                var(--soft);

            transform:
                rotate(14deg);
        }


        .brand-panel::after {

            content: "";

            position:
                absolute;

            width:
                90px;

            height:
                90px;

            left:
                -40px;

            bottom:
                100px;

            border:
                4px solid var(--black);

            background:
                var(--mint);

            transform:
                rotate(-12deg);
        }


        /* ==================================================
           BRAND
        ================================================== */

        .brand {

            position:
                relative;

            z-index:
                2;

            display:
                flex;

            align-items:
                center;

            gap:
                13px;
        }


        .brand-mark {

            width:
                48px;

            height:
                48px;

            object-fit:
                contain;

            border:
                var(--border);

            box-shadow:
                var(--small-shadow);

            background:
                var(--white);
        }


        .brand-name {

            font-size:
                23px;

            font-weight:
                900;

            letter-spacing:
                -.06em;
        }


        /* ==================================================
           BRAND CONTENT
        ================================================== */

        .brand-content {

            position:
                relative;

            z-index:
                2;

            max-width:
                400px;
        }


        .brand-label {

            display:
                inline-block;

            padding:
                7px 10px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            box-shadow:
                3px 3px 0 var(--black);

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                .08em;

            text-transform:
                uppercase;
        }


        .brand-content h1 {

            margin:
                24px 0 18px;

            font-size:
                clamp(48px, 6vw, 72px);

            line-height:
                .88;

            letter-spacing:
                -.075em;

            font-weight:
                900;
        }


        .brand-content p {

            margin:
                0;

            max-width:
                360px;

            color:
                rgba(17,17,17,.78);

            font-size:
                14px;

            line-height:
                1.65;
        }


        /* ==================================================
           SECURITY ITEMS
        ================================================== */

        .security-list {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            gap:
                9px;
        }


        .security-item {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            font-size:
                11px;

            font-weight:
                900;
        }


        .security-icon {

            width:
                25px;

            height:
                25px;

            display:
                grid;

            place-items:
                center;

            border:
                2px solid var(--black);

            background:
                var(--white);

            font-size:
                11px;
        }


        /* ==================================================
           RIGHT FORM
        ================================================== */

        .form-panel {

            padding:
                42px;
        }


        .form-header {

            margin-bottom:
                28px;
        }


        .form-header h2 {

            margin:
                0 0 9px;

            font-size:
                42px;

            line-height:
                1;

            letter-spacing:
                -.065em;

            font-weight:
                900;
        }


        .form-header p {

            margin:
                0;

            color:
                var(--gray);

            font-size:
                13px;

            line-height:
                1.6;
        }


        /* ==================================================
           STATUS
        ================================================== */

        .status {

            margin-bottom:
                20px;

            padding:
                13px;

            border:
                2px solid var(--black);

            background:
                var(--light);

            font-size:
                12px;

            font-weight:
                700;

            line-height:
                1.5;
        }


        /* ==================================================
           ERROR
        ================================================== */

        .error-box {

            margin-bottom:
                20px;

            padding:
                14px;

            border:
                var(--border);

            background:
                #FFF0EF;

            color:
                var(--danger);

            font-size:
                12px;

            font-weight:
                700;
        }


        /* ==================================================
           FIELD
        ================================================== */

        .field {

            margin-bottom:
                20px;
        }


        label {

            display:
                block;

            margin-bottom:
                8px;

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                .07em;

            text-transform:
                uppercase;
        }


        .input-wrap {

            position:
                relative;
        }


        input {

            width:
                100%;

            min-height:
                54px;

            padding:
                13px 15px;

            border:
                var(--border);

            outline:
                none;

            background:
                var(--cream);

            color:
                var(--black);

            font-family:
                inherit;

            font-size:
                14px;

            transition:
                background .12s ease,
                box-shadow .12s ease;
        }


        input:focus {

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        /* ==================================================
           PASSWORD TOGGLE
        ================================================== */

        .password-input {

            padding-right:
                70px;
        }


        .password-toggle {

            position:
                absolute;

            right:
                8px;

            top:
                50%;

            transform:
                translateY(-50%);

            min-height:
                34px;

            padding:
                0 9px;

            border:
                2px solid var(--black);

            background:
                var(--white);

            cursor:
                pointer;

            font-size:
                9px;

            font-weight:
                900;

            text-transform:
                uppercase;
        }


        /* ==================================================
           FIELD ERROR
        ================================================== */

        .field-error {

            display:
                block;

            margin-top:
                6px;

            color:
                var(--danger);

            font-size:
                10px;

            font-weight:
                700;
        }


        /* ==================================================
           OPTIONS
        ================================================== */

        .options {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                15px;

            margin:
                5px 0 24px;
        }


        .remember {

            display:
                flex;

            align-items:
                center;

            gap:
                7px;

            color:
                var(--gray);

            font-size:
                10px;

            font-weight:
                700;
        }


        .remember input {

            width:
                17px;

            min-height:
                17px;

            margin:
                0;

            padding:
                0;

            accent-color:
                var(--primary);

            cursor:
                pointer;
        }


        .forgot {

            color:
                var(--black);

            font-size:
                10px;

            font-weight:
                900;

            text-decoration:
                none;

            border-bottom:
                2px solid var(--black);
        }


        /* ==================================================
           SUBMIT
        ================================================== */

        .submit-button {

            width:
                100%;

            min-height:
                58px;

            border:
                var(--border);

            background:
                var(--primary);

            color:
                var(--white);

            box-shadow:
                var(--shadow);

            cursor:
                pointer;

            font-family:
                inherit;

            font-size:
                13px;

            font-weight:
                900;

            transition:
                transform .12s ease,
                box-shadow .12s ease,
                opacity .12s ease;
        }


        .submit-button:hover {

            transform:
                translate(4px,4px);

            box-shadow:
                3px 3px 0 var(--black);
        }


        .submit-button:active {

            transform:
                translate(7px,7px);

            box-shadow:
                none;
        }


        .submit-button:disabled {

            opacity:
                .65;

            cursor:
                wait;
        }


        /* ==================================================
           REGISTER
        ================================================== */

        .register-link {

            margin-top:
                28px;

            padding-top:
                21px;

            border-top:
                2px solid var(--black);

            text-align:
                center;

            color:
                var(--gray);

            font-size:
                11px;
        }


        .register-link a {

            color:
                var(--black);

            font-weight:
                900;

            text-decoration:
                none;

            border-bottom:
                2px solid var(--black);
        }


        /* ==================================================
           SECURITY NOTE
        ================================================== */

        .security-note {

            margin-top:
                18px;

            text-align:
                center;

            color:
                var(--gray);

            font-size:
                9px;

            font-weight:
                700;
        }


        /* ==================================================
           LOADING
        ================================================== */

        .loading {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                9px;
        }


        .spinner {

            width:
                15px;

            height:
                15px;

            border:
                3px solid rgba(
                    255,
                    255,
                    255,
                    .45
                );

            border-top-color:
                var(--white);

            border-radius:
                50%;

            animation:
                spin .7s linear infinite;
        }


        @keyframes spin {

            to {
                transform:
                    rotate(360deg);
            }
        }


        /* ==================================================
           MOBILE
        ================================================== */

      /* ==================================================
   MOBILE
================================================== */

@media (max-width: 800px) {

    body {
        min-height: 100vh;
        padding: 14px;
        align-items: flex-start;
    }


    /*
    |--------------------------------------------------------------------------
    | Hide Brand Panel
    |--------------------------------------------------------------------------
    */

    .brand-panel {
        display: none;
    }


    /*
    |--------------------------------------------------------------------------
    | Form Only
    |--------------------------------------------------------------------------
    */

    .page {
        width: 100%;
        display: block;
        box-shadow: 5px 5px 0 var(--black);
    }


    .form-panel {
        width: 100%;
        padding: 30px;
    }


    .form-header h2 {
        font-size: 40px;
    }
}


/* ==================================================
   SMALL MOBILE
================================================== */

@media (max-width: 520px) {

    body {
        padding: 10px;
        align-items: flex-start;
    }


    .page {
        width: 100%;
        box-shadow: 4px 4px 0 var(--black);
    }


    .form-panel {
        padding: 25px 18px;
    }


    .form-header h2 {
        font-size: 34px;
    }


    .options {
        align-items: flex-start;
        flex-direction: column;
    }
}


        @media (max-width: 520px) {

            .brand-panel {

                padding:
                    23px;
            }


            .form-panel {

                padding:
                    25px 20px;
            }


            .brand-content h1 {

                font-size:
                    46px;
            }


            .form-header h2 {

                font-size:
                    36px;
            }


            .options {

                align-items:
                    flex-start;

                flex-direction:
                    column;
            }
        }

    </style>

</head>


<body>


<div class="page">


    <!-- ==================================================
         BRAND PANEL
    ================================================== -->

    <section class="brand-panel">


        <!-- BRAND -->

        <div class="brand">

            <img
                src="{{ asset('images/almantic-mark.png') }}"
                alt="Almantic"
                class="brand-mark"
            >

            <span class="brand-name">
                Almantic
            </span>

        </div>


        <!-- CONTENT -->

        <div class="brand-content">

            <span class="brand-label">
                Welcome back
            </span>


            <h1>
                Your work.<br>
                Your team.<br>
                One place.
            </h1>


            <p>

                Sign in to continue managing your customers,
                team, projects, and business with Almantic.

            </p>

        </div>


        <!-- SECURITY -->

        <div class="security-list">

            <div class="security-item">

                <span class="security-icon">
                    🔒
                </span>

                Secure authentication

            </div>


            <div class="security-item">

                <span class="security-icon">
                    ✓
                </span>

                Your account, your data

            </div>


            <div class="security-item">

                <span class="security-icon">
                    ⚡
                </span>

                Fast and simple workspace

            </div>

        </div>


    </section>


    <!-- ==================================================
         LOGIN FORM
    ================================================== -->

    <section class="form-panel">


        <header class="form-header">

            <h2>
                Sign in
            </h2>


            <p>

                Enter your account credentials to continue.

            </p>

        </header>


        <!-- ==================================================
             STATUS
        ================================================== -->

        @if (session('status'))

            <div class="status">

                {{ session('status') }}

            </div>

        @endif


        <!-- ==================================================
             ERRORS
        ================================================== -->

        @if ($errors->has('login'))

            <div class="error-box">

                {{ $errors->first('login') }}

            </div>

        @elseif ($errors->any())

            <div class="error-box">

                Please check your email and password.

            </div>

        @endif


        <!-- ==================================================
             LOGIN FORM
        ================================================== -->

        <form
            method="POST"
            action="{{ route('login.store') }}"
            id="login-form"
        >

            @csrf


            <!-- EMAIL -->

            <div class="field">

                <label for="email">
                    Email address
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    maxlength="254"
                    autocomplete="email"
                    placeholder="you@example.com"
                    required
                    autofocus
                >


                @error('email')

                    <span class="field-error">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- PASSWORD -->

            <div class="field">

                <label for="password">
                    Password
                </label>


                <div class="input-wrap">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="password-input"
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        required
                    >


                    <button
                        type="button"
                        class="password-toggle"
                        id="password-toggle"
                    >
                        Show
                    </button>

                </div>


                @error('password')

                    <span class="field-error">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- OPTIONS -->

            <div class="options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Remember me
                    </span>

                </label>


             <a href="{{ route('password.request') }}" class="forgot">
    Forgot password?
</a>
            </div>


            <!-- SUBMIT -->

            <button
                type="submit"
                class="submit-button"
                id="submit-button"
            >

                <span id="button-text">
                    Sign in to Almantic
                </span>

            </button>


        </form>


        <!-- REGISTER -->

        <div class="register-link">

            Don't have an account?

            <a href="{{ route('register') }}">
                Create one
            </a>

        </div>


        <!-- SECURITY -->

        <div class="security-note">

            🔐 Almantic uses secure password verification.

        </div>


    </section>


</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | Password Visibility
    |--------------------------------------------------------------------------
    */

    const password =
        document.getElementById(
            'password'
        );


    const passwordToggle =
        document.getElementById(
            'password-toggle'
        );


    passwordToggle.addEventListener(
        'click',
        function () {

            if (
                password.type === 'password'
            ) {

                password.type = 'text';

                passwordToggle.textContent =
                    'Hide';

            } else {

                password.type =
                    'password';

                passwordToggle.textContent =
                    'Show';
            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Submit Loading
    |--------------------------------------------------------------------------
    */

    const form =
        document.getElementById(
            'login-form'
        );


    const button =
        document.getElementById(
            'submit-button'
        );


    const buttonText =
        document.getElementById(
            'button-text'
        );


    form.addEventListener(
        'submit',
        function () {

            button.disabled =
                true;


            buttonText.innerHTML = `
                <span class="loading">

                    <span class="spinner"></span>

                    Signing in...

                </span>
            `;

        }
    );

</script>


</body>

</html>