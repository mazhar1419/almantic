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
        Dashboard — Almantic
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

            --yellow: #FFF1A8;
            --danger: #D9534F;

            --border: 3px solid var(--black);

            --shadow: 6px 6px 0 var(--black);
            --small-shadow: 3px 3px 0 var(--black);
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

            background:
                var(--cream);

            color:
                var(--black);

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        button,
        input {
            font-family: inherit;
        }


        a {
            color: inherit;
        }


        /* ==================================================
           APP
        ================================================== */

        .app {

            min-height:
                100vh;

            display:
                flex;
        }


        /* ==================================================
           SIDEBAR
        ================================================== */

        .sidebar {

            position:
                fixed;

            left:
                0;

            top:
                0;

            bottom:
                0;

            width:
                245px;

            display:
                flex;

            flex-direction:
                column;

            padding:
                20px;

            background:
                var(--primary);

            border-right:
                var(--border);

            z-index:
                100;
        }


        /* ==================================================
           BRAND
        ================================================== */

        .brand {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            margin-bottom:
                28px;

            text-decoration:
                none;
        }


        .brand-mark {

            width:
                42px;

            height:
                42px;

            object-fit:
                contain;

            border:
                var(--border);

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


        /* ==================================================
           WORKSPACE
        ================================================== */

        .workspace {

            margin-bottom:
                22px;

            padding:
                12px;

            border:
                2px solid var(--black);

            background:
                var(--soft);
        }


        .workspace-label {

            display:
                block;

            margin-bottom:
                5px;

            font-size:
                8px;

            font-weight:
                900;

            letter-spacing:
                .1em;

            text-transform:
                uppercase;
        }


        .workspace-name {

            display:
                block;

            overflow:
                hidden;

            text-overflow:
                ellipsis;

            white-space:
                nowrap;

            font-size:
                13px;

            font-weight:
                900;
        }


        /* ==================================================
           NAV
        ================================================== */

        .nav {

            display:
                grid;

            gap:
                7px;
        }


        .nav-label {

            margin:
                4px 0 3px;

            color:
                rgba(17,17,17,.65);

            font-size:
                8px;

            font-weight:
                900;

            letter-spacing:
                .1em;

            text-transform:
                uppercase;
        }


        .nav-item {

            min-height:
                43px;

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            padding:
                0 11px;

            border:
                2px solid transparent;

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                900;

            transition:
                .12s ease;
        }


        .nav-item:hover {

            border:
                2px solid var(--black);

            background:
                var(--white);
        }


        .nav-item.active {

            border:
                2px solid var(--black);

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        .nav-icon {

            width:
                23px;

            height:
                23px;

            display:
                grid;

            place-items:
                center;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                10px;
        }


        /* ==================================================
           SIDEBAR BOTTOM
        ================================================== */

        .sidebar-bottom {

            margin-top:
                auto;
        }


        .help-box {

            margin-bottom:
                12px;

            padding:
                12px;

            border:
                2px solid var(--black);

            background:
                var(--yellow);
        }


        .help-box strong {

            display:
                block;

            margin-bottom:
                5px;

            font-size:
                10px;
        }


        .help-box span {

            color:
                var(--gray);

            font-size:
                9px;

            line-height:
                1.5;
        }


        .user-mini {

            display:
                flex;

            align-items:
                center;

            gap:
                9px;

            padding:
                10px;

            border:
                2px solid var(--black);

            background:
                var(--white);
        }


        .avatar {

            width:
                34px;

            height:
                34px;

            display:
                grid;

            place-items:
                center;

            flex:
                0 0 auto;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                11px;

            font-weight:
                900;
        }


        .user-info {

            min-width:
                0;
        }


        .user-name {

            overflow:
                hidden;

            text-overflow:
                ellipsis;

            white-space:
                nowrap;

            font-size:
                10px;

            font-weight:
                900;
        }


        .user-email {

            overflow:
                hidden;

            text-overflow:
                ellipsis;

            white-space:
                nowrap;

            margin-top:
                2px;

            color:
                var(--gray);

            font-size:
                8px;
        }


        /* ==================================================
           MAIN
        ================================================== */

        .main {

            width:
                calc(100% - 245px);

            margin-left:
                245px;

            min-height:
                100vh;
        }


        /* ==================================================
           TOPBAR
        ================================================== */

        .topbar {

            position:
                sticky;

            top:
                0;

            z-index:
                50;

            min-height:
                75px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;

            padding:
                15px 25px;

            background:
                rgba(250,252,248,.96);

            border-bottom:
                var(--border);
        }


        .mobile-menu {

            display:
                none;
        }


        .page-heading {

            min-width:
                0;
        }


        .page-heading h1 {

            margin:
                0;

            font-size:
                26px;

            line-height:
                1;

            letter-spacing:
                -.06em;

            font-weight:
                900;
        }


        .page-heading p {

            margin:
                5px 0 0;

            color:
                var(--gray);

            font-size:
                10px;
        }


        .top-actions {

            display:
                flex;

            align-items:
                center;

            gap:
                8px;
        }


        .top-button {

            min-height:
                39px;

            padding:
                0 12px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            border:
                2px solid var(--black);

            background:
                var(--white);

            text-decoration:
                none;

            cursor:
                pointer;

            font-size:
                9px;

            font-weight:
                900;
        }


        .top-button:hover {

            background:
                var(--soft);
        }


        .top-button.primary {

            background:
                var(--primary);

            color:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        /* ==================================================
           CONTENT
        ================================================== */

        .content {

            padding:
                28px 25px 50px;

            max-width:
                1450px;

            margin:
                0 auto;
        }


        /* ==================================================
           WELCOME
        ================================================== */

        .welcome {

            position:
                relative;

            overflow:
                hidden;

            margin-bottom:
                25px;

            padding:
                25px;

            border:
                var(--border);

            background:
                var(--soft);

            box-shadow:
                var(--shadow);
        }


        .welcome::after {

            content:
                "";

            position:
                absolute;

            width:
                120px;

            height:
                120px;

            right:
                -40px;

            top:
                -45px;

            border:
                3px solid var(--black);

            background:
                var(--mint);

            transform:
                rotate(15deg);
        }


        .welcome-label {

            display:
                inline-block;

            padding:
                6px 9px;

            border:
                2px solid var(--black);

            background:
                var(--white);

            font-size:
                8px;

            font-weight:
                900;

            letter-spacing:
                .08em;

            text-transform:
                uppercase;
        }


        .welcome h2 {

            position:
                relative;

            z-index:
                2;

            margin:
                16px 0 7px;

            font-size:
                clamp(30px, 4vw, 46px);

            line-height:
                .95;

            letter-spacing:
                -.07em;

            font-weight:
                900;
        }


        .welcome p {

            position:
                relative;

            z-index:
                2;

            max-width:
                580px;

            margin:
                0;

            color:
                rgba(17,17,17,.7);

            font-size:
                12px;

            line-height:
                1.6;
        }


        /* ==================================================
           STATS
        ================================================== */

        .stats {

            display:
                grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap:
                14px;

            margin-bottom:
                25px;
        }


        .stat-card {

            min-height:
                135px;

            padding:
                18px;

            border:
                var(--border);

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        .stat-top {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                10px;
        }


        .stat-label {

            color:
                var(--gray);

            font-size:
                9px;

            font-weight:
                900;

            letter-spacing:
                .06em;

            text-transform:
                uppercase;
        }


        .stat-icon {

            width:
                27px;

            height:
                27px;

            display:
                grid;

            place-items:
                center;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                10px;
        }


        .stat-number {

            margin-top:
                18px;

            font-size:
                31px;

            line-height:
                1;

            letter-spacing:
                -.06em;

            font-weight:
                900;
        }


        .stat-change {

            margin-top:
                8px;

            font-size:
                9px;

            font-weight:
                800;
        }


        .stat-change.positive {

            color:
                #347A61;
        }


        /* ==================================================
           GRID
        ================================================== */

        .dashboard-grid {

            display:
                grid;

            grid-template-columns:
                minmax(0, 1.5fr)
                minmax(280px, .8fr);

            gap:
                18px;
        }


        /* ==================================================
           PANEL
        ================================================== */

        .panel {

            border:
                var(--border);

            background:
                var(--white);

            box-shadow:
                var(--small-shadow);
        }


        .panel-header {

            min-height:
                58px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                10px;

            padding:
                12px 16px;

            border-bottom:
                2px solid var(--black);
        }


        .panel-title {

            font-size:
                12px;

            font-weight:
                900;
        }


        .panel-link {

            font-size:
                9px;

            font-weight:
                900;

            text-decoration:
                none;

            border-bottom:
                2px solid var(--black);
        }


        /* ==================================================
           TABLE
        ================================================== */

        .table-wrap {

            width:
                100%;

            overflow-x:
                auto;
        }


        .table {

            width:
                100%;

            border-collapse:
                collapse;

            min-width:
                580px;
        }


        .table th {

            padding:
                12px 15px;

            border-bottom:
                2px solid var(--black);

            text-align:
                left;

            background:
                var(--light);

            font-size:
                8px;

            font-weight:
                900;

            letter-spacing:
                .07em;

            text-transform:
                uppercase;
        }


        .table td {

            padding:
                13px 15px;

            border-bottom:
                1px solid #DDE5E0;

            font-size:
                10px;
        }


        .table tr:last-child td {

            border-bottom:
                0;
        }


        .customer {

            display:
                flex;

            align-items:
                center;

            gap:
                9px;
        }


        .customer-avatar {

            width:
                29px;

            height:
                29px;

            display:
                grid;

            place-items:
                center;

            border:
                2px solid var(--black);

            background:
                var(--soft);

            font-size:
                8px;

            font-weight:
                900;
        }


        .customer-name {

            font-weight:
                900;
        }


        .customer-email {

            margin-top:
                2px;

            color:
                var(--gray);

            font-size:
                8px;
        }


        .badge {

            display:
                inline-block;

            padding:
                5px 7px;

            border:
                2px solid var(--black);

            font-size:
                8px;

            font-weight:
                900;
        }


        .badge-green {

            background:
                var(--soft);
        }


        .badge-yellow {

            background:
                var(--yellow);
        }


        /* ==================================================
           QUICK ACTIONS
        ================================================== */

        .quick-actions {

            padding:
                16px;

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                10px;
        }


        .quick-action {

            min-height:
                100px;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                space-between;

            padding:
                12px;

            border:
                2px solid var(--black);

            background:
                var(--cream);

            text-decoration:
                none;

            transition:
                .12s ease;
        }


        .quick-action:hover {

            background:
                var(--soft);

            box-shadow:
                var(--small-shadow);

            transform:
                translate(-2px,-2px);
        }


        .quick-icon {

            width:
                30px;

            height:
                30px;

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


        .quick-action strong {

            font-size:
                10px;
        }


        .quick-action span {

            color:
                var(--gray);

            font-size:
                8px;

            line-height:
                1.4;
        }


        /* ==================================================
           ACTIVITY
        ================================================== */

        .activity {

            padding:
                5px 16px 15px;
        }


        .activity-item {

            display:
                flex;

            gap:
                10px;

            padding:
                13px 0;

            border-bottom:
                1px solid #DDE5E0;
        }


        .activity-item:last-child {

            border-bottom:
                0;
        }


        .activity-dot {

            width:
                10px;

            height:
                10px;

            margin-top:
                4px;

            flex:
                0 0 auto;

            border:
                2px solid var(--black);

            background:
                var(--mint);
        }


        .activity-text {

            font-size:
                9px;

            line-height:
                1.5;
        }


        .activity-text strong {

            font-weight:
                900;
        }


        .activity-time {

            margin-top:
                3px;

            color:
                var(--gray);

            font-size:
                8px;
        }


        /* ==================================================
           MOBILE OVERLAY
        ================================================== */

        .sidebar-overlay {

            display:
                none;

            position:
                fixed;

            inset:
                0;

            background:
                rgba(17,17,17,.45);

            z-index:
                90;
        }


        /* ==================================================
           TABLET
        ================================================== */

        @media (max-width: 1050px) {

            .sidebar {

                width:
                    215px;
            }


            .main {

                width:
                    calc(100% - 215px);

                margin-left:
                    215px;
            }


            .stats {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .dashboard-grid {

                grid-template-columns:
                    1fr;
            }
        }


        /* ==================================================
           MOBILE
        ================================================== */

        @media (max-width: 760px) {

            .sidebar {

                width:
                    260px;

                transform:
                    translateX(-100%);

                transition:
                    transform .2s ease;
            }


            .sidebar.open {

                transform:
                    translateX(0);
            }


            .sidebar-overlay.open {

                display:
                    block;
            }


            .main {

                width:
                    100%;

                margin-left:
                    0;
            }


            .topbar {

                min-height:
                    68px;

                padding:
                    12px 15px;
            }


            .mobile-menu {

                width:
                    38px;

                height:
                    38px;

                display:
                    grid;

                place-items:
                    center;

                flex:
                    0 0 auto;

                border:
                    2px solid var(--black);

                background:
                    var(--white);

                cursor:
                    pointer;

                font-size:
                    16px;
            }


            .page-heading h1 {

                font-size:
                    21px;
            }


            .page-heading p {

                display:
                    none;
            }


            .top-actions .desktop-action {

                display:
                    none;
            }


            .content {

                padding:
                    20px 15px 40px;
            }


            .welcome {

                padding:
                    20px;

                box-shadow:
                    4px 4px 0 var(--black);
            }


            .welcome h2 {

                font-size:
                    34px;
            }


            .stats {

                grid-template-columns:
                    1fr 1fr;

                gap:
                    10px;
            }


            .stat-card {

                min-height:
                    115px;

                padding:
                    13px;
            }


            .stat-number {

                font-size:
                    26px;
            }


            .dashboard-grid {

                grid-template-columns:
                    1fr;

                gap:
                    14px;
            }
        }


        /* ==================================================
           SMALL MOBILE
        ================================================== */

        @media (max-width: 450px) {

            .stats {

                grid-template-columns:
                    1fr;
            }


            .stat-card {

                min-height:
                    100px;
            }


            .quick-actions {

                grid-template-columns:
                    1fr;
            }


            .top-actions {

                display:
                    none;
            }


            .welcome h2 {

                font-size:
                    30px;
            }


            .content {

                padding:
                    15px 10px 35px;
            }
        }

    </style>

</head>


<body>


<div class="app">


    <!-- ==================================================
         SIDEBAR OVERLAY
    ================================================== -->

    <div
        class="sidebar-overlay"
        id="sidebar-overlay"
    ></div>


    <!-- ==================================================
         SIDEBAR
    ================================================== -->

    <aside
        class="sidebar"
        id="sidebar"
    >


        <!-- BRAND -->

        <a
            href="{{ route('dashboard') }}"
            class="brand"
        >

            <img
                src="{{ asset('images/almantic-mark.png') }}"
                alt="Almantic"
                class="brand-mark"
            >

            <span class="brand-name">
                Almantic
            </span>

        </a>


        <!-- WORKSPACE -->

        <div class="workspace">

            <span class="workspace-label">
                Workspace
            </span>

            <span class="workspace-name">
                Personal Workspace
            </span>

        </div>


        <!-- NAV -->

        <nav class="nav">


            <span class="nav-label">
                Overview
            </span>


            <a
                href="{{ route('dashboard') }}"
                class="nav-item active"
            >

                <span class="nav-icon">
                    ▦
                </span>

                Dashboard

            </a>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ◉
                </span>

                Customers

            </a>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ◇
                </span>

                Leads

            </a>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ✓
                </span>

                Tasks

            </a>


            <span class="nav-label">
                Workspace
            </span>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ◎
                </span>

                Contacts

            </a>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    □
                </span>

                Projects

            </a>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ♧
                </span>

                Team

            </a>


            <span class="nav-label">
                Manage
            </span>


            <a
                href="#"
                class="nav-item"
            >

                <span class="nav-icon">
                    ⚙
                </span>

                Settings

            </a>

        </nav>


        <!-- SIDEBAR BOTTOM -->

        <div class="sidebar-bottom">


            <div class="help-box">

                <strong>
                    Need help?
                </strong>

                <span>
                    Explore Almantic or contact
                    the team if you need assistance.
                </span>

            </div>


            <div class="user-mini">

                <div class="avatar">

                    @php

                        $userName = session(
                            'auth_user_name',
                            'User'
                        );

                        $initials = collect(
                            preg_split(
                                '/\s+/',
                                trim($userName)
                            )
                        )
                        ->filter()
                        ->take(2)
                        ->map(
                            fn ($word) =>
                                strtoupper(
                                    mb_substr(
                                        $word,
                                        0,
                                        1
                                    )
                                )
                        )
                        ->implode('');

                    @endphp

                    {{ $initials ?: 'U' }}

                </div>


                <div class="user-info">

                    <div class="user-name">

                        {{ $userName }}

                    </div>


                    <div class="user-email">

                        {{ session('auth_user_email', '') }}

                    </div>

                </div>

            </div>


        </div>


    </aside>


    <!-- ==================================================
         MAIN
    ================================================== -->

    <main class="main">


        <!-- ==================================================
             TOPBAR
        ================================================== -->

        <header class="topbar">


            <button
                type="button"
                class="mobile-menu"
                id="mobile-menu"
                aria-label="Open navigation"
            >
                ☰
            </button>


            <div class="page-heading">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Your workspace at a glance.
                </p>

            </div>


            <div class="top-actions">


                <a
                    href="#"
                    class="top-button desktop-action"
                >
                    + Add customer
                </a>


                <a
                    href="#"
                    class="top-button primary"
                >
                    + New lead
                </a>
                
                  <form
        action="{{ route('logout') }}"
        method="POST"
        style="display: inline;"
    >
        @csrf

        <button
            type="submit"
            class="top-button"
        >
            Logout
        </button>
    </form>


            </div>


        </header>


        <!-- ==================================================
             CONTENT
        ================================================== -->

        <div class="content">


            <!-- ==================================================
                 WELCOME
            ================================================== -->

            <section class="welcome">


                <span class="welcome-label">
                    Overview
                </span>


                <h2>

                    Good to see you
                    {{ session('auth_user_name', 'there') }}.

                </h2>


                <p>

                    Here's what's happening across
                    your Almantic workspace today.

                </p>


            </section>


            <!-- ==================================================
                 STATS
            ================================================== -->

            <section class="stats">


                <article class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Customers
                        </span>

                        <span class="stat-icon">
                            ◉
                        </span>

                    </div>


                    <div class="stat-number">
                        128
                    </div>


                    <div class="stat-change positive">
                        ↑ 12% this month
                    </div>

                </article>


                <article class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Active leads
                        </span>

                        <span class="stat-icon">
                            ◇
                        </span>

                    </div>


                    <div class="stat-number">
                        34
                    </div>


                    <div class="stat-change positive">
                        ↑ 8% this month
                    </div>

                </article>


                <article class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Open tasks
                        </span>

                        <span class="stat-icon">
                            ✓
                        </span>

                    </div>


                    <div class="stat-number">
                        17
                    </div>


                    <div class="stat-change">
                        5 due today
                    </div>

                </article>


                <article class="stat-card">

                    <div class="stat-top">

                        <span class="stat-label">
                            Projects
                        </span>

                        <span class="stat-icon">
                            □
                        </span>

                    </div>


                    <div class="stat-number">
                        9
                    </div>


                    <div class="stat-change positive">
                        3 active
                    </div>

                </article>


            </section>


            <!-- ==================================================
                 DASHBOARD GRID
            ================================================== -->

            <div class="dashboard-grid">


                <!-- ==================================================
                     RECENT CUSTOMERS
                ================================================== -->

                <section class="panel">


                    <div class="panel-header">

                        <span class="panel-title">
                            Recent customers
                        </span>


                        <a
                            href="#"
                            class="panel-link"
                        >
                            View all
                        </a>

                    </div>


                    <div class="table-wrap">


                        <table class="table">


                            <thead>

                                <tr>

                                    <th>
                                        Customer
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Added
                                    </th>

                                    <th>
                                        Value
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                <tr>

                                    <td>

                                        <div class="customer">

                                            <div class="customer-avatar">
                                                AR
                                            </div>

                                            <div>

                                                <div class="customer-name">
                                                    Acme Retail
                                                </div>

                                                <div class="customer-email">
                                                    hello@acmeretail.com
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge badge-green">
                                            Active
                                        </span>

                                    </td>


                                    <td>
                                        Today
                                    </td>


                                    <td>
                                        $8,400
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <div class="customer">

                                            <div class="customer-avatar">
                                                NP
                                            </div>

                                            <div>

                                                <div class="customer-name">
                                                    Nova Products
                                                </div>

                                                <div class="customer-email">
                                                    team@novaproducts.com
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge badge-yellow">
                                            Follow up
                                        </span>

                                    </td>


                                    <td>
                                        Yesterday
                                    </td>


                                    <td>
                                        $5,200
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <div class="customer">

                                            <div class="customer-avatar">
                                                BT
                                            </div>

                                            <div>

                                                <div class="customer-name">
                                                    Bright Tech
                                                </div>

                                                <div class="customer-email">
                                                    contact@brighttech.io
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge badge-green">
                                            Active
                                        </span>

                                    </td>


                                    <td>
                                        2 days ago
                                    </td>


                                    <td>
                                        $12,700
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <div class="customer">

                                            <div class="customer-avatar">
                                                GS
                                            </div>

                                            <div>

                                                <div class="customer-name">
                                                    Green Studio
                                                </div>

                                                <div class="customer-email">
                                                    hello@greenstudio.co
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="badge badge-yellow">
                                            Follow up
                                        </span>

                                    </td>


                                    <td>
                                        3 days ago
                                    </td>


                                    <td>
                                        $3,900
                                    </td>

                                </tr>


                            </tbody>


                        </table>


                    </div>


                </section>


                <!-- ==================================================
                     RIGHT COLUMN
                ================================================== -->

                <div style="display:grid; gap:18px;">


                    <!-- QUICK ACTIONS -->

                    <section class="panel">


                        <div class="panel-header">

                            <span class="panel-title">
                                Quick actions
                            </span>

                        </div>


                        <div class="quick-actions">


                            <a
                                href="#"
                                class="quick-action"
                            >

                                <span class="quick-icon">
                                    +
                                </span>

                                <strong>
                                    Add customer
                                </strong>

                                <span>
                                    Create a new customer record.
                                </span>

                            </a>


                            <a
                                href="#"
                                class="quick-action"
                            >

                                <span class="quick-icon">
                                    ◇
                                </span>

                                <strong>
                                    Add lead
                                </strong>

                                <span>
                                    Track a new opportunity.
                                </span>

                            </a>


                            <a
                                href="#"
                                class="quick-action"
                            >

                                <span class="quick-icon">
                                    ✓
                                </span>

                                <strong>
                                    Create task
                                </strong>

                                <span>
                                    Add something to your workflow.
                                </span>

                            </a>


                            <a
                                href="#"
                                class="quick-action"
                            >

                                <span class="quick-icon">
                                    ♧
                                </span>

                                <strong>
                                    Invite member
                                </strong>

                                <span>
                                    Grow your workspace team.
                                </span>

                            </a>


                        </div>


                    </section>


                    <!-- ACTIVITY -->

                    <section class="panel">


                        <div class="panel-header">

                            <span class="panel-title">
                                Recent activity
                            </span>


                            <a
                                href="#"
                                class="panel-link"
                            >
                                View all
                            </a>

                        </div>


                        <div class="activity">


                            <div class="activity-item">

                                <span class="activity-dot"></span>

                                <div class="activity-text">

                                    <strong>
                                        Acme Retail
                                    </strong>
                                    was added as a customer.

                                    <div class="activity-time">
                                        12 minutes ago
                                    </div>

                                </div>

                            </div>


                            <div class="activity-item">

                                <span class="activity-dot"></span>

                                <div class="activity-text">

                                    New lead
                                    <strong>
                                        Bright Tech
                                    </strong>
                                    was created.

                                    <div class="activity-time">
                                        1 hour ago
                                    </div>

                                </div>

                            </div>


                            <div class="activity-item">

                                <span class="activity-dot"></span>

                                <div class="activity-text">

                                    Task
                                    <strong>
                                        Follow up with Nova Products
                                    </strong>
                                    was completed.

                                    <div class="activity-time">
                                        3 hours ago
                                    </div>

                                </div>

                            </div>


                        </div>


                    </section>


                </div>


            </div>


        </div>


    </main>


</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | Mobile Sidebar
    |--------------------------------------------------------------------------
    */

    const sidebar =
        document.getElementById(
            'sidebar'
        );


    const mobileMenu =
        document.getElementById(
            'mobile-menu'
        );


    const overlay =
        document.getElementById(
            'sidebar-overlay'
        );


    function openSidebar() {

        sidebar.classList.add(
            'open'
        );

        overlay.classList.add(
            'open'
        );

    }


    function closeSidebar() {

        sidebar.classList.remove(
            'open'
        );

        overlay.classList.remove(
            'open'
        );

    }


    mobileMenu.addEventListener(
        'click',
        openSidebar
    );


    overlay.addEventListener(
        'click',
        closeSidebar
    );


    /*
    |--------------------------------------------------------------------------
    | Close Sidebar When Navigation Item Is Clicked
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.nav-item')
        .forEach(
            function (item) {

                item.addEventListener(
                    'click',
                    function () {

                        if (
                            window.innerWidth <= 760
                        ) {

                            closeSidebar();

                        }

                    }
                );

            }
        );


    /*
    |--------------------------------------------------------------------------
    | Close Sidebar On Resize
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
        'resize',
        function () {

            if (
                window.innerWidth > 760
            ) {

                closeSidebar();

            }

        }
    );

</script>


</body>

</html>