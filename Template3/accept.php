<?php $title = "Accept";
include("header.php");
$error = true;
$error2 = false;
if ($login && isset($_GET["id"])) {
    $id = $_GET["id"];
    $userid10 = $_SESSION["id"];
    $result = mysqli_query($database, "SELECT g.name,g.id from  libraries l JOIN users u ON l.user_id = u.id JOIN games g ON l.game_id = g.id WHERE u.id = $userid10 ");
    while ($row = mysqli_fetch_assoc($result)) {
        $stuff[] = array('name' => $row["name"], 'id' => $row["id"]);
        $error = false;
    }
        $result2 = mysqli_query($database, "SELECT * FROM tstage1 where id = $id AND user_id <> $userid10");
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $error2 = true;
        }
    }
    else if ($login && isset($_POST['submit'])) {
        $id = $_POST["submit"];
        $id2 = $_POST["id"];
        $userid10 = $_SESSION["id"];
        $result2 = mysqli_query($database, "SELECT * from libraries where user_id =  $userid10 AND game_id = $id2");
        if ($row2 = mysqli_fetch_assoc($result2)) {
            $delete = $row2["id"];
            $result3 = mysqli_query($database, "DELETE from libraries where id =  $delete");
            $result4 = mysqli_query($database, "SELECT user_id,game_id from tstage1 WHERE id = $id");
            if ($row3 = mysqli_fetch_assoc($result4)) {
                $user_id = $row3['user_id'];
                $game_id = $row3["game_id"];
                $result6 = mysqli_query($database, "INSERT INTO  Tstage2 (user_id,game_id,user_id2,game_id2) values ($user_id,$game_id,$userid10,$id2) ");
                $result5 = mysqli_query($database, "DELETE  from tstage1 where id = $id");
                $error = false;
                $error2 = true;
            }
        }
    }
?>
<section class="warpper">
    <?php if (!$error2) echo "<h1>Not Exist</h1>";
    else if ($login == true && isset($_GET["id"])) { ?> <form action="accept.php" method="post">
        <h2>Swap Games</h2>
        <label for="name">Select the game from your games</label>
        <br>
        <select name="id">
            <option value=""></option>
            <?php foreach ($stuff as $item) { ?>
            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit" value="<?php echo $_GET["id"]; ?>">Insert</button>
    </form>
    <?php  } else if ($error == false) echo "<h1>Done</h1>";
    else {
        echo "<h1>You Must Loggin</h1>";
    } ?>

</section>
<?php include("footer.php"); ?>