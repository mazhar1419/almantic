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
        Database Migration — Almantic
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

            --border:
                3px solid var(--black);

            --shadow:
                8px 8px 0 var(--black);

            --small-shadow:
                4px 4px 0 var(--black);
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

            background:
                var(--cream);

            color:
                var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        .migration-wrapper {

            width:
                min(100%, 720px);
        }


        /* ==================================================
           BRAND
        ================================================== */

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 22px;

            font-size: 21px;

            font-weight: 900;

            letter-spacing: -0.05em;
        }


        .brand-mark {

            width: 46px;

            height: 46px;

            object-fit: contain;

            display: block;

            border:
                var(--border);

            box-shadow:
                var(--small-shadow);

            background:
                var(--primary);
        }


        /* ==================================================
           CARD
        ================================================== */

        .migration-card {

            position: relative;

            background:
                var(--white);

            border:
                var(--border);

            box-shadow:
                var(--shadow);

            padding: 42px;
        }


        .migration-card::before {

            content: "";

            position: absolute;

            width: 18px;

            height: 18px;

            top: 18px;

            right: 18px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            transform:
                rotate(8deg);
        }


        .eyebrow {

            display: inline-block;

            padding: 7px 10px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            box-shadow:
                3px 3px 0 var(--black);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .08em;

            text-transform:
                uppercase;
        }


        h1 {

            margin:
                25px 0 12px;

            font-size:
                clamp(44px, 8vw, 72px);

            line-height:
                .9;

            letter-spacing:
                -.07em;

            font-weight:
                900;
        }


        .intro {

            max-width:
                560px;

            margin:
                0 0 32px;

            color:
                var(--gray);

            font-size:
                15px;

            line-height:
                1.65;
        }


        /* ==================================================
           WARNING
        ================================================== */

        .warning {

            display:
                flex;

            gap:
                15px;

            margin-bottom:
                30px;

            padding:
                17px;

            border:
                var(--border);

            background:
                var(--light);
        }


        .warning-icon {

            width:
                34px;

            height:
                34px;

            flex:
                0 0 34px;

            display:
                grid;

            place-items:
                center;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-weight:
                900;
        }


        .warning-content strong {

            display:
                block;

            margin-bottom:
                4px;

            font-size:
                13px;
        }


        .warning-content p {

            margin:
                0;

            color:
                var(--gray);

            font-size:
                12px;

            line-height:
                1.55;
        }


        /* ==================================================
           FORM
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
                11px;

            font-weight:
                900;

            text-transform:
                uppercase;

            letter-spacing:
                .07em;
        }


        .input-wrapper {

            position:
                relative;
        }


        input {

            width:
                100%;

            min-height:
                56px;

            padding:
                13px 48px 13px 15px;

            border:
                var(--border);

            outline:
                none;

            background:
                var(--cream);

            color:
                var(--black);

            font-size:
                15px;

            font-family:
                inherit;

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


        .key-icon {

            position:
                absolute;

            right:
                15px;

            top:
                50%;

            transform:
                translateY(-50%);

            font-size:
                18px;
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

            font-size:
                14px;

            font-weight:
                900;

            letter-spacing:
                .02em;

            transition:
                transform .12s ease,
                box-shadow .12s ease;
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
                .7;
        }


        /* ==================================================
           ERROR
        ================================================== */

        .error {

            margin-bottom:
                22px;

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
           FOOTER
        ================================================== */

        .footer {

            display:
                flex;

            justify-content:
                space-between;

            gap:
                20px;

            margin-top:
                20px;

            color:
                var(--gray);

            font-size:
                10px;

            font-weight:
                700;
        }


        .footer strong {

            color:
                var(--black);
        }


        /* ==================================================
           LOADING
        ================================================== */

        .loading {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                10px;
        }


        .spinner {

            width:
                16px;

            height:
                16px;

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

        @media (max-width: 600px) {

            body {

                padding:
                    14px;
            }


            .migration-card {

                padding:
                    28px 20px;
            }


            .brand-mark {

                width:
                    40px;

                height:
                    40px;
            }


            h1 {

                font-size:
                    50px;
            }


            .intro {

                font-size:
                    14px;
            }


            .warning {

                padding:
                    13px;
            }


            .footer {

                display:
                    block;

                line-height:
                    1.8;
            }


            .footer span {

                display:
                    block;
            }
        }

    </style>

</head>


<body>


<div class="migration-wrapper">


    <!-- ==================================================
         BRAND
    ================================================== -->

    <div class="brand">

        <img
            src="{{ asset('images/almantic-mark.png') }}"
            alt="Almantic"
            class="brand-mark"
        >

        <span>
            Almantic
        </span>

    </div>


    <!-- ==================================================
         MAIN CARD
    ================================================== -->

    <main class="migration-card">


        <span class="eyebrow">
            System / Database
        </span>


        <h1>
            Migration
        </h1>


        <p class="intro">

            Apply pending database migrations for the
            Almantic application.

            Existing tables and already-applied migrations
            will automatically be skipped.

        </p>


        <!-- ==================================================
             WARNING
        ================================================== -->

        <div class="warning">

            <div class="warning-icon">
                !
            </div>


            <div class="warning-content">

                <strong>
                    Protected system operation
                </strong>


                <p>

                    This operation modifies the application
                    database. Only run migrations during
                    deployment or system updates.

                </p>

            </div>

        </div>


        <!-- ==================================================
             ERRORS
        ================================================== -->

        @if ($errors->any())

            <div class="error">

                {{ $errors->first() }}

            </div>

        @endif


        <!-- ==================================================
             MIGRATION FORM
        ================================================== -->

        <form
            method="POST"
            action="{{ route('system.migrate') }}"
            id="migration-form"
        >

            @csrf


            <div class="field">

                <label
                    for="migration_key"
                >
                    Migration Key
                </label>


                <div class="input-wrapper">

                    <input
                        type="password"
                        id="migration_key"
                        name="migration_key"
                        placeholder="Enter migration key"
                        autocomplete="off"
                        spellcheck="false"
                        required
                    >


                    <span
                        class="key-icon"
                        aria-hidden="true"
                    >
                        🔐
                    </span>

                </div>

            </div>


            <button
                type="submit"
                class="submit-button"
                id="migration-button"
            >

                <span id="button-text">
                    Run Database Migration
                </span>

            </button>

        </form>


    </main>


    <!-- ==================================================
         FOOTER
    ================================================== -->

    <footer class="footer">

        <span>

            <strong>
                Almantic
            </strong>

            Database System

        </span>


        <span>
            Protected deployment interface
        </span>

    </footer>


</div>


<script>

    const form =
        document.getElementById(
            'migration-form'
        );


    const button =
        document.getElementById(
            'migration-button'
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

                    Running migrations...

                </span>
            `;

        }
    );

</script>


</body>

</html>