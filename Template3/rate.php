<?php $title = "Rate";
include("header.php");
$flags = true;
$done = false;
if (isset($_GET["id"])) {
    $id =  $_GET['id'];
    $result = mysqli_query($database, "SELECT * from games WHERE id = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $stuff = array('name' => $row["name"], 'description' => $row["description"], 'id' => $row["id"], "img" => $row["img"]);
        $flags = false;
    }
}
if (isset($_POST["id1"]) && $login) {
    $id2 =  $_POST['id1'];
    $userid10 = $_SESSION["id"];
    $comment = trim($_POST["comment"]);
    $star = $_POST["star"];
        if ($star != "0") {
            mysqli_query($database, "DELETE from ratings where user_id = $userid10 AND game_id = $id2");
            mysqli_query($database, "INSERT INTO ratings values ($userid10,$id2,$star);");
        }
        if ($comment  != "") {
            mysqli_query($database, "INSERT INTO comment (user_id,game_id,comments) values($userid10,$id2,'$comment');");
        }
        $flags = false;
        $done = true;
    }

?>
<section>
    <?php if (!$login) echo "<h1 class='center'>You Must Loggin</h1>";
    else if ($flags) echo "<h1 class='center'>Try Again Later...</h1>";
    else if ($done) echo "<h1 class='center'>Done</h1>";
    else { ?>
    <form action="rate.php" method="POST">
        <header>
            <h1>Rate Games</h1>
        </header>
        <div id="wapper">
            <div>
                <img src="<?php echo $stuff["img"]; ?>" alt="">
            </div>
            <div>
                <h2><?php echo $stuff["name"]; ?></h2>
                <p><?php echo $stuff["description"]; ?></p>
                <input type="text" hidden value="<?php echo $stuff["id"]; ?>" name="id1">
            </div>
            <div id="stars">
                <i star="1" class="fas fa-star"></i>
                <i star="2" class="fas fa-star"></i>
                <i star="3" class="fas fa-star"></i>
                <i star="4" class="fas fa-star"></i>
                <i star="5" class="fas fa-star"></i>
                <input type="text" hidden value="0" name="star" id="star">
            </div>
            <div id="text">
                <label for="comment">Your Comment</label>
                <br>
                <textarea name="comment" id="comment" cols="10" rows="3"></textarea>
                <button type="submit">Rate</button>
            </div>
        </div>
    </form>
    <?php } ?>
</section>

<?php include("footer.php"); ?>