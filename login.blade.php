<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Login Admin - Bank Sampah Batupapan
    </title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #0f5132,
                    #198754
                );

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

        }


        .login-container {

            width: 100%;

            max-width: 420px;

        }


        .login-card {

            background: white;

            border-radius: 18px;

            padding: 40px;

            box-shadow:
                0 15px 50px
                rgba(0, 0, 0, 0.20);

        }


        .logo {

            text-align: center;

            margin-bottom: 25px;

        }


        .logo-icon {

            width: 75px;

            height: 75px;

            background: #e8f5e9;

            color: #198754;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 40px;

            margin:
                0 auto 15px;

        }


        .logo h1 {

            color: #155e34;

            font-size: 24px;

            margin-bottom: 6px;

        }


        .logo p {

            color: #777;

            font-size: 14px;

        }


        .form-group {

            margin-bottom: 20px;

        }


        .form-group label {

            display: block;

            margin-bottom: 8px;

            color: #333;

            font-weight: bold;

            font-size: 14px;

        }


        .form-control {

            width: 100%;

            padding: 13px 15px;

            border:
                1px solid #ddd;

            border-radius: 8px;

            font-size: 15px;

            outline: none;

            transition: .2s;

        }


        .form-control:focus {

            border-color: #198754;

            box-shadow:
                0 0 0 3px
                rgba(25,135,84,.10);

        }


        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 20px;

            font-size: 14px;

            color: #555;

        }


        .btn-login {

            width: 100%;

            border: none;

            padding: 14px;

            background: #198754;

            color: white;

            border-radius: 8px;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: .2s;

        }


        .btn-login:hover {

            background: #146c43;

        }


        .error {

            color: #dc3545;

            font-size: 13px;

            margin-top: 6px;

        }


        .success {

            background: #d1e7dd;

            color: #0f5132;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 14px;

        }


        .footer {

            text-align: center;

            margin-top: 20px;

            color: rgba(255,255,255,.8);

            font-size: 13px;

        }


        @media(max-width: 500px) {

            .login-card {

                padding: 30px 20px;

            }

        }

    </style>

</head>


<body>


<div class="login-container">


    <div class="login-card">


        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">
                ♻️
            </div>


            <h1>
                Bank Sampah Batupapan
            </h1>


            <p>
                Login Administrator
            </p>

        </div>


        <!-- SUCCESS -->

        @if(session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif


        <!-- FORM -->

        <form
            action="{{ route('login.process') }}"
            method="POST">

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus>


                @error('email')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>


                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>


                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- REMEMBER -->

            <label class="remember">

                <input
                    type="checkbox"
                    name="remember">

                Ingat saya

            </label>


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-login">

                🔐 Masuk ke Dashboard

            </button>


        </form>

    </div>


    <div class="footer">

        © {{ date('Y') }}

        Bank Sampah Kelurahan Batupapan

    </div>


</div>


</body>

</html>