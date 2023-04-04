<?php $title = "Favorite";
include("header.php");
$favorite = false;

if ($login && isset($_GET['id'])) {
    $gameID = $_GET['id'];
    $userid10 = $_SESSION["id"];
    $addGame = mysqli_query($database, "INSERT INTO favorite (user_id , game_id) values ($userid10, $gameID);");
    header("Location: favorite.php");
    exit;
} else if ($login && isset($_GET['favoriteID'])) {
    $fID = $_GET['favoriteID'];
    $delete = mysqli_query($database, "DELETE from favorite where ID = $fID;");
    header("Location: favorite.php");
    exit;
}

if ($login) {
    $userid10 = $_SESSION["id"];
    $query = "SELECT g.name,g.img,CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price, f.ID FROM favorite f JOIN users u ON f.user_id = u.ID JOIN games g ON f.game_id = g.id LEFT JOIN offers s ON s.game_id=g.ID WHERE u.id = $userid10;";
    $result =  mysqli_query($database, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $container[] = array("discount" => $row['disc_price'], "name" => $row["name"], "img" => $row["img"], "id" => $row["ID"]);
        $favorite = true;
    }
}
?>
<section id="container">
    <?php if ($login && $favorite) { ?>
    <header>
        <h2> Favorite </h2>
    </header>
    <div class="box">
        <div class="titles">
            <h2>Images</h2>
            <h2>Price</h2>
            <h2>Items</h2>
        </div>
        <?php foreach ($container as $id) { ?>
        <div class="item">
            <a href="favorite.php?favoriteID=<?php echo $id['id'] ?>"><i class="far fa-times-circle"></i> </a>
            <img src="<?php echo $id["img"]; ?>" alt="<?php echo $id["name"]; ?>">
            <p><?php echo $id["name"]; ?></p>
            <p><?php echo $id["discount"]; ?></p>
        </div>
        <?php } ?>

    </div>
    <?php } else if (!$login) {
        echo "<h1>You Must Loggin for favorite</h1>";
    } else {
        echo "<h1>favorite is empty</h1>";
    } ?>


</section>


<?php include("footer.php"); ?>