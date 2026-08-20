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
        Reset Password — Almantic
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
            --danger-bg: #FFF0EF;

            --yellow: #FFF1A8;

            --border: 3px solid var(--black);

            --shadow: 8px 8px 0 var(--black);
            --small-shadow: 4px 4px 0 var(--black);
        }


        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }


        body {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 25px;

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
           CARD
        ================================================== */

        .auth-card {

            width:
                min(100%, 570px);

            background:
                var(--white);

            border:
                var(--border);

            box-shadow:
                var(--shadow);
        }


        /* ==================================================
           HEADER
        ================================================== */

        .header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            padding:
                22px 25px;

            background:
                var(--primary);

            border-bottom:
                var(--border);
        }


        .brand {

            display:
                flex;

            align-items:
                center;

            gap:
                11px;
        }


        .brand-mark {

            width:
                42px;

            height:
                42px;

            object-fit:
                contain;

            border:
                3px solid var(--black);

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        .brand-name {

            font-size:
                22px;

            line-height:
                1;

            font-weight:
                900;

            letter-spacing:
                -.07em;
        }


        .header-label {

            padding:
                7px 9px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                8px;

            line-height:
                1;

            font-weight:
                900;

            letter-spacing:
                .08em;

            text-transform:
                uppercase;
        }


        /* ==================================================
           CONTENT
        ================================================== */

        .content {

            padding:
                38px 35px 35px;
        }


        .label {

            display:
                inline-block;

            padding:
                7px 9px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                8px;

            font-weight:
                900;

            letter-spacing:
                .08em;

            text-transform:
                uppercase;
        }


        h1 {

            margin:
                20px 0 12px;

            font-size:
                clamp(38px, 7vw, 55px);

            line-height:
                .92;

            letter-spacing:
                -.075em;

            font-weight:
                900;
        }


        .description {

            margin:
                0 0 28px;

            color:
                var(--gray);

            font-size:
                12px;

            line-height:
                1.7;
        }


        /* ==================================================
           INVALID TOKEN
        ================================================== */

        .invalid-box {

            padding:
                18px;

            border:
                var(--border);

            background:
                var(--danger-bg);

            box-shadow:
                var(--small-shadow);
        }


        .invalid-icon {

            width:
                40px;

            height:
                40px;

            display:
                grid;

            place-items:
                center;

            margin-bottom:
                14px;

            border:
                2px solid var(--black);

            background:
                var(--white);

            color:
                var(--danger);

            font-size:
                18px;

            font-weight:
                900;
        }


        .invalid-box h2 {

            margin:
                0 0 8px;

            font-size:
                18px;

            letter-spacing:
                -.04em;
        }


        .invalid-box p {

            margin:
                0;

            color:
                var(--gray);

            font-size:
                11px;

            line-height:
                1.6;
        }


        /* ==================================================
           FORM
        ================================================== */

        .form-group {

            margin-bottom:
                20px;
        }


        .form-label {

            display:
                block;

            margin-bottom:
                8px;

            font-size:
                10px;

            font-weight:
                900;

            letter-spacing:
                .04em;

            text-transform:
                uppercase;
        }


        .input-wrap {

            position:
                relative;
        }


        .form-input {

            width:
                100%;

            height:
                54px;

            padding:
                0 48px 0 14px;

            border:
                var(--border);

            outline:
                none;

            background:
                var(--white);

            color:
                var(--black);

            font-size:
                13px;

            font-weight:
                600;

            transition:
                .12s ease;
        }


        .form-input:focus {

            background:
                var(--light);

            box-shadow:
                var(--small-shadow);
        }


        .form-input.error {

            border-color:
                var(--danger);

            background:
                var(--danger-bg);
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

        .password-toggle:hover {

            background:
                var(--soft);
        }


        /* ==================================================
           PASSWORD REQUIREMENTS
        ================================================== */

        .requirements {

            margin:
                -5px 0 22px;

            padding:
                13px;

            border:
                2px solid var(--black);

            background:
                var(--light);
        }


        .requirements-title {

            margin:
                0 0 9px;

            font-size:
                9px;

            font-weight:
                900;

            text-transform:
                uppercase;

            letter-spacing:
                .05em;
        }


        .requirement {

            display:
                flex;

            align-items:
                center;

            gap:
                7px;

            margin-top:
                5px;

            color:
                var(--gray);

            font-size:
                9px;
        }


        .requirement-icon {

            width:
                14px;

            height:
                14px;

            display:
                grid;

            place-items:
                center;

            border:
                1px solid var(--black);

            background:
                var(--white);

            font-size:
                8px;

            font-weight:
                900;
        }


        .requirement.valid {

            color:
                #347A61;
        }


        .requirement.valid
        .requirement-icon {

            background:
                var(--soft);
        }


        /* ==================================================
           ERROR
        ================================================== */

        .error-message {

            margin-top:
                7px;

            color:
                var(--danger);

            font-size:
                9px;

            line-height:
                1.5;

            font-weight:
                700;
        }


        /* ==================================================
           BUTTON
        ================================================== */

        .submit-button {

            width:
                100%;

            min-height:
                56px;

            border:
                var(--border);

            background:
                var(--primary);

            color:
                var(--white);

            box-shadow:
                var(--small-shadow);

            cursor:
                pointer;

            font-size:
                11px;

            font-weight:
                900;

            letter-spacing:
                .04em;

            text-transform:
                uppercase;

            transition:
                .12s ease;
        }


        .submit-button:hover {

            transform:
                translate(3px, 3px);

            box-shadow:
                1px 1px 0 var(--black);
        }


        .submit-button:active {

            transform:
                translate(4px, 4px);

            box-shadow:
                none;
        }


        .submit-button:disabled {

            opacity:
                .6;

            cursor:
                not-allowed;

            transform:
                none;

            box-shadow:
                var(--small-shadow);
        }


        /* ==================================================
           SECURITY NOTE
        ================================================== */

        .security-note {

            margin-top:
                22px;

            padding:
                13px;

            border:
                2px solid var(--black);

            background:
                var(--yellow);

            font-size:
                9px;

            line-height:
                1.6;

            color:
                var(--gray);
        }


        .security-note strong {

            color:
                var(--black);
        }


        /* ==================================================
           FOOTER
        ================================================== */

        .footer {

            padding:
                18px 25px;

            border-top:
                var(--border);

            background:
                var(--light);

            text-align:
                center;
        }


        .footer p {

            margin:
                0;

            color:
                var(--gray);

            font-size:
                9px;

            line-height:
                1.6;
        }


        .footer a {

            color:
                var(--black);

            font-weight:
                900;

            text-decoration:
                none;

            border-bottom:
                1px solid var(--black);
        }


        /* ==================================================
           MOBILE
        ================================================== */

        @media (max-width: 600px) {

            body {

                padding:
                    10px;

                align-items:
                    flex-start;
            }


            .auth-card {

                width:
                    100%;

                box-shadow:
                    5px 5px 0 var(--black);
            }


            .header {

                padding:
                    18px;
            }


            .header-label {

                display:
                    none;
            }


            .content {

                padding:
                    30px 20px 25px;
            }


            h1 {

                font-size:
                    42px;
            }


            .form-input {

                height:
                    56px;
            }


            .submit-button {

                min-height:
                    56px;
            }
        }


        @media (max-width: 380px) {

            .content {

                padding:
                    25px 15px 20px;
            }


            h1 {

                font-size:
                    37px;
            }
        }

    </style>

</head>


<body>


<div class="auth-card">


    <!-- ==================================================
         HEADER
    ================================================== -->

    <header class="header">


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


        <span class="header-label">
            Account Security
        </span>


    </header>


    <!-- ==================================================
         CONTENT
    ================================================== -->

    <main class="content">


        @if ($invalidToken)


            <!-- ==================================================
                 INVALID TOKEN
            ================================================== -->

            <span class="label">
                Password reset
            </span>


            <h1>
                Link expired.
            </h1>


            <p class="description">
                This password reset link is invalid or
                has expired. For your security, reset
                links can only be used for a limited time.
            </p>


            <div class="invalid-box">


                <div class="invalid-icon">
                    !
                </div>


                <h2>
                    Unable to reset password
                </h2>


                <p>
                    Please request a new password reset
                    link and try again.
                </p>


            </div>


            <div
                style="
                    margin-top:25px;
                "
            >

                <a
                    href="{{ route('password.request') }}"
                    class="submit-button"
                    style="
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        text-decoration:none;
                    "
                >
                    Request new reset link
                </a>

            </div>


        @else


            <!-- ==================================================
                 VALID TOKEN
            ================================================== -->

            <span class="label">
                Password reset
            </span>


            <h1>
                Create a<br>
                new password.
            </h1>


            <p class="description">
                Choose a strong password for your Almantic
                account. Your new password will replace
                your current password immediately.
            </p>


            <!-- ==================================================
                 FORM
            ================================================== -->

            <form
                method="POST"
                action="{{ route('password.update') }}"
                id="reset-form"
                autocomplete="off"
            >

                @csrf


                <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}"
                >


                <!-- PASSWORD -->

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        New password
                    </label>


                    <div class="input-wrap">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') error @enderror"
                            placeholder="Enter a strong password"
                            minlength="12"
                            autocomplete="new-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password"
                            aria-label="Show password"
                        >
                            SHOW
                        </button>

                    </div>


                    @error('password')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PASSWORD REQUIREMENTS -->

                <div class="requirements">

                    <p class="requirements-title">
                        Password requirements
                    </p>


                    <div
                        class="requirement"
                        data-rule="length"
                    >

                        <span class="requirement-icon">
                            —
                        </span>

                        At least 12 characters

                    </div>


                    <div
                        class="requirement"
                        data-rule="lowercase"
                    >

                        <span class="requirement-icon">
                            —
                        </span>

                        At least one lowercase letter

                    </div>


                    <div
                        class="requirement"
                        data-rule="uppercase"
                    >

                        <span class="requirement-icon">
                            —
                        </span>

                        At least one uppercase letter

                    </div>


                    <div
                        class="requirement"
                        data-rule="number"
                    >

                        <span class="requirement-icon">
                            —
                        </span>

                        At least one number

                    </div>


                    <div
                        class="requirement"
                        data-rule="special"
                    >

                        <span class="requirement-icon">
                            —
                        </span>

                        At least one special character

                    </div>


                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Confirm new password
                    </label>


                    <div class="input-wrap">

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input @error('password_confirmation') error @enderror"
                            placeholder="Repeat your new password"
                            minlength="12"
                            autocomplete="new-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            data-target="password_confirmation"
                            aria-label="Show password"
                        >
                            SHOW
                        </button>

                    </div>


                    @error('password_confirmation')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- SUBMIT -->

                <button
                    type="submit"
                    class="submit-button"
                    id="submit-button"
                >
                    Reset password
                </button>


            </form>


            <!-- SECURITY -->

            <div class="security-note">

                <strong>
                    Security:
                </strong>

                Your reset link is single-use and
                expires after the allowed reset period.
                Never share this link with anyone.

            </div>


        @endif


    </main>


    <!-- ==================================================
         FOOTER
    ================================================== -->

    <footer class="footer">

        <p>

            Need help?

            <a href="{{ route('login') }}">
                Return to sign in
            </a>

        </p>

    </footer>


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
                        button.getAttribute(
                            'data-target'
                        );

                    const input =
                        document.getElementById(
                            targetId
                        );


                    if (
                        input.type === 'password'
                    ) {

                        input.type =
                            'text';

                        button.textContent =
                            'HIDE';

                        button.setAttribute(
                            'aria-label',
                            'Hide password'
                        );

                    } else {

                        input.type =
                            'password';

                        button.textContent =
                            'SHOW';

                        button.setAttribute(
                            'aria-label',
                            'Show password'
                        );

                    }

                }
            );

        });


    /*
    |--------------------------------------------------------------------------
    | Password Requirement Checker
    |--------------------------------------------------------------------------
    */

    const password =
        document.getElementById(
            'password'
        );


    if (password) {

        password.addEventListener(
            'input',
            function () {

                const value =
                    password.value;


                const rules = {

                    length:
                        value.length >= 12,

                    lowercase:
                        /[a-z]/.test(value),

                    uppercase:
                        /[A-Z]/.test(value),

                    number:
                        /[0-9]/.test(value),

                    special:
                        /[^A-Za-z0-9]/.test(value)

                };


                Object
                    .keys(rules)
                    .forEach(
                        function (rule) {

                            const element =
                                document.querySelector(
                                    '[data-rule="' +
                                    rule +
                                    '"]'
                                );


                            if (!element) {
                                return;
                            }


                            const icon =
                                element.querySelector(
                                    '.requirement-icon'
                                );


                            if (
                                rules[rule]
                            ) {

                                element.classList.add(
                                    'valid'
                                );

                                icon.textContent =
                                    '✓';

                            } else {

                                element.classList.remove(
                                    'valid'
                                );

                                icon.textContent =
                                    '—';

                            }

                        }
                    );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Submit Protection
    |--------------------------------------------------------------------------
    */

    const resetForm =
        document.getElementById(
            'reset-form'
        );


    const submitButton =
        document.getElementById(
            'submit-button'
        );


    if (
        resetForm &&
        submitButton
    ) {

        resetForm.addEventListener(
            'submit',
            function () {

                submitButton.disabled =
                    true;

                submitButton.textContent =
                    'Resetting password...';

            }
        );

    }

</script>


</body>

</html>