<?php $title = "Cart";
include("header.php");
$cart = false;
$buy = false;
if ($login && isset($_GET['id'])) {
    $gameID = $_GET['id'];
    $userid10 = $_SESSION["id"];
    $addGame = mysqli_query($database, "INSERT INTO carts (user_id , game_id) values ($userid10, $gameID);");
    header("Location: cart.php");
    exit;
} else if ($login && isset($_GET['cartID'])) {
    $cID = $_GET['cartID'];
    $delete = mysqli_query($database, "DELETE from carts where ID = $cID;");
    header("Location: cart.php");
    exit;
}

if ($login) {
    $userid10 = $_SESSION["id"];
    $query = "SELECT g.name,g.img,CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price, c.ID FROM carts c JOIN users u ON c.user_id = u.ID JOIN games g ON c.game_id = g.id LEFT JOIN offers s ON s.game_id=g.ID WHERE u.id = $userid10;";
    $result =  mysqli_query($database, $query);
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $container[] = array("discount" => $row['disc_price'], "name" => $row["name"], "img" => $row["img"], "id" => $row["ID"]);
        $total +=  $row['disc_price'];
        $cart = true;
    }
}

if(isset($_POST["submit"]) && $login){
    $Uid = $_SESSION["id"];
    $cartR = mysqli_query($database,"SELECT game_id from carts WHERE user_id = $Uid; ");
    while($cartGame = mysqli_fetch_assoc($cartR)){
        $CGid[] = array("id" =>$cartGame['game_id']);
    }
    foreach($CGid as $cg){
        $Gid = $cg['id'];
        $boughtTimes = mysqli_query($database,"update games SET timesBought = timesBought + 1 Where id = $Gid;");
        $libraries = mysqli_query($database,"insert into libraries(user_id, game_id) values ($Uid,$Gid);");
        $deleteCart = mysqli_query($database,"delete from carts where user_id = $Uid AND game_id = $Gid");
    }
    $buy = true;
}

?>
<section id="container">
    <?php if ($login &&$buy){
        echo "<h1> Thank you for purchasing</h1>";
    }
    else if ($login && $cart) { ?>
    <header>
        <h2> Cart </h2>
    </header>
    <div class="box">
        <div class="titles">
            <h2>Images</h2>
            <h2>Items</h2>
            <h2>Price</h2>
        </div>
        <?php foreach ($container as $id) { ?>
        <div class="item">
            <a href="cart.php?cartID=<?php echo $id['id'] ?>"><i class="far fa-times-circle"></i> </a>
            <img src="<?php echo $id["img"]; ?>" alt="<?php echo $id["name"]; ?>">
            <p><?php echo $id["name"]; ?></p>
            <p><?php echo $id["discount"]; ?></p>
        </div>
        <?php } ?>
    </div>
    <atricle class="final">
        <?php
            echo "<h3> Total price : $total</h3>";
            ?>
        <form action="cart.php" method="post" onsubmit="return pdfwait()">
            <button type="submit" name="submit"> Buy </button>
        </form>
        </article>
        <?php } else if (!$login) {
        echo "<h1>You Must Loggin for cart</h1>";
    } else {
        echo "<h1>Cart is empty</h1>";
    } ?>
</section>

<?php include("footer.php"); ?>