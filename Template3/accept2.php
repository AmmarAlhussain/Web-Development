<?php $title = "Accept2";
include("header.php");
if ($login && isset($_GET['id']) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $result2 = mysqli_query($database, "SELECT * from tstage2 where id = $id;");
    if ($row = mysqli_fetch_assoc($result2)) {
        $userid = $row["user_id"];
        $userid2 = $row["user_id2"];
        $gameid = $row["game_id"];
        $gameid2 = $row["game_id2"];
        $result3 = mysqli_query($database, "DELETE from tstage2 where id = $id;");
        if ($_GET["status"] == "0") {
            mysqli_query($database, "INSERT INTO  tstage1 (user_id,game_id) values ($userid,$gameid);");
            mysqli_query($database, "INSERT INTO  libraries (user_id,game_id) values ($userid2,$gameid2);");
        } else if ($_GET["status"] == "1") {
            mysqli_query($database, "INSERT INTO  tstage3 (user_id,game_id,user_id2,game_id2) values ($userid,$gameid,$userid2,$gameid2);");
        }
    }
    $done = true;
    $empty = false;
} else if ($login) {
    $done = false;
    $empty = true;
    $userid10 = $_SESSION["id"];
        $result2 = mysqli_query($database, "SELECT *,t.id as TID from tstage2 t JOIN games g ON t.game_id = g.id where user_id = $userid10;");
        $result3 = mysqli_query($database, "SELECT * from tstage2 t JOIN games g ON t.game_id2 = g.id where user_id = $userid10;");
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $row3 = mysqli_fetch_assoc($result3);
            $stuff[] = array('id' => $row2["TID"], 'user_id' => $row2["user_id"], 'game_id' => $row2["game_id"], 'user_id2' => $row2["user_id2"], 'game_id2' => $row2["game_id2"], 'name' => $row2["name"], 'img' => $row2["img"], 'img2' => $row3["img"], 'name2' => $row3["name"]);
            $empty = false;
        }
    }

?>

<section id="container">
    <?php if (!$login) echo "<h1>You Must Loggin</h1>";
    else if ($empty) echo "<h1>There no Trading Request For You</h1>";
    else if ($done) echo "<h1>Waiting Admin</h1>";
    else if ($login) { ?>
    <div id="wapper">
        <header>
            <h2>Trading Request</h2>
        </header>
        <?php foreach ($stuff as $loop) { ?>
        <div class="post">
            <div class="image">Your Game
                <img src="<?php echo $loop["img"]; ?>" alt="<?php echo $loop["name"]; ?>">
            </div>
            <div class="image">Swap With
                <img src="<?php echo $loop["img2"]; ?>" alt="<?php echo $loop2["name2"]; ?>">
            </div>
            <div class="buttons">
                <a href="accept2.php?id=<?php echo $loop['id'] . "&status=0"; ?>">Cancel</a>
                <a href="accept2.php?id=<?php echo $loop['id'] . "&status=1"; ?>">Accept</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>

<?php include("footer.php"); ?>