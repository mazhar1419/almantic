<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Almantic is a free, open-source CRM for individuals and teams. Manage contacts, leads, deals and relationships in one place.">

    <meta name="theme-color" content="#659287">
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">

    <title>Almantic — Simple CRM for People & Teams</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<header class="header">
    <div class="container nav">

        <a href="/" class="logo" aria-label="Almantic home">
            <img
                class="logo-mark"
                src="{{ asset('images/almantic-mark.png') }}"
                alt=""
                aria-hidden="true"
            >
            <span>Almantic</span>
        </a>

        <button
            class="mobile-menu"
            type="button"
            aria-label="Open navigation"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav-links">

            <a href="#features">Features</a>
            <a href="#how-it-works">How it works</a>
            <a href="#security">Security</a>
            <a href="#open-source">Open source</a>

            <a href="/login" class="login-link">
                Login
            </a>

            <a href="/register" class="button button-small">
                Get started
            </a>

        </nav>

    </div>
</header>


<main>

    <!-- HERO -->

    <section class="hero">

        <div class="container hero-grid">

            <div class="hero-content">

                <div class="mini-badge">
                    <span class="badge-dot"></span>
                    Free & Open Source
                </div>

                <h1>
                    Manage customers.
                    <span>Grow together.</span>
                </h1>

                <p class="hero-description">
                    A simple, powerful CRM for people and teams.
                    Keep your contacts, leads, deals and relationships
                    organized — all in one place.
                </p>

                <div class="hero-actions">

                    <a href="/register" class="button button-primary">
                        Get started today
                        <span>→</span>
                    </a>

                    <a href="#features" class="button button-white">
                        Explore features
                    </a>

                </div>

                <div class="hero-meta">

                    <span>
                        ✓ Free forever
                    </span>

                    <span>
                        ✓ Open source
                    </span>

                    <span>
                        ✓ Self-host friendly
                    </span>

                </div>

            </div>


            <!-- HERO ILLUSTRATION -->

            <div class="hero-art">

                <div class="art-sun"></div>

                <div class="art-title">
                    <span>ALMANTIC</span>
                    <small>simple • smart • together</small>
                </div>

                <div class="person person-one">
                    <div class="head"></div>
                    <div class="body"></div>
                    <div class="arm arm-left"></div>
                    <div class="arm arm-right"></div>
                </div>

                <div class="person person-two">
                    <div class="head"></div>
                    <div class="body"></div>
                    <div class="arm arm-left"></div>
                    <div class="arm arm-right"></div>
                </div>

                <div class="person person-three">
                    <div class="head"></div>
                    <div class="body"></div>
                    <div class="arm arm-left"></div>
                    <div class="arm arm-right"></div>
                </div>

                <div class="speech speech-one">
                    <span>Hi!</span>
                </div>

                <div class="speech speech-two">
                    <span>Let's grow!</span>
                </div>

                <div class="art-star star-one">✦</div>
                <div class="art-star star-two">✦</div>
                <div class="art-star star-three">+</div>

            </div>

        </div>

    </section>


    <!-- TRUST -->

    <section class="trust">

        <div class="container">

            <p class="trust-title">
                BUILT FOR PEOPLE WHO VALUE RELATIONSHIPS
            </p>

            <div class="trust-list">

                <span>● Acme</span>
                <span>✦ Northstar</span>
                <span>◯ Vertex</span>
                <span>◆ Orbit</span>
                <span>▲ Craft</span>
                <span>✚ Studio</span>

            </div>

        </div>

    </section>


    <!-- INTRO -->

    <section class="intro section">

        <div class="container intro-grid">

            <div>

                <div class="section-number">
                    01 / WHY ALMANTIC
                </div>

                <h2>
                    Customer relationships
                    shouldn't be complicated.
                </h2>

            </div>

            <div class="intro-copy">

                <p>
                    Almantic gives you the tools you actually need
                    to understand customers, manage opportunities
                    and keep your team moving.
                </p>

                <p>
                    No unnecessary complexity. No locked-in ecosystem.
                    Just a clean CRM built around your work.
                </p>

                <a href="#features" class="text-link">
                    See what you can do →
                </a>

            </div>

        </div>

    </section>


    <!-- FEATURES -->

    <section class="features section" id="features">

        <div class="container">

            <div class="section-heading">

                <div>

                    <div class="section-number">
                        02 / FEATURES
                    </div>

                    <h2>
                        Everything your
                        team needs.
                    </h2>

                </div>

                <p>
                    Simple tools that help you turn conversations
                    into relationships and relationships into growth.
                </p>

            </div>


            <div class="feature-grid">

                <!-- CARD 1 -->

                <article class="feature-card yellow">

                    <div class="feature-top">
                        <span>01</span>
                        <span class="feature-symbol">◎</span>
                    </div>

                    <h3>
                        Contacts
                        & companies
                    </h3>

                    <p>
                        Keep every customer and organization
                        organized in one clean place.
                    </p>

                    <div class="contact-art">

                        <div class="contact-card">
                            <div class="contact-avatar">JD</div>
                            <div>
                                <strong>John Doe</strong>
                                <small>Acme Inc.</small>
                            </div>
                        </div>

                        <div class="contact-card second">
                            <div class="contact-avatar pink">AS</div>
                            <div>
                                <strong>Anna Smith</strong>
                                <small>Northstar</small>
                            </div>
                        </div>

                    </div>

                </article>


                <!-- CARD 2 -->

                <article class="feature-card pink">

                    <div class="feature-top">
                        <span>02</span>
                        <span class="feature-symbol">↗</span>
                    </div>

                    <h3>
                        Leads
                        & deals
                    </h3>

                    <p>
                        Know where every opportunity stands
                        and what should happen next.
                    </p>

                    <div class="pipeline">

                        <div class="pipeline-column">
                            <small>NEW</small>
                            <b>08</b>
                        </div>

                        <div class="pipeline-column">
                            <small>CONTACTED</small>
                            <b>14</b>
                        </div>

                        <div class="pipeline-column">
                            <small>WON</small>
                            <b>06</b>
                        </div>

                    </div>

                </article>


                <!-- CARD 3 -->

                <article class="feature-card blue">

                    <div class="feature-top">
                        <span>03</span>
                        <span class="feature-symbol">✓</span>
                    </div>

                    <h3>
                        Tasks
                        & activities
                    </h3>

                    <p>
                        Never lose track of follow-ups,
                        meetings or important actions.
                    </p>

                    <div class="task-list">

                        <div>
                            <span class="check">✓</span>
                            Follow up with Acme
                        </div>

                        <div>
                            <span class="check">✓</span>
                            Send proposal
                        </div>

                        <div>
                            <span class="check">✓</span>
                            Schedule demo
                        </div>

                    </div>

                </article>


                <!-- CARD 4 -->

                <article class="feature-card white">

                    <div class="feature-top">
                        <span>04</span>
                        <span class="feature-symbol">#</span>
                    </div>

                    <h3>
                        Notes
                        & context
                    </h3>

                    <p>
                        Keep conversations, notes and useful
                        customer context together.
                    </p>

                    <div class="note-art">

                        <div class="note note-yellow">
                            Call next Monday
                        </div>

                        <div class="note note-pink">
                            Interested in Pro
                        </div>

                        <div class="note note-blue">
                            Follow up
                        </div>

                    </div>

                </article>


                <!-- CARD 5 -->

                <article class="feature-card black">

                    <div class="feature-top">
                        <span>05</span>
                        <span class="feature-symbol">+</span>
                    </div>

                    <h3>
                        Team workspace
                    </h3>

                    <p>
                        Create a company workspace, invite members
                        and work together with clear permissions.
                    </p>

                    <div class="avatars">

                        <span>M</span>
                        <span>A</span>
                        <span>J</span>
                        <span>S</span>
                        <span>+</span>

                    </div>

                </article>


                <!-- CARD 6 -->

                <article class="feature-card orange">

                    <div class="feature-top">
                        <span>06</span>
                        <span class="feature-symbol">↺</span>
                    </div>

                    <h3>
                        Built to grow
                    </h3>

                    <p>
                        Start alone. Add your team later.
                        Your workspace grows with you.
                    </p>

                    <div class="growth-line">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </article>

            </div>

        </div>

    </section>


    <!-- HOW IT WORKS -->

    <section class="how section" id="how-it-works">

        <div class="container">

            <div class="section-number">
                03 / HOW IT WORKS
            </div>

            <div class="how-grid">

                <div class="how-heading">

                    <h2>
                        Start simple.
                        Build from there.
                    </h2>

                    <p>
                        Whether you're managing your own customers
                        or running a growing team, Almantic starts
                        exactly where you are.
                    </p>

                </div>


                <div class="steps">

                    <div class="step">

                        <span class="step-number">
                            01
                        </span>

                        <div>
                            <h3>Create your account</h3>

                            <p>
                                Sign up and create your personal
                                or company workspace.
                            </p>
                        </div>

                    </div>


                    <div class="step">

                        <span class="step-number">
                            02
                        </span>

                        <div>
                            <h3>Add your customers</h3>

                            <p>
                                Bring your contacts and organizations
                                into one organized workspace.
                            </p>
                        </div>

                    </div>


                    <div class="step">

                        <span class="step-number">
                            03
                        </span>

                        <div>
                            <h3>Invite your team</h3>

                            <p>
                                Add trusted members and collaborate
                                with role-based access.
                            </p>
                        </div>

                    </div>


                    <div class="step">

                        <span class="step-number">
                            04
                        </span>

                        <div>
                            <h3>Grow your relationships</h3>

                            <p>
                                Manage leads, deals, tasks and
                                customer activities from one place.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- SECURITY -->

    <section class="security section" id="security">

        <div class="container security-box">

            <div class="security-content">

                <div class="section-number">
                    04 / SECURITY
                </div>

                <h2>
                    Your data
                    stays yours.
                </h2>

                <p>
                    Almantic is designed from the ground up with
                    workspace isolation, secure authentication,
                    controlled access and defensive application
                    practices.
                </p>

                <a href="/register" class="button button-yellow">
                    Create your workspace →
                </a>

            </div>


            <div class="security-points">

                <div class="security-point">

                    <span>01</span>

                    <div>
                        <h3>Multi-tenant isolation</h3>

                        <p>
                            Workspace boundaries are enforced
                            throughout the application.
                        </p>
                    </div>

                </div>


                <div class="security-point">

                    <span>02</span>

                    <div>
                        <h3>Secure authentication</h3>

                        <p>
                            Custom authentication with verification,
                            sessions and abuse protection.
                        </p>
                    </div>

                </div>


                <div class="security-point">

                    <span>03</span>

                    <div>
                        <h3>Safe file handling</h3>

                        <p>
                            Uploaded files are validated,
                            resized and optimized.
                        </p>
                    </div>

                </div>


                <div class="security-point">

                    <span>04</span>

                    <div>
                        <h3>Spam protection</h3>

                        <p>
                            Verification, rate limiting and
                            invitation controls help prevent abuse.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- PERSONAL / TEAM -->

    <section class="use-case section">

        <div class="container">

            <div class="section-number">
                05 / MADE FOR YOU
            </div>

            <div class="use-grid">

                <article class="use-card">

                    <span class="use-label">
                        PERSONAL
                    </span>

                    <h2>
                        Your own
                        CRM.
                    </h2>

                    <p>
                        Organize personal customers, contacts,
                        opportunities and follow-ups in a private
                        workspace.
                    </p>

                    <a href="/register" class="arrow-link">
                        Start personally →
                    </a>

                </article>


                <article class="use-card yellow-card">

                    <span class="use-label">
                        COMPANY / TEAM
                    </span>

                    <h2>
                        Grow
                        together.
                    </h2>

                    <p>
                        Create a company workspace, invite members,
                        assign roles and give your team one shared
                        source of truth.
                    </p>

                    <a href="/register" class="arrow-link">
                        Build your team →
                    </a>

                    <div class="team-illustration">

                        <span>✦</span>
                        <span>◎</span>
                        <span>+</span>
                        <span>✓</span>

                    </div>

                </article>

            </div>

        </div>

    </section>


    <!-- OPEN SOURCE -->

    <section class="open-source section" id="open-source">

        <div class="container open-source-box">

            <div>

                <div class="section-number">
                    06 / OPEN SOURCE
                </div>

                <h2>
                    Built in the open.
                </h2>

                <p>
                    Almantic is free and open source.
                    Inspect the code, self-host it, learn from it,
                    and make it your own.
                </p>

            </div>

            <a href="#" class="button button-white">
                View on GitHub →
            </a>

        </div>

    </section>


    <!-- FINAL CTA -->

    <section class="final-cta section">

        <div class="container">

            <div class="cta">

                <div class="cta-decoration">
                    FREE
                </div>

                <div class="section-number">
                    07 / GET STARTED
                </div>

                <h2>
                    Ready to
                    get organized?
                </h2>

                <p>
                    Start with yourself. Add your team when
                    you're ready.
                </p>

                <div class="cta-actions">

                    <a href="/register" class="button button-black">
                        Create free account →
                    </a>

                    <a href="/login" class="button button-white">
                        Already have an account?
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>


<!-- FOOTER -->

<footer class="footer">

    <div class="container footer-main">

        <div class="footer-brand">

            <a href="/" class="logo logo-footer" aria-label="Almantic home">
                <img
                    class="logo-mark"
                    src="{{ asset('images/almantic-mark.png') }}"
                    alt=""
                    aria-hidden="true"
                >
                <span>Almantic</span>
            </a>

            <p>
                Simple CRM.
                Open source.
                Built for people.
            </p>

        </div>


        <div class="footer-column">

            <strong>Product</strong>

            <a href="#features">Features</a>
            <a href="#security">Security</a>
            <a href="#how-it-works">How it works</a>

        </div>


        <div class="footer-column">

            <strong>Resources</strong>

            <a href="#">GitHub</a>
            <a href="#">Documentation</a>
            <a href="#">Roadmap</a>

        </div>


        <div class="footer-column">

            <strong>Account</strong>

            <a href="/login">Login</a>
            <a href="/register">Register</a>

        </div>

    </div>


    <div class="container footer-bottom">

        <span>
            © {{ date('Y') }} Almantic
        </span>

        <span>
            Open source · Built with Laravel
        </span>

    </div>

</footer>


<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>