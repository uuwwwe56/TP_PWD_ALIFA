<?php
session_start();
require_once "class/Auth.php";
$auth = new Auth();

$error = "";
$showAlert = false;

if (isset($_POST['login'])) {

    $user = $auth->login($_POST['username'], $_POST['password']);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['level']    = $user['level'];

        if ($user['level'] == 0) {
            header("Location: page_admin.php");
            exit;
        }
        if ($user['level'] == 1) {
            header("Location: page_user.php");
            exit;
        }
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Modern</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

   

    <div class="login-box">
        <h2>Login</h2>

        <form method="POST" action="">

            <div class="input-box">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <?php if (!empty($error)) { ?>
                <p style="color:red; font-weight:bold;"><?php echo $error; ?></p>
            <?php } ?>

            <button type="submit" name="login">Masuk</button>
        </form>

    </div>

</body>

</html>