<!DOCTYPE html>
<html>
<head>
    <title>Login - Warung ABC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Gradien bergerak */
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #4facfe, #00f2fe);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
        }

        /* Animasi pergerakan gradien */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px); /* Efek blur kaca */
            padding: 40px 30px;
            border-radius: 20px; /* Sudut melengkung */
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
        }

        .pesan-error {
            color: #ffdddd;
            background: rgba(255, 0, 0, 0.2);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px 0;
            color: #ffffff;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 12px; /* Sudut melengkung input */
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 12px; /* Sudut melengkung tombol */
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        input[type="submit"]:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login Aplikasi Warung ABC</h1>
        <?php
        session_start();
        if (isset($_SESSION['pesan_error'])) {
            echo '<div class="pesan-error">' . $_SESSION['pesan_error'] . '</div>';
            unset($_SESSION['pesan_error']); // Hapus pesan setelah ditampilkan
        }
        ?>
        <form action="proses_login.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required placeholder="Masukkan username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required placeholder="Masukkan password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Login">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>