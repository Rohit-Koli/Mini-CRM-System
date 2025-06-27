<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border: 1px solid #ced4da;
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            margin-bottom: 1.5rem;
        }
    </style>

</head>
<body>
<div class="login-form">
        <h2 class="text-center">Login</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>

  <?php
$login = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include('includes/dbconnect.php');
    $email = $_POST['email'];
    $password = $_POST['password']; // Fix: match input name

    if (!$conn) {
        die("Fail to Connect with Database ");
    } else {
        if ($email === "admin@test.com" && $password === "admin123") {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            header("location:index.php");
        } else {
            $ShowError = "Invalid Login Credentials!";
            echo "<script>alert('$ShowError')</script>"; // Fix: missing bracket
        }
    }
}
?>

    <?php
    if ($login === true) {
        header("location:index.php");
    }
    ?>

</form>
</body>
</html>