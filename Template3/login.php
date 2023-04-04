<?php $title = "Login";
include("header.php");
if (isset($_POST["send"])) {
    $user = $_POST["username"];
    $password = md5($_POST["password"]);
    $query = "SELECT * FROM users  where username = '$user' AND password = '$password'";
    $result = mysqli_query($database, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["id"] = $row["id"];
        if ($row["admin"] == "admin") {
            header("Location: adminPage.php");
            exit;
        }
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?status=0");
        exit;
    }
}

if (isset($_SESSION['id'])) {
    unset($_SESSION["id"]);
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<section class="login">
    <?php if (isset($_GET['status']) && $_GET['status'] == 0) echo "<h1>Username or Password are Incorrect</h1><a href='login.php'>Back to Sign in</a>";
    else { ?>
    <div>
        <form action="login.php" method="post" autocomplete="off">
            <div>
                <h2>Sign In</h2>
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
            <button type="submit" name="send">Sign In</button>
        </form>
        <a href="sign.php">Back to Sign Up</a>
    </div>
    <?php } ?>
</section>
<?php include("footer.php"); ?>