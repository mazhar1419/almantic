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
        Verify your Almantic account
    </title>

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

                        <table
                            width="100%"
                            cellpadding="0"
                            cellspacing="0"
                            border="0"
                            role="presentation"
                        >

                            <tr>

                                <td>

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

                        </table>

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
                            Account verification
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
                            Verify your<br>
                            email address.
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
                            Welcome to Almantic. Please verify your
                            email address to activate your account
                            and continue using Almantic.
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
                                        href="{{ $verificationUrl }}"
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
                                        Verify my email
                                    </a>

                                </td>

                            </tr>

                        </table>


                        <!-- EXPIRATION -->

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

                                        ⏱ This verification link
                                        expires at

                                        <strong>
                                            {{ $expiresAt->format('Y-m-d H:i') }}
                                        </strong>.

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

                            If you did not create an Almantic
                            account, you can safely ignore this
                            email.

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
                            Please do not reply directly to this
                            message.
                        </p>

                    </td>

                </tr>


            </table>


        </td>

    </tr>

</table>


</body>

</html>