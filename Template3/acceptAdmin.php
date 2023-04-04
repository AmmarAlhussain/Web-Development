<?php $title = "Accept Admin";
include("header.php");
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}
if ($login && isset($_GET['id']) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $result2 = mysqli_query($database, "SELECT * from tstage3 where id = $id;");
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $userid = $row2["user_id"];
        $gameid = $row2["game_id"];
        $userid2 = $row2["user_id2"];
        $gameid2 = $row2["game_id2"];
        echo $gameid;
        if ($_GET["status"] == "0") {
            mysqli_query($database, "INSERT INTO  tstage1 (user_id,game_id) values ($userid,$gameid);");
            mysqli_query($database, "INSERT INTO  libraries (user_id,game_id) values ($userid2,$gameid2);");
            mysqli_query($database, "DELETE from tstage3 where id = $id;");
        } else if ($_GET["status"] == "1") {
            mysqli_query($database, "UPDATE tstage3 set Finish ='yes' where id = $id;");
            mysqli_query($database, "INSERT INTO  libraries (user_id,game_id) values ($userid,$gameid2);");
            mysqli_query($database, "INSERT INTO  libraries (user_id,game_id) values ($userid2,$gameid);");
        }
    }
    $done = true;
    $empty = false;
} else if ($login) {
    $done = false;
    $empty = true;
    $result = mysqli_query($database, "SELECT *,t.id as TID from Tstage3 t JOIN games g ON t.game_id = g.id  where finish IS NULL;");
    $result2 = mysqli_query($database, "SELECT * from Tstage3 t JOIN games g ON t.game_id2 = g.id  where finish IS NULL;");
    while ($row = mysqli_fetch_assoc($result)) {
        $row2 = mysqli_fetch_assoc($result2);
        $stuff[] = array('id' => $row["TID"], 'user_id' => $row["user_id"], 'game_id' => $row["game_id"], 'user_id2' => $row["user_id2"], 'game_id2' => $row["game_id2"], 'name' => $row["name"], 'img' => $row["img"], 'img2' => $row2["img"], 'name2' => $row2["name"]);
        $empty = false;
    }
}
?>

<section id="container">
    <?php
    if ($empty) echo "<h1>There no Trading Request For You</h1>";
    else if ($done) echo "<h1>Done</h1>";
    else { ?>
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
                <a href="acceptAdmin.php?id=<?php echo $loop['id'] . "&status=0"; ?>">Cancel</a>
                <a href="acceptAdmin.php?id=<?php echo $loop['id'] . "&status=1"; ?>">Accept</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>

<?php include("footer.php"); ?>