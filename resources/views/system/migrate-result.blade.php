<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Migration Result — Almantic
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

            padding: 24px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--cream);

            color: var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        .wrapper {

            width:
                min(100%, 760px);
        }


        /* =========================================
           BRAND
        ========================================= */

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 22px;

            font-size: 21px;

            font-weight: 900;

            letter-spacing: -.05em;
        }


        .brand-mark {

            width: 46px;

            height: 46px;

            border: var(--border);

            box-shadow: var(--small-shadow);

            object-fit: contain;

            background: var(--primary);
        }


        /* =========================================
           CARD
        ========================================= */

        .card {

            background: var(--white);

            border: var(--border);

            box-shadow: var(--shadow);

            padding: 42px;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status {

            width: 72px;

            height: 72px;

            display: grid;

            place-items: center;

            margin-bottom: 25px;

            border: var(--border);

            box-shadow: var(--small-shadow);

            font-size: 32px;

            font-weight: 900;
        }


        .status.success {

            background: var(--primary);

            color: var(--white);
        }


        .status.error {

            background: #FFE5E2;

            color: var(--danger);
        }


        .eyebrow {

            display: inline-block;

            padding: 6px 10px;

            border: 2px solid var(--black);

            background: var(--soft);

            font-size: 10px;

            font-weight: 900;

            text-transform: uppercase;

            letter-spacing: .08em;
        }


        h1 {

            margin: 20px 0 12px;

            font-size:
                clamp(40px, 7vw, 68px);

            line-height: .9;

            letter-spacing: -.07em;

            font-weight: 900;
        }


        .message {

            margin: 0 0 30px;

            color: var(--gray);

            font-size: 15px;

            line-height: 1.6;
        }


        /* =========================================
           SUMMARY
        ========================================= */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-bottom: 30px;
        }


        .summary-item {

            padding: 17px;

            border: 2px solid var(--black);

            background: var(--light);
        }


        .summary-label {

            margin-bottom: 6px;

            color: var(--gray);

            font-size: 10px;

            font-weight: 900;

            text-transform: uppercase;

            letter-spacing: .07em;
        }


        .summary-value {

            font-size: 22px;

            font-weight: 900;
        }


        /* =========================================
           MIGRATIONS
        ========================================= */

        .results-title {

            margin-bottom: 12px;

            padding-bottom: 12px;

            border-bottom: var(--border);

            font-size: 17px;

            font-weight: 900;
        }


        .migration {

            display: flex;

            align-items: flex-start;

            gap: 12px;

            padding: 14px;

            margin-bottom: 8px;

            border: 2px solid var(--black);

            background: var(--cream);
        }


        .migration-status {

            min-width: 78px;

            padding: 5px 7px;

            border: 2px solid var(--black);

            text-align: center;

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;
        }


        .migration-status.applied {

            background: var(--primary);

            color: var(--white);
        }


        .migration-status.skipped {

            background: var(--soft);

            color: var(--black);
        }


        .migration-status.ready {

            background: var(--light);

            color: var(--black);
        }


        .migration-name {

            overflow-wrap: anywhere;

            font-size: 12px;

            font-weight: 900;
        }


        .migration-message {

            margin-top: 4px;

            color: var(--gray);

            font-size: 11px;

            line-height: 1.4;
        }


        /* =========================================
           ACTION
        ========================================= */

        .actions {

            display: flex;

            gap: 12px;

            margin-top: 30px;
        }


        .button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 52px;

            padding: 0 20px;

            border: var(--border);

            box-shadow: var(--small-shadow);

            text-decoration: none;

            font-size: 12px;

            font-weight: 900;

            transition:
                transform .12s ease,
                box-shadow .12s ease;
        }


        .button:hover {

            transform:
                translate(3px, 3px);

            box-shadow:
                1px 1px 0 var(--black);
        }


        .button.primary {

            background: var(--primary);

            color: var(--white);
        }


        .button.secondary {

            background: var(--white);

            color: var(--black);
        }


        /* =========================================
           FOOTER
        ========================================= */

        footer {

            display: flex;

            justify-content: space-between;

            gap: 20px;

            margin-top: 20px;

            color: var(--gray);

            font-size: 10px;

            font-weight: 700;
        }


        footer strong {

            color: var(--black);
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 600px) {

            body {

                padding: 14px;
            }


            .card {

                padding: 27px 20px;
            }


            .summary {

                grid-template-columns: 1fr;
            }


            .actions {

                flex-direction: column;
            }


            .button {

                width: 100%;
            }


            footer {

                display: block;

                line-height: 1.8;
            }
        }

    </style>

</head>


<body>


<div class="wrapper">


    <!-- BRAND -->

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


    <!-- CARD -->

    <main class="card">


        @php

            $success =
                $result['success'] ?? false;

        @endphp


        <!-- STATUS -->

        <div
            class="status {{ $success ? 'success' : 'error' }}"
        >

            @if ($success)

                ✓

            @else

                !

            @endif

        </div>


        <span class="eyebrow">

            {{ $success
                ? 'System Ready'
                : 'System Error'
            }}

        </span>


        <!-- TITLE -->

        <h1>

            {{ $result['title'] ?? 'Migration Result' }}

        </h1>


        <!-- MESSAGE -->

        <p class="message">

            {{ $result['message'] ?? '' }}

        </p>


        @if ($success)

            <!-- SUMMARY -->

            <div class="summary">

                <div class="summary-item">

                    <div class="summary-label">
                        Batch
                    </div>

                    <div class="summary-value">
                        #{{ $result['batch'] ?? '-' }}
                    </div>

                </div>


                <div class="summary-item">

                    <div class="summary-label">
                        Migrations
                    </div>

                    <div class="summary-value">

                        {{ count($result['results'] ?? []) }}

                    </div>

                </div>

            </div>


            <!-- RESULTS -->

            @if (!empty($result['results']))

                <div class="results-title">

                    Migration Details

                </div>


                @foreach ($result['results'] as $migration)

                    <div class="migration">

                        <span
                            class="
                                migration-status
                                {{ $migration['status'] }}
                            "
                        >

                            {{ $migration['status'] }}

                        </span>


                        <div>

                            <div class="migration-name">

                                {{ $migration['migration'] }}

                            </div>


                            <div class="migration-message">

                                {{ $migration['message'] }}

                            </div>

                        </div>

                    </div>

                @endforeach

            @endif

        @endif


        <!-- ACTIONS -->

        <div class="actions">

            <a
                href="{{ route('system.migrate.page') }}"
                class="button primary"
            >
                Run Again
            </a>


            <a
                href="{{ route('home') }}"
                class="button secondary"
            >
                Back to Almantic
            </a>

        </div>


    </main>


    <!-- FOOTER -->

    <footer>

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


</body>

</html>