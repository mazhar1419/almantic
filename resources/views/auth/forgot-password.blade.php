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
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">


    <title>
        Forgot Password — Almantic
    </title>


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

            background: var(--cream);

            color: var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        .page {

            width:
                min(100%, 900px);

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
           BRAND
        ================================================== */

        .brand-panel {

            position:
                relative;

            min-height:
                570px;

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
                180px;

            height:
                180px;

            right:
                -75px;

            top:
                90px;

            border:
                4px solid var(--black);

            background:
                var(--soft);

            transform:
                rotate(12deg);
        }


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


        .brand-content {

            position:
                relative;

            z-index:
                2;
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

            text-transform:
                uppercase;

            letter-spacing:
                .08em;
        }


        .brand-content h1 {

            margin:
                24px 0 18px;

            font-size:
                clamp(48px, 6vw, 70px);

            line-height:
                .88;

            letter-spacing:
                -.075em;

            font-weight:
                900;
        }


        .brand-content p {

            max-width:
                350px;

            margin:
                0;

            color:
                rgba(17,17,17,.78);

            font-size:
                14px;

            line-height:
                1.65;
        }


        /* ==================================================
           FORM
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
                0 0 10px;

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
                14px;

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
                22px;
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

            text-transform:
                uppercase;

            letter-spacing:
                .07em;
        }


        input {

            width:
                100%;

            min-height:
                55px;

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
        }


        input:focus {

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        /* ==================================================
           BUTTON
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
                box-shadow .12s ease;
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
           BACK
        ================================================== */

        .back-login {

            margin-top:
                28px;

            padding-top:
                20px;

            border-top:
                2px solid var(--black);

            text-align:
                center;

            color:
                var(--gray);

            font-size:
                11px;
        }


        .back-login a {

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

        @media (max-width: 800px) {

            body {

                padding:
                    14px;

                align-items:
                    flex-start;
            }


            .brand-panel {

                display:
                    none;
            }


            .page {

                width:
                    100%;

                display:
                    block;

                box-shadow:
                    5px 5px 0 var(--black);
            }


            .form-panel {

                width:
                    100%;

                padding:
                    30px;
            }
        }


        @media (max-width: 520px) {

            body {
                padding:
                    10px;
            }


            .form-panel {
                padding:
                    25px 18px;
            }


            .form-header h2 {
                font-size:
                    34px;
            }
        }

    </style>

</head>


<body>


<div class="page">


    <!-- BRAND -->

    <section class="brand-panel">

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


        <div class="brand-content">

            <span class="brand-label">
                Account Recovery
            </span>


            <h1>
                Get back<br>
                in control.
            </h1>


            <p>

                We'll help you securely reset your
                password and get back to your Almantic
                workspace.

            </p>

        </div>


        <div>
            🔒 Secure password recovery
        </div>

    </section>


    <!-- FORM -->

    <section class="form-panel">


        <header class="form-header">

            <h2>
                Forgot password?
            </h2>


            <p>

                Enter the email address associated with
                your account. If an account exists, we'll
                send you a password reset link.

            </p>

        </header>


        @if (session('status'))

            <div class="status">

                {{ session('status') }}

            </div>

        @endif


        @if ($errors->any())

            <div class="error-box">

                {{ $errors->first() }}

            </div>

        @endif


        <form
            method="POST"
            action="{{ route('password.email') }}"
            id="forgot-form"
        >

            @csrf


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

            </div>


            <button
                type="submit"
                class="submit-button"
                id="submit-button"
            >

                <span id="button-text">
                    Send reset link
                </span>

            </button>


        </form>


        <div class="back-login">

            Remember your password?

            <a href="{{ route('login') }}">
                Back to sign in
            </a>

        </div>


    </section>


</div>


<script>

    const form =
        document.getElementById(
            'forgot-form'
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

            button.disabled = true;


            buttonText.innerHTML = `
                <span class="loading">

                    <span class="spinner"></span>

                    Sending reset link...

                </span>
            `;

        }
    );

</script>


</body>

</html>