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
        Create Account — Almantic
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
            --shadow: 7px 7px 0 var(--black);
            --small-shadow: 4px 4px 0 var(--black);
        }


        * {
            box-sizing: border-box;
        }


        html {
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            margin: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 24px;

            background: var(--cream);

            color: var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        /* ==================================================
           PAGE
        ================================================== */

        .page {

            width:
                min(100%, 1050px);

            display:
                grid;

            grid-template-columns:
                minmax(0, .9fr)
                minmax(0, 1.1fr);

            border:
                var(--border);

            background:
                var(--white);

            box-shadow:
                var(--shadow);
        }


        /* ==================================================
           BRAND PANEL
        ================================================== */

        .brand-panel {

            position:
                relative;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                space-between;

            min-height:
                680px;

            padding:
                42px;

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
                -70px;

            top:
                90px;

            border:
                4px solid var(--black);

            background:
                var(--soft);

            transform:
                rotate(12deg);
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
                -35px;

            bottom:
                110px;

            border:
                4px solid var(--black);

            background:
                var(--mint);

            transform:
                rotate(-15deg);
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

            display:
                block;

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
                420px;
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
                25px 0 18px;

            font-size:
                clamp(48px, 6vw, 76px);

            line-height:
                .88;

            letter-spacing:
                -.075em;

            font-weight:
                900;
        }


        .brand-content p {

            max-width:
                380px;

            margin:
                0;

            color:
                rgba(17, 17, 17, .78);

            font-size:
                15px;

            line-height:
                1.65;
        }


        /* ==================================================
           FEATURES
        ================================================== */

        .feature-list {

            position:
                relative;

            z-index:
                2;

            display:
                grid;

            gap:
                9px;

            margin-top:
                30px;
        }


        .feature {

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


        .feature-icon {

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
                12px;
        }


        /* ==================================================
           FORM PANEL
        ================================================== */

        .form-panel {

            padding:
                42px;

            background:
                var(--white);
        }


        .form-header {

            margin-bottom:
                28px;
        }


        .form-header h2 {

            margin:
                0 0 9px;

            font-size:
                38px;

            line-height:
                1;

            letter-spacing:
                -.06em;

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
                1.55;
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
                13px;

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


        .error-box ul {

            margin:
                7px 0 0;

            padding-left:
                18px;
        }


        .error-box li {

            margin-bottom:
                4px;
        }


        /* ==================================================
           FORM
        ================================================== */

        .field {

            margin-bottom:
                18px;
        }


        .field-row {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                14px;
        }


        label {

            display:
                block;

            margin-bottom:
                7px;

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
                52px;

            padding:
                12px 14px;

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


        input.is-invalid {

            border-color:
                var(--danger);
        }


        .field-error {

            display:
                block;

            margin-top:
                5px;

            color:
                var(--danger);

            font-size:
                10px;

            font-weight:
                700;
        }


        /* ==================================================
           PASSWORD
        ================================================== */

        .password-input {

            padding-right:
                62px;
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
                0 8px;

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
           PASSWORD STRENGTH
        ================================================== */

        .password-strength {

            display:
                flex;

            gap:
                4px;

            margin-top:
                8px;
        }


        .strength-bar {

            flex:
                1;

            height:
                5px;

            border:
                1px solid var(--black);

            background:
                #E1E5E2;
        }


        .strength-text {

            margin-top:
                5px;

            color:
                var(--gray);

            font-size:
                9px;

            font-weight:
                700;
        }


        /* ==================================================
           CHECKBOX
        ================================================== */

        .terms {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                9px;

            margin:
                20px 0;
        }


        .terms input {

            width:
                18px;

            min-height:
                18px;

            flex:
                0 0 18px;

            margin:
                0;

            padding:
                0;

            accent-color:
                var(--primary);

            cursor:
                pointer;
        }


        .terms label {

            margin:
                0;

            color:
                var(--gray);

            font-size:
                10px;

            font-weight:
                600;

            line-height:
                1.5;

            letter-spacing:
                0;

            text-transform:
                none;
        }


        .terms a {

            color:
                var(--black);

            font-weight:
                900;
        }


        /* ==================================================
           SUBMIT
        ================================================== */

        .submit-button {

            width:
                100%;

            min-height:
                57px;

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

            letter-spacing:
                .02em;

            transition:
                transform .12s ease,
                box-shadow .12s ease,
                opacity .12s ease;
        }


        .submit-button:hover {

            transform:
                translate(4px, 4px);

            box-shadow:
                3px 3px 0 var(--black);
        }


        .submit-button:active {

            transform:
                translate(7px, 7px);

            box-shadow:
                none;
        }


        .submit-button:disabled {

            cursor:
                wait;

            opacity:
                .65;
        }


        /* ==================================================
           LOGIN LINK
        ================================================== */

        .login-link {

            margin-top:
                25px;

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


        .login-link a {

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
           FOOTER
        ================================================== */

        .security-note {

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                6px;

            margin-top:
                18px;

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

       @media (max-width: 800px) {

    body {
        min-height: 100vh;
        padding: 14px;
        align-items: flex-start;
    }

    /*
    |--------------------------------------------------------------------------
    | Hide Brand Panel On Mobile
    |--------------------------------------------------------------------------
    */

    .brand-panel {
        display: none;
    }


    /*
    |--------------------------------------------------------------------------
    | Full Width Form
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
}

        @media (max-width: 520px) {

            .page {

                box-shadow:
                    5px 5px 0 var(--black);
            }


            .brand-panel {

                padding:
                    23px;
            }


            .form-panel {

                padding:
                    24px 20px;
            }


            .brand-content h1 {

                font-size:
                    46px;
            }


            .feature-list {

                grid-template-columns:
                    1fr;
            }


            .field-row {

                grid-template-columns:
                    1fr;
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
                Welcome to Almantic
            </span>


            <h1>
                Build.<br>
                Organize.<br>
                Grow.
            </h1>


            <p>

                A simple, powerful workspace for managing
                your customers, team, and business from one
                place.

            </p>


            <div class="feature-list">

                <div class="feature">

                    <span class="feature-icon">
                        ✓
                    </span>

                    Simple workspace

                </div>


                <div class="feature">

                    <span class="feature-icon">
                        ✓
                    </span>

                    Team collaboration

                </div>


                <div class="feature">

                    <span class="feature-icon">
                        ✓
                    </span>

                    Customer management

                </div>


                <div class="feature">

                    <span class="feature-icon">
                        ✓
                    </span>

                    Built with security in mind

                </div>

            </div>

        </div>


    </section>


    <!-- ==================================================
         FORM PANEL
    ================================================== -->

    <section class="form-panel">


        <header class="form-header">

            <h2>
                Create account
            </h2>


            <p>

                Start using Almantic for your personal
                work or company.

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

        @if ($errors->any())

            <div class="error-box">

                <strong>
                    Please check the following:
                </strong>


                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- ==================================================
             REGISTRATION FORM
        ================================================== -->

        <form
            method="POST"
            action="{{ route('register.store') }}"
            id="register-form"
        >

            @csrf


            <!-- NAME -->

            <div class="field">

                <label for="name">
                    Full name
                </label>


                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    maxlength="120"
                    autocomplete="name"
                    placeholder="Your name"
                    required
                >


                @error('name')

                    <span class="field-error">
                        {{ $message }}
                    </span>

                @enderror

            </div>


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
                >


                @error('email')

                    <span class="field-error">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- PASSWORD ROW -->

            <div class="field-row">


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
                            minlength="12"
                            autocomplete="new-password"
                            placeholder="Minimum 12 characters"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password"
                        >
                            Show
                        </button>

                    </div>


                    <div class="password-strength">

                        <span
                            class="strength-bar"
                            id="strength-1"
                        ></span>

                        <span
                            class="strength-bar"
                            id="strength-2"
                        ></span>

                        <span
                            class="strength-bar"
                            id="strength-3"
                        ></span>

                        <span
                            class="strength-bar"
                            id="strength-4"
                        ></span>

                    </div>


                    <div
                        class="strength-text"
                        id="strength-text"
                    >
                        Use at least 12 characters.
                    </div>


                    @error('password')

                        <span class="field-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="field">

                    <label for="password_confirmation">
                        Confirm password
                    </label>


                    <div class="input-wrap">

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="password-input"
                            minlength="12"
                            autocomplete="new-password"
                            placeholder="Repeat password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password_confirmation"
                        >
                            Show
                        </button>

                    </div>


                    <span
                        class="field-error"
                        id="password-match-error"
                        style="display:none;"
                    >
                        Passwords do not match.
                    </span>


                    @error('password_confirmation')

                        <span class="field-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>


            <!-- TERMS -->

            <div class="terms">

                <input
                    type="checkbox"
                    id="terms"
                    name="terms"
                    required
                >


                <label for="terms">

                    I agree to the Almantic
                    <a href="#">
                        Terms of Service
                    </a>
                    and
                    <a href="#">
                        Privacy Policy
                    </a>.

                </label>

            </div>


            <!-- SUBMIT -->

            <button
                type="submit"
                class="submit-button"
                id="submit-button"
            >

                <span id="button-text">
                    Create my account
                </span>

            </button>


        </form>


        <!-- LOGIN -->

        <div class="login-link">

            Already have an account?

            <a href="{{ route('login') }}">
                Sign in
            </a>

        </div>


        <!-- SECURITY -->

        <div class="security-note">

            🔒 Your password is securely hashed.

        </div>


    </section>


</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | Password Visibility
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.password-toggle')
        .forEach(function (button) {

            button.addEventListener(
                'click',
                function () {

                    const targetId =
                        button.dataset.target;

                    const input =
                        document.getElementById(
                            targetId
                        );


                    if (
                        input.type === 'password'
                    ) {

                        input.type = 'text';

                        button.textContent =
                            'Hide';

                    } else {

                        input.type =
                            'password';

                        button.textContent =
                            'Show';
                    }

                }
            );

        });


    /*
    |--------------------------------------------------------------------------
    | Password Strength
    |--------------------------------------------------------------------------
    */

    const password =
        document.getElementById(
            'password'
        );


    const strengthText =
        document.getElementById(
            'strength-text'
        );


    const strengthBars = [

        document.getElementById(
            'strength-1'
        ),

        document.getElementById(
            'strength-2'
        ),

        document.getElementById(
            'strength-3'
        ),

        document.getElementById(
            'strength-4'
        )

    ];


    password.addEventListener(
        'input',
        function () {

            const value =
                password.value;

            let score = 0;


            if (value.length >= 12) {
                score++;
            }


            if (
                /[a-z]/.test(value) &&
                /[A-Z]/.test(value)
            ) {
                score++;
            }


            if (
                /\d/.test(value)
            ) {
                score++;
            }


            if (
                /[^A-Za-z0-9]/.test(value)
            ) {
                score++;
            }


            strengthBars.forEach(
                function (bar, index) {

                    bar.style.background =
                        index < score
                            ? 'var(--primary)'
                            : '#E1E5E2';

                }
            );


            if (value.length === 0) {

                strengthText.textContent =
                    'Use at least 12 characters.';

            } else if (score <= 1) {

                strengthText.textContent =
                    'Weak password.';

            } else if (score === 2) {

                strengthText.textContent =
                    'Fair password.';

            } else if (score === 3) {

                strengthText.textContent =
                    'Good password.';

            } else {

                strengthText.textContent =
                    'Strong password.';

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Password Match
    |--------------------------------------------------------------------------
    */

    const confirmation =
        document.getElementById(
            'password_confirmation'
        );


    const matchError =
        document.getElementById(
            'password-match-error'
        );


    function checkPasswordMatch() {

        if (
            confirmation.value !== '' &&
            password.value !== confirmation.value
        ) {

            matchError.style.display =
                'block';

            confirmation.classList.add(
                'is-invalid'
            );

            return false;

        }


        matchError.style.display =
            'none';

        confirmation.classList.remove(
            'is-invalid'
        );

        return true;
    }


    confirmation.addEventListener(
        'input',
        checkPasswordMatch
    );


    password.addEventListener(
        'input',
        function () {

            if (
                confirmation.value !== ''
            ) {
                checkPasswordMatch();
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
            'register-form'
        );


    const submitButton =
        document.getElementById(
            'submit-button'
        );


    const buttonText =
        document.getElementById(
            'button-text'
        );


    form.addEventListener(
        'submit',
        function (event) {

            if (!checkPasswordMatch()) {

                event.preventDefault();

                return;
            }


            submitButton.disabled =
                true;


            buttonText.innerHTML = `
                <span class="loading">

                    <span class="spinner"></span>

                    Creating account...

                </span>
            `;

        }
    );

</script>


</body>

</html>