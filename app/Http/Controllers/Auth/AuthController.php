<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration Page
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        return view('auth.register');
    }


    /*
    |--------------------------------------------------------------------------
    | Register User
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CSRF
        |--------------------------------------------------------------------------
        */

        if (
            !hash_equals(
                (string) $request->session()->token(),
                (string) $request->input('_token')
            )
        ) {
            return back()->withErrors([
                'form' => 'Invalid request.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Registration Rate Limit
        |--------------------------------------------------------------------------
        */

        $ip = $request->ip();

        $emailInput = strtolower(
            trim(
                (string) $request->input('email')
            )
        );


        if (
            !$this->checkRateLimit(
                'register_ip',
                $ip,
                5,
                60
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'form' =>
                        'Too many registration attempts. Please try again later.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Input
        |--------------------------------------------------------------------------
        */

        $name = trim(
            (string) $request->input('name')
        );

        $email = $emailInput;

        $password = (string) $request->input(
            'password'
        );

        $passwordConfirmation = (string)
            $request->input(
                'password_confirmation'
            );


        /*
        |--------------------------------------------------------------------------
        | Name Validation
        |--------------------------------------------------------------------------
        */

        if (
            $name === '' ||
            mb_strlen($name) > 120
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' =>
                        'Please enter a valid name.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email Validation
        |--------------------------------------------------------------------------
        */

        if (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            ) ||
            mb_strlen($email) > 254
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' =>
                        'Please enter a valid email address.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email Security Validation
        |--------------------------------------------------------------------------
        */

        $emailValidation =
            $this->validateRegistrationEmail(
                $email
            );


        if (
            !$emailValidation['valid']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' =>
                        $emailValidation['message'],
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Validation
        |--------------------------------------------------------------------------
        */

        if (
            strlen($password) < 12
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' =>
                        'Password must be at least 12 characters.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Confirmation
        |--------------------------------------------------------------------------
        */

        if (
            !hash_equals(
                $password,
                $passwordConfirmation
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'password_confirmation' =>
                        'Passwords do not match.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Strength
        |--------------------------------------------------------------------------
        */

        if (
            !$this->isStrongPassword(
                $password
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'password' =>
                        'Password must contain uppercase, lowercase, number and special character.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email Specific Rate Limit
        |--------------------------------------------------------------------------
        */

        if (
            !$this->checkRateLimit(
                'register_email',
                $email,
                3,
                3600
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'form' =>
                        'Too many registration attempts for this email. Please try again later.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Check Existing Email
        |--------------------------------------------------------------------------
        */

        $existingUser = DB::table('users')
            ->where('email', $email)
            ->first();


        if ($existingUser) {

            /*
            |--------------------------------------------------------------------------
            | Don't Reveal Account Details
            |--------------------------------------------------------------------------
            */

            return back()
                ->withInput()
                ->withErrors([
                    'email' =>
                        'Unable to create the account with these details.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */

        $now = now();

        $uuid = (string) Str::uuid();

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        try {

            /*
            |--------------------------------------------------------------------------
            | Database Transaction
            |--------------------------------------------------------------------------
            */

            $userId = DB::transaction(
                function () use (
                    $uuid,
                    $name,
                    $email,
                    $passwordHash,
                    $now
                ) {

                    /*
                    |--------------------------------------------------------------------------
                    | Insert User
                    |--------------------------------------------------------------------------
                    */

                    $userId = DB::table(
                        'users'
                    )->insertGetId([

                        'uuid' =>
                            $uuid,

                        'name' =>
                            $name,

                        'email' =>
                            $email,

                        'password_hash' =>
                            $passwordHash,

                        'status' =>
                            'pending',

                        'email_verified_at' =>
                            null,

                        'last_login_at' =>
                            null,

                        'created_at' =>
                            $now,

                        'updated_at' =>
                            $now,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Generate Verification Token
                    |--------------------------------------------------------------------------
                    */

                    $rawToken = bin2hex(
                        random_bytes(32)
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Hash Token
                    |--------------------------------------------------------------------------
                    */

                    $tokenHash = hash(
                        'sha256',
                        $rawToken
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Create Verification Record
                    |--------------------------------------------------------------------------
                    */

                    DB::table(
                        'email_verifications'
                    )->insert([

                        'user_id' =>
                            $userId,

                        'token_hash' =>
                            $tokenHash,

                        'expires_at' =>
                            $now
                                ->copy()
                                ->addHour(),

                        'used_at' =>
                            null,

                        'created_at' =>
                            $now,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Store Token Temporarily For Email
                    |--------------------------------------------------------------------------
                    */

                    session()->put(
                        'registration_verification_token',
                        $rawToken
                    );


                    return $userId;
                }
            );


            /*
            |--------------------------------------------------------------------------
            | Fetch Created User
            |--------------------------------------------------------------------------
            */

            $user = DB::table('users')
                ->where(
                    'id',
                    $userId
                )
                ->first();


            /*
            |--------------------------------------------------------------------------
            | Get Verification Token
            |--------------------------------------------------------------------------
            */

            $verificationToken =
                session()->pull(
                    'registration_verification_token'
                );


            if (
                !$user ||
                !$verificationToken
            ) {
                throw new \RuntimeException(
                    'Unable to create verification token.'
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Verification URL
            |--------------------------------------------------------------------------
            */

            $verificationUrl = route(
                'verification.verify',
                [
                    'token' =>
                        $verificationToken,
                ]
            );


            /*
            |--------------------------------------------------------------------------
            | Send Verification Email
            |--------------------------------------------------------------------------
            */

            Mail::send(
                'emails.auth.verify-email',
                [
                    'user' =>
                        $user,

                    'verificationUrl' =>
                        $verificationUrl,

                    'expiresAt' =>
                        $now
                            ->copy()
                            ->addHour(),
                ],
                function ($message) use ($user) {

                    $message->to(
                        $user->email,
                        $user->name
                    );

                    $message->replyTo(
                        env(
                            'MAIL_REPLY_TO_ADDRESS'
                        ),
                        env(
                            'MAIL_REPLY_TO_NAME'
                        )
                    );

                    $message->subject(
                        'Verify your Almantic account'
                    );
                }
            );


            /*
            |--------------------------------------------------------------------------
            | Registration Complete
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'login'
                )
                ->with(
                    'status',
                    'Your account has been created. Please check your email to verify your account.'
                );


        } catch (Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | Log Error
            |--------------------------------------------------------------------------
            */

            report($e);


            return back()
                ->withInput()
                ->withErrors([
                    'form' =>
                        'We could not complete your registration. Please try again later.',
                ]);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Login Page
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Login User
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Login Rate Limit - IP
        |--------------------------------------------------------------------------
        */

        $ip = $request->ip();


        if (
            !$this->checkRateLimit(
                'login_ip',
                $ip,
                10,
                900
            )
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Too many login attempts. Please try again later.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Input
        |--------------------------------------------------------------------------
        */

        $email = strtolower(
            trim(
                (string) $request->input('email')
            )
        );

        $password = (string) $request->input(
            'password'
        );


        /*
        |--------------------------------------------------------------------------
        | Email Validation
        |--------------------------------------------------------------------------
        */

        if (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            )
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Invalid email or password.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email Based Rate Limit
        |--------------------------------------------------------------------------
        */

        if (
            !$this->checkRateLimit(
                'login_email',
                $email,
                5,
                900
            )
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Too many login attempts. Please try again later.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Find User
        |--------------------------------------------------------------------------
        */

        $user = DB::table('users')
            ->where(
                'email',
                $email
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Generic Authentication Error
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Invalid email or password.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Verification
        |--------------------------------------------------------------------------
        */

        if (
            !password_verify(
                $password,
                $user->password_hash
            )
        ) {

            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Invalid email or password.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Account Status
        |--------------------------------------------------------------------------
        */

        if (
            $user->status === 'pending'
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'Please verify your email before signing in.',
                ]);
        }


        if (
            $user->status === 'suspended'
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'This account has been suspended.',
                ]);
        }


        if (
            $user->status === 'disabled'
        ) {
            return back()
                ->withInput(
                    $request->only('email')
                )
                ->withErrors([
                    'login' =>
                        'This account is currently disabled.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Session Regeneration
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | Custom Authentication Session
        |--------------------------------------------------------------------------
        */

        $request->session()->put(
            'auth_user_id',
            $user->id
        );


        $request->session()->put(
            'auth_user_uuid',
            $user->uuid
        );


        $request->session()->put(
            'authenticated_at',
            now()->timestamp
        );


        /*
        |--------------------------------------------------------------------------
        | Update Last Login
        |--------------------------------------------------------------------------
        */

        DB::table('users')
            ->where(
                'id',
                $user->id
            )
            ->update([
                'last_login_at' =>
                    now(),

                'updated_at' =>
                    now(),
            ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'dashboard'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Forgot Password Page
    |--------------------------------------------------------------------------
    */

    public function showForgotPassword()
    {
        return view(
            'auth.forgot-password'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Send Password Reset Link
    |--------------------------------------------------------------------------
    */

    public function sendPasswordReset(
        Request $request
    ) {
        /*
        |--------------------------------------------------------------------------
        | Rate Limit
        |--------------------------------------------------------------------------
        */

        $ip = $request->ip();


        if (
            !$this->checkRateLimit(
                'password_reset_ip',
                $ip,
                5,
                900
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' =>
                        'Too many requests. Please try again later.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        $email = strtolower(
            trim(
                (string) $request->input('email')
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Validate Email
        |--------------------------------------------------------------------------
        */

        if (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            )
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' =>
                        'Please enter a valid email address.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email Rate Limit
        |--------------------------------------------------------------------------
        */

        if (
            !$this->checkRateLimit(
                'password_reset_email',
                $email,
                3,
                3600
            )
        ) {
            return back()->with(
                'status',
                $this->passwordResetGenericMessage()
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Find User
        |--------------------------------------------------------------------------
        */

        $user = DB::table('users')
            ->where(
                'email',
                $email
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Generic Response
        |--------------------------------------------------------------------------
        */

        $successMessage =
            $this->passwordResetGenericMessage();


        if (!$user) {

            return back()->with(
                'status',
                $successMessage
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Block Disabled/Suspended
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $user->status,
                [
                    'disabled',
                    'suspended',
                ],
                true
            )
        ) {
            return back()->with(
                'status',
                $successMessage
            );
        }


        try {

            /*
            |--------------------------------------------------------------------------
            | Delete Old Tokens
            |--------------------------------------------------------------------------
            */

            DB::table(
                'password_resets'
            )
                ->where(
                    'user_id',
                    $user->id
                )
                ->delete();


            /*
            |--------------------------------------------------------------------------
            | Generate Token
            |--------------------------------------------------------------------------
            */

            $rawToken = bin2hex(
                random_bytes(32)
            );


            /*
            |--------------------------------------------------------------------------
            | Hash Token
            |--------------------------------------------------------------------------
            */

            $tokenHash = hash(
                'sha256',
                $rawToken
            );


            /*
            |--------------------------------------------------------------------------
            | Expiration
            |--------------------------------------------------------------------------
            */

            $now = now();

            $expiresAt = $now
                ->copy()
                ->addMinutes(30);


            /*
            |--------------------------------------------------------------------------
            | Store Token
            |--------------------------------------------------------------------------
            */

            DB::table(
                'password_resets'
            )->insert([

                'user_id' =>
                    $user->id,

                'token_hash' =>
                    $tokenHash,

                'expires_at' =>
                    $expiresAt,

                'used_at' =>
                    null,

                'created_at' =>
                    $now,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Reset URL
            |--------------------------------------------------------------------------
            */

            $resetUrl = route(
                'password.reset',
                [
                    'token' =>
                        $rawToken,
                ]
            );


            /*
            |--------------------------------------------------------------------------
            | Send Reset Email
            |--------------------------------------------------------------------------
            */

            Mail::send(
                'emails.auth.password-reset',
                [
                    'user' =>
                        $user,

                    'resetUrl' =>
                        $resetUrl,

                    'expiresAt' =>
                        $expiresAt,
                ],
                function ($message) use ($user) {

                    $message->to(
                        $user->email,
                        $user->name
                    );

                    $message->replyTo(
                        env(
                            'MAIL_REPLY_TO_ADDRESS'
                        ),
                        env(
                            'MAIL_REPLY_TO_NAME'
                        )
                    );

                    $message->subject(
                        'Reset your Almantic password'
                    );
                }
            );


        } catch (Throwable $e) {

            report($e);

            /*
            |--------------------------------------------------------------------------
            | Don't Reveal Mail Failure
            |--------------------------------------------------------------------------
            */

        }


        return back()->with(
            'status',
            $successMessage
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Reset Password Page
    |--------------------------------------------------------------------------
    */

    public function showResetPassword(
        string $token
    ) {
        /*
        |--------------------------------------------------------------------------
        | Token Format
        |--------------------------------------------------------------------------
        */

        if (
            !preg_match(
                '/^[a-f0-9]{64}$/i',
                $token
            )
        ) {
            return view(
                'auth.reset-password',
                [
                    'token' =>
                        null,

                    'invalidToken' =>
                        true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Hash Token
        |--------------------------------------------------------------------------
        */

        $tokenHash = hash(
            'sha256',
            $token
        );


        /*
        |--------------------------------------------------------------------------
        | Find Token
        |--------------------------------------------------------------------------
        */

        $reset = DB::table(
            'password_resets'
        )
            ->where(
                'token_hash',
                $tokenHash
            )
            ->whereNull(
                'used_at'
            )
            ->where(
                'expires_at',
                '>',
                now()
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Invalid Token
        |--------------------------------------------------------------------------
        */

        if (!$reset) {

            return view(
                'auth.reset-password',
                [
                    'token' =>
                        null,

                    'invalidToken' =>
                        true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Valid Token
        |--------------------------------------------------------------------------
        */

        return view(
            'auth.reset-password',
            [
                'token' =>
                    $token,

                'invalidToken' =>
                    false,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Reset Password
    |--------------------------------------------------------------------------
    */

    public function resetPassword(
        Request $request
    ) {
        /*
        |--------------------------------------------------------------------------
        | Rate Limit
        |--------------------------------------------------------------------------
        */

        if (
            !$this->checkRateLimit(
                'password_reset_submit',
                $request->ip(),
                5,
                900
            )
        ) {
            return back()->withErrors([
                'password' =>
                    'Too many attempts. Please try again later.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Input
        |--------------------------------------------------------------------------
        */

        $token = trim(
            (string) $request->input(
                'token'
            )
        );

        $password = (string)
            $request->input(
                'password'
            );

        $passwordConfirmation =
            (string) $request->input(
                'password_confirmation'
            );


        /*
        |--------------------------------------------------------------------------
        | Token Validation
        |--------------------------------------------------------------------------
        */

        if (
            !preg_match(
                '/^[a-f0-9]{64}$/i',
                $token
            )
        ) {
            return back()->withErrors([
                'password' =>
                    'Invalid or expired reset link.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Validation
        |--------------------------------------------------------------------------
        */

        if (
            strlen($password) < 12
        ) {
            return back()->withErrors([
                'password' =>
                    'Password must be at least 12 characters.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Password Strength
        |--------------------------------------------------------------------------
        */

        if (
            !$this->isStrongPassword(
                $password
            )
        ) {
            return back()->withErrors([
                'password' =>
                    'Password must contain uppercase, lowercase, number and special character.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Confirmation
        |--------------------------------------------------------------------------
        */

        if (
            !hash_equals(
                $password,
                $passwordConfirmation
            )
        ) {
            return back()->withErrors([
                'password_confirmation' =>
                    'Passwords do not match.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Hash Token
        |--------------------------------------------------------------------------
        */

        $tokenHash = hash(
            'sha256',
            $token
        );


        /*
        |--------------------------------------------------------------------------
        | Find Valid Reset Token
        |--------------------------------------------------------------------------
        */

        $reset = DB::table(
            'password_resets'
        )
            ->where(
                'token_hash',
                $tokenHash
            )
            ->whereNull(
                'used_at'
            )
            ->where(
                'expires_at',
                '>',
                now()
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Invalid Token
        |--------------------------------------------------------------------------
        */

        if (!$reset) {

            return back()->withErrors([
                'password' =>
                    'Invalid or expired reset link.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Hash New Password
        |--------------------------------------------------------------------------
        */

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        /*
        |--------------------------------------------------------------------------
        | Update Password + Invalidate Tokens
        |--------------------------------------------------------------------------
        */

        DB::transaction(
            function () use (
                $reset,
                $passwordHash
            ) {

                /*
                |--------------------------------------------------------------------------
                | Update User
                |--------------------------------------------------------------------------
                */

                DB::table('users')
                    ->where(
                        'id',
                        $reset->user_id
                    )
                    ->update([

                        'password_hash' =>
                            $passwordHash,

                        'updated_at' =>
                            now(),
                    ]);


                /*
                |--------------------------------------------------------------------------
                | Mark Current Token Used
                |--------------------------------------------------------------------------
                */

                DB::table(
                    'password_resets'
                )
                    ->where(
                        'id',
                        $reset->id
                    )
                    ->update([

                        'used_at' =>
                            now(),
                    ]);


                /*
                |--------------------------------------------------------------------------
                | Invalidate Other Tokens
                |--------------------------------------------------------------------------
                */

                DB::table(
                    'password_resets'
                )
                    ->where(
                        'user_id',
                        $reset->user_id
                    )
                    ->whereNull(
                        'used_at'
                    )
                    ->update([

                        'used_at' =>
                            now(),
                    ]);
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Clear Session
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | Login
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Your password has been reset successfully. You can now sign in.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Verify Email
    |--------------------------------------------------------------------------
    */

    public function verifyEmail(
        string $token
    ) {
        /*
        |--------------------------------------------------------------------------
        | Token Format
        |--------------------------------------------------------------------------
        */

        if (
            !preg_match(
                '/^[a-f0-9]{64}$/i',
                $token
            )
        ) {
            return view(
                'auth.verify-result',
                [
                    'success' =>
                        false,

                    'message' =>
                        'Invalid verification link.',
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Hash Token
        |--------------------------------------------------------------------------
        */

        $tokenHash = hash(
            'sha256',
            $token
        );


        /*
        |--------------------------------------------------------------------------
        | Find Verification
        |--------------------------------------------------------------------------
        */

        $verification =
            DB::table(
                'email_verifications'
            )
                ->where(
                    'token_hash',
                    $tokenHash
                )
                ->whereNull(
                    'used_at'
                )
                ->where(
                    'expires_at',
                    '>',
                    now()
                )
                ->first();


        /*
        |--------------------------------------------------------------------------
        | Invalid / Expired
        |--------------------------------------------------------------------------
        */

        if (!$verification) {

            return view(
                'auth.verify-result',
                [
                    'success' =>
                        false,

                    'message' =>
                        'This verification link is invalid or has expired.',
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Verify Account
        |--------------------------------------------------------------------------
        */

        DB::transaction(
            function () use (
                $verification
            ) {

                /*
                |--------------------------------------------------------------------------
                | Update User
                |--------------------------------------------------------------------------
                */

                DB::table('users')
                    ->where(
                        'id',
                        $verification->user_id
                    )
                    ->update([

                        'status' =>
                            'active',

                        'email_verified_at' =>
                            now(),

                        'updated_at' =>
                            now(),
                    ]);


                /*
                |--------------------------------------------------------------------------
                | Mark Token Used
                |--------------------------------------------------------------------------
                */

                DB::table(
                    'email_verifications'
                )
                    ->where(
                        'id',
                        $verification->id
                    )
                    ->update([

                        'used_at' =>
                            now(),
                    ]);


                /*
                |--------------------------------------------------------------------------
                | Invalidate Other Verification Tokens
                |--------------------------------------------------------------------------
                */

                DB::table(
                    'email_verifications'
                )
                    ->where(
                        'user_id',
                        $verification->user_id
                    )
                    ->whereNull(
                        'used_at'
                    )
                    ->update([

                        'used_at' =>
                            now(),
                    ]);
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */

        return view(
            'auth.verify-result',
            [
                'success' =>
                    true,

                'message' =>
                    'Your email has been verified successfully. You can now sign in.',
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Resend Verification Page
    |--------------------------------------------------------------------------
    */

    public function showResendVerification()
    {
        return view(
            'auth.resend-verification'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Resend Verification Email
    |--------------------------------------------------------------------------
    */

    public function resendVerification(
        Request $request
    ) {
        /*
        |--------------------------------------------------------------------------
        | Rate Limit
        |--------------------------------------------------------------------------
        */

        if (
            !$this->checkRateLimit(
                'verification_resend_ip',
                $request->ip(),
                5,
                900
            )
        ) {
            return back()->withErrors([
                'email' =>
                    'Too many requests. Please try again later.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        $email = strtolower(
            trim(
                (string) $request->input(
                    'email'
                )
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Validate
        |--------------------------------------------------------------------------
        */

        if (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            )
        ) {
            return back()->withErrors([
                'email' =>
                    'Please enter a valid email address.',
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Find Pending User
        |--------------------------------------------------------------------------
        */

        $user = DB::table('users')
            ->where(
                'email',
                $email
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Generic Response
        |--------------------------------------------------------------------------
        */

        $message =
            'If your account requires verification, '
            . 'a verification email has been sent.';


        if (
            !$user ||
            $user->status !== 'pending'
        ) {
            return back()->with(
                'status',
                $message
            );
        }


        try {

            /*
            |--------------------------------------------------------------------------
            | Delete Old Tokens
            |--------------------------------------------------------------------------
            */

            DB::table(
                'email_verifications'
            )
                ->where(
                    'user_id',
                    $user->id
                )
                ->delete();


            /*
            |--------------------------------------------------------------------------
            | New Token
            |--------------------------------------------------------------------------
            */

            $rawToken = bin2hex(
                random_bytes(32)
            );


            $tokenHash = hash(
                'sha256',
                $rawToken
            );


            $expiresAt = now()
                ->copy()
                ->addHour();


            /*
            |--------------------------------------------------------------------------
            | Store
            |--------------------------------------------------------------------------
            */

            DB::table(
                'email_verifications'
            )->insert([

                'user_id' =>
                    $user->id,

                'token_hash' =>
                    $tokenHash,

                'expires_at' =>
                    $expiresAt,

                'used_at' =>
                    null,

                'created_at' =>
                    now(),
            ]);


            /*
            |--------------------------------------------------------------------------
            | Verification URL
            |--------------------------------------------------------------------------
            */

            $verificationUrl =
                route(
                    'verification.verify',
                    [
                        'token' =>
                            $rawToken,
                    ]
                );


            /*
            |--------------------------------------------------------------------------
            | Send Email
            |--------------------------------------------------------------------------
            */

            Mail::send(
                'emails.auth.verify-email',
                [
                    'user' =>
                        $user,

                    'verificationUrl' =>
                        $verificationUrl,

                    'expiresAt' =>
                        $expiresAt,
                ],
                function ($mail) use (
                    $user
                ) {

                    $mail->to(
                        $user->email,
                        $user->name
                    );

                    $mail->replyTo(
                        env(
                            'MAIL_REPLY_TO_ADDRESS'
                        ),
                        env(
                            'MAIL_REPLY_TO_NAME'
                        )
                    );

                    $mail->subject(
                        'Verify your Almantic account'
                    );
                }
            );

        } catch (Throwable $e) {

            report($e);
        }


        return back()->with(
            'status',
            $message
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Trusted Email Validation
    |--------------------------------------------------------------------------
    */

    private function validateRegistrationEmail(
        string $email
    ): array {

        /*
        |--------------------------------------------------------------------------
        | Extract Domain
        |--------------------------------------------------------------------------
        */

        $parts = explode(
            '@',
            $email
        );


        if (
            count($parts) !== 2
        ) {
            return [
                'valid' =>
                    false,

                'message' =>
                    'Please use a valid email address.',
            ];
        }


        $domain = strtolower(
            trim(
                $parts[1]
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Trusted Domains
        |--------------------------------------------------------------------------
        */

        $trustedDomains =
            $this->trustedEmailDomains();


        /*
        |--------------------------------------------------------------------------
        | Disposable Domains
        |--------------------------------------------------------------------------
        */

        $disposableDomains =
            $this->disposableEmailDomains();


        /*
        |--------------------------------------------------------------------------
        | Disposable Check
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $domain,
                $disposableDomains,
                true
            )
        ) {
            return [
                'valid' =>
                    false,

                'message' =>
                    'Temporary or disposable email addresses are not allowed.',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | Trusted Provider Check
        |--------------------------------------------------------------------------
        */

        if (
            !in_array(
                $domain,
                $trustedDomains,
                true
            )
        ) {
            return [
                'valid' =>
                    false,

                'message' =>
                    'Please register using a trusted email provider such as Gmail, Yahoo, Outlook, iCloud or Proton Mail.',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | MX Check
        |--------------------------------------------------------------------------
        */

        if (
            function_exists(
                'checkdnsrr'
            )
        ) {

            if (
                !checkdnsrr(
                    $domain,
                    'MX'
                )
            ) {
                return [
                    'valid' =>
                        false,

                    'message' =>
                        'This email provider does not appear to accept email.',
                ];
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Valid
        |--------------------------------------------------------------------------
        */

        return [
            'valid' =>
                true,

            'message' =>
                null,
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Trusted Email Domains
    |--------------------------------------------------------------------------
    */

    private function trustedEmailDomains(): array
    {
        $domains = env(
            'TRUSTED_EMAIL_DOMAINS',
            'gmail.com,yahoo.com,yahoo.co.uk,outlook.com,hotmail.com,live.com,icloud.com,me.com,proton.me,protonmail.com'
        );


        return array_values(
            array_filter(
                array_map(
                    function ($domain) {

                        return strtolower(
                            trim($domain)
                        );
                    },
                    explode(
                        ',',
                        $domains
                    )
                )
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Disposable Email Domains
    |--------------------------------------------------------------------------
    */

    private function disposableEmailDomains(): array
    {
        $domains = env(
            'DISPOSABLE_EMAIL_DOMAINS',
            'mailinator.com,guerrillamail.com,10minutemail.com,temp-mail.org,tempmail.com,yopmail.com,sharklasers.com,guerrillamail.net,trashmail.com'
        );


        return array_values(
            array_filter(
                array_map(
                    function ($domain) {

                        return strtolower(
                            trim($domain)
                        );
                    },
                    explode(
                        ',',
                        $domains
                    )
                )
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Strong Password
    |--------------------------------------------------------------------------
    */

    private function isStrongPassword(
        string $password
    ): bool {

        return
            preg_match(
                '/[a-z]/',
                $password
            ) &&
            preg_match(
                '/[A-Z]/',
                $password
            ) &&
            preg_match(
                '/[0-9]/',
                $password
            ) &&
            preg_match(
                '/[^A-Za-z0-9]/',
                $password
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Password Reset Generic Message
    |--------------------------------------------------------------------------
    */

    private function passwordResetGenericMessage(): string
    {
        return
            'If an account exists for this email, '
            . 'a password reset link has been sent.';
    }


    /*
    |--------------------------------------------------------------------------
    | Custom Database Rate Limiter
    |--------------------------------------------------------------------------
    */

    private function checkRateLimit(
        string $type,
        string $identifier,
        int $maxAttempts,
        int $windowSeconds
    ): bool {

        /*
        |--------------------------------------------------------------------------
        | Normalize Identifier
        |--------------------------------------------------------------------------
        */

        $identifier = strtolower(
            trim(
                $identifier
            )
        );


        /*
        |--------------------------------------------------------------------------
        | Hash Rate Key
        |--------------------------------------------------------------------------
        */

        $rateKey = hash(
            'sha256',
            $type
            . '|'
            . $identifier
        );


        /*
        |--------------------------------------------------------------------------
        | Current Time
        |--------------------------------------------------------------------------
        */

        $now = now();


        /*
        |--------------------------------------------------------------------------
        | Existing Record
        |--------------------------------------------------------------------------
        */

        $record = DB::table(
            'auth_rate_limits'
        )
            ->where(
                'rate_key',
                $rateKey
            )
            ->first();


        /*
        |--------------------------------------------------------------------------
        | No Record
        |--------------------------------------------------------------------------
        */

        if (!$record) {

            DB::table(
                'auth_rate_limits'
            )->insert([

                'rate_key' =>
                    $rateKey,

                'attempts' =>
                    1,

                'window_started_at' =>
                    $now,

                'expires_at' =>
                    $now->copy()->addSeconds(
                        $windowSeconds
                    ),

                'created_at' =>
                    $now,

                'updated_at' =>
                    $now,
            ]);


            return true;
        }


        /*
        |--------------------------------------------------------------------------
        | Expired Window
        |--------------------------------------------------------------------------
        */

        if (
            now()->greaterThan(
                $record->expires_at
            )
        ) {

            DB::table(
                'auth_rate_limits'
            )
                ->where(
                    'id',
                    $record->id
                )
                ->update([

                    'attempts' =>
                        1,

                    'window_started_at' =>
                        $now,

                    'expires_at' =>
                        $now->copy()->addSeconds(
                            $windowSeconds
                        ),

                    'updated_at' =>
                        $now,
                ]);


            return true;
        }


        /*
        |--------------------------------------------------------------------------
        | Limit Reached
        |--------------------------------------------------------------------------
        */

        if (
            (int) $record->attempts >=
            $maxAttempts
        ) {
            return false;
        }


        /*
        |--------------------------------------------------------------------------
        | Increment
        |--------------------------------------------------------------------------
        */

        DB::table(
            'auth_rate_limits'
        )
            ->where(
                'id',
                $record->id
            )
            ->update([

                'attempts' =>
                    ((int) $record->attempts) + 1,

                'updated_at' =>
                    $now,
            ]);


        return true;
    }
    
    public function logout(Request $request)
{
    $request->session()->forget([
        'auth_user_id',
        'auth_user_uuid',
        'authenticated_at',
    ]);

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()
        ->route('login')
        ->with(
            'status',
            'You have been signed out successfully.'
        );
}
}