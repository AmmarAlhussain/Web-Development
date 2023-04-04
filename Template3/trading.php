<?php $title = "Trading";
include("header.php");
$trading = false;

if (isset($_SESSION["id"])) {
    $userid10 = $_SESSION["id"];
    $query = "SELECT t.id,t.user_id,g.name,g.img,g.description,t.libraries_id FROM Tstage1 t JOIN games g ON t.game_id = g.id";
    $result = mysqli_query($database, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $Show[] = array("name" => $row['name'], "img" => $row['img'], "description" => $row['description'], "id" => $row['id'], "user_id" => $row['user_id'], "libraries_id" => $row['libraries_id']);
        $trading = true;
    }
}

?>
<section>
    <div id="wapper">
        <?php if ($login && !isset($_GET["id"]) && $trading) {
            foreach ($Show as $id) {
        ?>
        <div class="post">
            <div class="img">
                <img src="<?php echo $id['img'] ?>" alt="<?php echo $id['name'] ?>">
            </div>
            <div class="middle">
                <header>
                    <h2><?php echo $id['name'] ?></h2>
                </header>
                <p><?php echo $id['description'] ?></p>
            </div>
            <div class="buttons">
                <a href="<?php if ($userid10 == $id['user_id']) echo 'addtrading.php?id=' . $id['libraries_id'];
                                    else echo 'accept.php?id=' . $id['id']; ?>">
                    <?php if ($userid10 == $id['user_id']) echo "Cancel";
                            else echo "Trade"; ?>
                </a>
            </div>
        </div>
        <?php } ?>
        <div class="links1">
            <a href="accept2.php">Check Your Request</a>
            <a href='addtrading.php'>Post Games</a>
        </div>
        <?php }
        if (!$login) echo "<h1 class='center'>You Must Loggin</h1>";
            else if (!$trading) echo "<h1 class='center'>Trading is Empty</h1><div class='links1'><a href='accept2.php'>Check Your Request</a><a href='addtrading.php'>Post Games</a></div>";  ?>
    </div>
</section>
<?php include("footer.php"); ?>