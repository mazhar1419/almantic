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
        {{ $success ? 'Email Verified' : 'Verification Failed' }} — Almantic
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
            --danger-bg: #FFF0EF;

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
            min-height: 100%;
        }


        body {

            min-height: 100vh;

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
           CARD
        ================================================== */

        .page {

            width:
                min(100%, 760px);

            border:
                var(--border);

            background:
                var(--white);

            box-shadow:
                var(--shadow);
        }


        /* ==================================================
           HEADER
        ================================================== */

        .header {

            padding:
                24px 30px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

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
                12px;
        }


        .brand-mark {

            width:
                44px;

            height:
                44px;

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
                23px;

            font-weight:
                900;

            letter-spacing:
                -.06em;
        }


        .header-label {

            padding:
                7px 10px;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                9px;

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
                50px 40px;

            text-align:
                center;
        }


        /* ==================================================
           ICON
        ================================================== */

        .status-icon {

            width:
                78px;

            height:
                78px;

            margin:
                0 auto 28px;

            display:
                grid;

            place-items:
                center;

            border:
                var(--border);

            font-size:
                32px;

            font-weight:
                900;

            box-shadow:
                var(--small-shadow);
        }


        .status-icon.success {

            background:
                var(--soft);
        }


        .status-icon.error {

            background:
                var(--danger-bg);

            color:
                var(--danger);
        }


        /* ==================================================
           TITLE
        ================================================== */

        .content h1 {

            margin:
                0 0 16px;

            font-size:
                clamp(40px, 7vw, 64px);

            line-height:
                .92;

            letter-spacing:
                -.075em;

            font-weight:
                900;
        }


        .content p {

            max-width:
                520px;

            margin:
                0 auto;

            color:
                var(--gray);

            font-size:
                14px;

            line-height:
                1.7;
        }


        /* ==================================================
           MESSAGE
        ================================================== */

        .message {

            max-width:
                560px;

            margin:
                28px auto 0;

            padding:
                16px;

            border:
                2px solid var(--black);

            background:
                var(--light);

            font-size:
                12px;

            line-height:
                1.6;

            font-weight:
                700;
        }


        .message.error {

            background:
                var(--danger-bg);

            color:
                var(--danger);
        }


        /* ==================================================
           ACTIONS
        ================================================== */

        .actions {

            margin-top:
                35px;

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            gap:
                14px;

            flex-wrap:
                wrap;
        }


        .button {

            min-height:
                52px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                0 22px;

            border:
                var(--border);

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                900;

            text-transform:
                uppercase;

            letter-spacing:
                .04em;

            transition:
                transform .12s ease,
                box-shadow .12s ease;
        }


        .button-primary {

            background:
                var(--primary);

            color:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        .button-secondary {

            background:
                var(--white);

            color:
                var(--black);

            box-shadow:
                var(--small-shadow);
        }


        .button:hover {

            transform:
                translate(3px, 3px);

            box-shadow:
                1px 1px 0 var(--black);
        }


        .button:active {

            transform:
                translate(4px, 4px);

            box-shadow:
                none;
        }


        /* ==================================================
           FOOTER
        ================================================== */

        .footer {

            padding:
                20px 30px;

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
                10px;

            line-height:
                1.6;
        }


        .footer strong {

            color:
                var(--black);
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


            .page {

                width:
                    100%;

                box-shadow:
                    5px 5px 0 var(--black);
            }


            .header {

                padding:
                    20px;

            }


            .header-label {

                display:
                    none;
            }


            .content {

                padding:
                    40px 20px;
            }


            .content h1 {

                font-size:
                    42px;
            }


            .actions {

                flex-direction:
                    column;
            }


            .button {

                width:
                    100%;
            }


            .footer {

                padding:
                    18px;
            }
        }

    </style>

</head>


<body>


<div class="page">


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


        @if ($success)


            <!-- SUCCESS -->

            <div class="status-icon success">

                ✓

            </div>


            <h1>

                Email verified.

            </h1>


            <p>

                Your Almantic account is now verified.
                You can sign in and start using your
                workspace.

            </p>


            <div class="message">

                {{ $message }}

            </div>


            <div class="actions">

                <a
                    href="{{ route('login') }}"
                    class="button button-primary"
                >
                    Sign in to Almantic
                </a>

            </div>


        @else


            <!-- ERROR -->

            <div class="status-icon error">

                !

            </div>


            <h1>

                Verification failed.

            </h1>


            <p>

                We could not verify your email address
                using this verification link.

            </p>


            <div class="message error">

                {{ $message }}

            </div>


            <div class="actions">

                <a
                    href="{{ route('verification.resend') }}"
                    class="button button-primary"
                >
                    Send new verification email
                </a>


                <a
                    href="{{ route('login') }}"
                    class="button button-secondary"
                >
                    Back to sign in
                </a>

            </div>


        @endif


    </main>


    <!-- ==================================================
         FOOTER
    ================================================== -->

    <footer class="footer">

        <p>

            <strong>ALMANTIC</strong>
            · Secure workspace for your work and team.

        </p>

    </footer>


</div>


</body>

</html>