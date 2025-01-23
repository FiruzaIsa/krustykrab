<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        /* Color Palette */


        body {
            background-color: var(--background-color);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background-color: #FFFFFF;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .login-card h2 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
        }


        footer {
            background-color: var(--primary-color);
            color: #FFFFFF;
            padding: 15px 0;
            text-align: center;
        }

        .alert-danger {
            margin-top: 15px;
            border-color: var(--error-color);
            color: #FFFFFF;
            background-color: var(--error-color);
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="login-container">
        <div class="login-card text-center">
            <h2>Login</h2>

            <form method="POST" action="">
                <div class="mb-4">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>

            <?php
            session_start();
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $adminUsername = 'squidward';
                $adminPassword = 'Clarinet&Cashmere#1';
                // Simulate a SQL query (no actual database)
                // In real SQL, it might look like: "SELECT * FROM users WHERE username='$username' AND password='$password'"
                //$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                if ($username === $adminUsername && $password === $adminPassword) {
                    // Store session data
                    session_regenerate_id(true);
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
            
                    // Redirect to dashboard
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Invalid username or password.</div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 QuickSearch. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
