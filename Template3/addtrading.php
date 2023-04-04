<?php $title = "Add Trading";
include("header.php"); ?>

<?php
$flag = true;
if (isset($_POST['submit']) && $login) {
    $id = $_POST['id'];
    $userid10 = $_SESSION["id"];
    $result2 = mysqli_query($database, "SELECT id FROM libraries where user_id = $userid10 AND game_id = $id");
    $row2 = mysqli_fetch_assoc($result2);
    $lid = $row2['id'];
    $result3 = mysqli_query($database, "insert INTO Tstage1 ( user_id , game_id,libraries_id) values ($userid10 ,$id,$lid )");
    $result4 = mysqli_query($database, "DELETE FROM libraries WHERE id = $lid");
    if ($result4) {
        $flag = false;
    }
}
if (isset($_GET['id']) && $login) {
    $id = $_GET['id'];
    $result5 = mysqli_query($database, "SELECT * FROM Tstage1 where libraries_id = $id");
    if ($information = mysqli_fetch_assoc($result5)) {
        $userid2 = $information['user_id'];
        $gameid2 = $information['game_id'];
        $result6 = mysqli_query($database, "insert into libraries (user_id , game_id) values($userid2 , $gameid2)");
        $result7 = mysqli_query($database, "DELETE FROM Tstage1 WHERE libraries_id = $id");
        if ($result7) {
            $flag = false;
        }
    }
} else if (isset($_SESSION["id"])) {
    $userid10 = $_SESSION["id"];
    $result = mysqli_query($database, "SELECT g.name,g.id from  libraries l JOIN users u ON l.user_id = u.id JOIN games g ON l.game_id = g.id WHERE u.id = $userid10 ");
    while ($row = mysqli_fetch_assoc($result)) {
        $stuff[] = array('name' => $row["name"], 'id' => $row["id"]);
    }
}
?>
<section class="warpper">
    <?php if ($login == true && !isset($_GET['id']) && $flag) { ?> <form action="addtrading.php" method="post">
        <h2>Add to Trading</h2>
        <label for="name">Select Game</label>
        <br>
        <select name="id">
            <option value=""></option>
            <?php foreach ($stuff as $id) { ?>
            <option value="<?php echo $id['id']; ?>"><?php echo $id['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit">POST</button>
    </form>
    <?php  } else if ($flag == false) echo "<h1>Done</h1>";
    else if (!$login) {
        echo "<h1>You Must Loggin</h1>";
    } else echo "<h1>Something Wrong Happens Try Again Later</h1>" ?>

</section>

<?php include("footer.php"); ?>