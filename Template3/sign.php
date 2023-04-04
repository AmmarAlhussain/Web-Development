<?php $title = "Sign";
include("header.php");
if (isset($_POST["send"])) {
    $user = $_POST["username"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $query = "insert into users (username,password,email) values ('$user','$password','$email')";
    $result = mysqli_query($database, $query);
    $result2 = mysqli_query($database,"SELECT * FROM users  where username = '$user' AND email = '$email'");
    if ($row = mysqli_fetch_assoc($result2)) {
        $_SESSION["id"] = $row["id"];
        header("Location: index.php");
        exit;
    } else {
        header("Location: sign.php?status=0");
        exit;
    }
}

if (isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    session_destroy();
    header("Location: sign.php");
    exit;
}

?>
<section class="login">
    <?php if (isset($_GET['status']) && $_GET['status'] == 0) echo "<h1>Username or email are used</h1><a href='sign.php'>Back to Sign up</a>";
    else { ?>
    <div>
        <form action="sign.php" method="post" autocomplete="off">
            <div>
                <h2>Sign Up</h2>
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <i class="fas fa-key"></i>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <i class="fas fa-at"></i>
            </div>
            <button type="submit" name="send">Sign Up</button>
        </form>
        <a href="login.php">Back to Sign in</a>
    </div>
    <?php  } ?>
</section>
<?php include("footer.php"); ?>