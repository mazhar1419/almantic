<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >

    <title>
        Reset your Almantic password
    </title>
 <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">
</head>


<body
    style="
        margin:0;
        padding:0;
        width:100%;
        background:#FAFCF8;
        color:#111111;
        font-family:Arial,Helvetica,sans-serif;
    "
>


<table
    width="100%"
    cellpadding="0"
    cellspacing="0"
    border="0"
    role="presentation"
    style="
        width:100%;
        background:#FAFCF8;
        margin:0;
        padding:40px 15px;
    "
>

    <tr>

        <td
            align="center"
            valign="top"
        >


            <!-- ==================================================
                 MAIN CARD
            ================================================== -->

            <table
                width="100%"
                cellpadding="0"
                cellspacing="0"
                border="0"
                role="presentation"
                style="
                    width:100%;
                    max-width:600px;
                    background:#FFFFFF;
                    border:3px solid #111111;
                    box-shadow:7px 7px 0 #111111;
                "
            >


                <!-- ==================================================
                     HEADER
                ================================================== -->

                <tr>

                    <td
                        style="
                            padding:28px 30px;
                            background:#659287;
                            border-bottom:3px solid #111111;
                        "
                    >

                        <div
                            style="
                                font-size:25px;
                                line-height:1;
                                font-weight:900;
                                letter-spacing:-1.5px;
                                color:#111111;
                            "
                        >
                            Almantic
                        </div>

                    </td>

                </tr>


                <!-- ==================================================
                     CONTENT
                ================================================== -->

                <tr>

                    <td
                        style="
                            padding:42px 30px;
                        "
                    >


                        <!-- LABEL -->

                        <div
                            style="
                                display:inline-block;
                                padding:7px 10px;
                                border:2px solid #111111;
                                background:#B2D8C2;
                                font-size:10px;
                                line-height:1;
                                font-weight:900;
                                letter-spacing:1px;
                                text-transform:uppercase;
                                color:#111111;
                            "
                        >
                            Account security
                        </div>


                        <!-- TITLE -->

                        <h1
                            style="
                                margin:24px 0 16px;
                                padding:0;
                                font-size:40px;
                                line-height:1;
                                letter-spacing:-2px;
                                font-weight:900;
                                color:#111111;
                            "
                        >
                            Reset your<br>
                            password.
                        </h1>


                        <!-- GREETING -->

                        <p
                            style="
                                margin:0 0 18px;
                                padding:0;
                                font-size:14px;
                                line-height:1.7;
                                color:#111111;
                            "
                        >
                            Hello
                            <strong>
                                {{ $user->name }}
                            </strong>,
                        </p>


                        <!-- DESCRIPTION -->

                        <p
                            style="
                                margin:0 0 25px;
                                padding:0;
                                font-size:14px;
                                line-height:1.7;
                                color:#64706B;
                            "
                        >
                            We received a request to reset the
                            password for your Almantic account.
                            Use the button below to create a new
                            password.
                        </p>


                        <!-- ==================================================
                             CTA
                        ================================================== -->

                        <table
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            role="presentation"
                            style="
                                margin:0 0 28px;
                            "
                        >

                            <tr>

                                <td
                                    align="center"
                                    style="
                                        border:3px solid #111111;
                                        background:#659287;
                                    "
                                >

                                    <a
                                        href="{{ $resetUrl }}"
                                        target="_blank"
                                        style="
                                            display:inline-block;
                                            padding:16px 24px;
                                            color:#FFFFFF;
                                            background:#659287;
                                            text-decoration:none;
                                            font-size:13px;
                                            line-height:1;
                                            font-weight:900;
                                        "
                                    >
                                        Reset my password
                                    </a>

                                </td>

                            </tr>

                        </table>


                        <!-- ==================================================
                             EXPIRATION
                        ================================================== -->

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            role="presentation"
                            style="
                                margin-bottom:25px;
                                border:2px solid #111111;
                                background:#E8F5E9;
                            "
                        >

                            <tr>

                                <td
                                    style="
                                        padding:14px;
                                    "
                                >

                                    <p
                                        style="
                                            margin:0;
                                            padding:0;
                                            font-size:11px;
                                            line-height:1.6;
                                            font-weight:700;
                                            color:#111111;
                                        "
                                    >

                                        ⏱ This reset link expires
                                        at

                                        <strong>
                                            {{ $expiresAt->format('Y-m-d H:i') }}
                                        </strong>.

                                    </p>

                                </td>

                            </tr>

                        </table>


                        <!-- ==================================================
                             SECURITY WARNING
                        ================================================== -->

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            role="presentation"
                            style="
                                margin-bottom:20px;
                                border:2px solid #111111;
                                background:#FFF8E8;
                            "
                        >

                            <tr>

                                <td
                                    style="
                                        padding:14px;
                                    "
                                >

                                    <p
                                        style="
                                            margin:0;
                                            padding:0;
                                            font-size:11px;
                                            line-height:1.7;
                                            font-weight:700;
                                            color:#111111;
                                        "
                                    >

                                        🔐 If you did not request
                                        a password reset, no action
                                        is required. Your password
                                        will remain unchanged.

                                    </p>

                                </td>

                            </tr>

                        </table>


                        <!-- SECURITY NOTE -->

                        <p
                            style="
                                margin:0;
                                padding:0;
                                font-size:11px;
                                line-height:1.7;
                                color:#64706B;
                            "
                        >

                            For your security, never share this
                            password reset link with anyone.

                        </p>


                    </td>

                </tr>


                <!-- ==================================================
                     FOOTER
                ================================================== -->

                <tr>

                    <td
                        style="
                            padding:22px 30px;
                            border-top:3px solid #111111;
                            background:#E8F5E9;
                        "
                    >

                        <p
                            style="
                                margin:0 0 7px;
                                padding:0;
                                font-size:10px;
                                line-height:1.5;
                                font-weight:900;
                                color:#111111;
                            "
                        >
                            ALMANTIC
                        </p>


                        <p
                            style="
                                margin:0;
                                padding:0;
                                font-size:10px;
                                line-height:1.6;
                                color:#64706B;
                            "
                        >
                            This is an automated account security
                            email from Almantic.
                        </p>


                        <p
                            style="
                                margin:8px 0 0;
                                padding:0;
                                font-size:10px;
                                line-height:1.6;
                                color:#64706B;
                            "
                        >
                            If you need help, contact
                            {{ env('MAIL_CONTACT_ADDRESS', 'hello@almantic.xyz') }}.
                        </p>

                    </td>

                </tr>


            </table>


        </td>

    </tr>

</table>


</body>

</html>