<?php $title = "Add Game";
include("header.php");
$flag = false;
$como = false;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id where g.id = $id;";
    $result = mysqli_query($database, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $flag = true;
        $Add = array("name" => $row['name'], "disc_price" => $row['disc_price'], "price" => $row['price'], "timesBought" => $row['timesBought'], "discount" => $row["discount"], "img" => $row['img'], "description" => $row['description'], "id" => $id);
        $result5 = mysqli_query($database, "SELECT * from comment c JOIN users u ON c.user_id = u.id  where game_id = $id");
        while($row5 = mysqli_fetch_assoc($result5)) {
            $como = true;
            $comments[] = array("name"=>$row5["username"],"comments"=>$row5["comments"]);
        }
    }
}

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    $query = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id where LOWER(g.name) = LOWER('$name');";
    $result = mysqli_query($database, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $flag = true;
        $Add = array("name" => $row['name'], "disc_price" => $row['disc_price'], "price" => $row['price'], "timesBought" => $row['timesBought'], "discount" => $row["discount"], "img" => $row['img'], "description" => $row['description'], "id" => $row["id"]);
        $id = $Add["id"];
        $result6 = mysqli_query($database, "SELECT * from comment c JOIN users u ON c.user_id = u.id  where game_id = $id");
        while($row6 = mysqli_fetch_assoc($result6)) {
        $como = true;
        $comments[] = array("name"=>$row6["username"],"comments"=>$row6["comments"]);
        }
    }
}
?>

<section class="container">
    <div class="wapper"> <?php if ($flag == true) { ?>
        <div class="image">
            <img src="<?php echo $Add['img']; ?>" alt="">
        </div>
        <div class="middle">
            <header>
                <h2><?php echo $Add['name']; ?> </h2>
            </header>
            <h3><?php echo $Add['description']; ?></h3>
        </div>
        <div class="third">
            <div class="something">
                <h3>Price is <?php echo $Add['price']; ?></h3>
                <h3>Perstange of discount:
                    <?php if ($Add['discount'] == null) echo (0) . "%";
                                else echo ($Add['discount'] * 100) . "%"  ?></h3>
                <h3>Price after discount: <?php echo $Add['disc_price']; ?></h3>
                <a href="cart.php?id=<?php echo $Add['id']; ?>">Add to Cart</a>
                <a href="favorite.php?id=<?php echo $Add['id']; ?>">Add to Favorite</a>
                <a href="rate.php?id=<?php echo $Add['id']; ?>">Rate the Game</a>
                <p>The game was bought <?php echo $Add['timesBought']; ?> times </p>
            </div>
        </div>
        <?php
            $id2 = $Add["id"];
            $query3 = "select AVG(rating) from ratings where game_id = $id2 ";
            $result3 = mysqli_query($database, $query3);
            if ($row = mysqli_fetch_assoc($result3)) {
                $avg = $row['AVG(rating)'];
            }
            if ($avg  == null) {
            $avg = 0;
            } ?>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <script>
            let h2 = [...document.querySelectorAll(".stars i")];
            for (let i = 0; i < <?php echo $avg; ?>; i++) {
                h2[i].style = "color:yellow;";
            }
            </script>
        </div>
        <?php } if ($flag == false) echo "<h1 class='wrong'>Try Again</h1>"; ?>
    </div>
</section>
<?php if ($como) { ?>
<section id="comments">
    <header>
        <h1>Comments</h1>
    </header>
    <div id="child">
        <?php foreach($comments as $comm)   {?>
        <label><?php echo $comm["name"]; ?></label>
        <div>
            <p><?php echo $comm["comments"]; ?></p>
        </div>
        <?php } ?>
    </div>
</section>
<?php }  ?>
<?php include("footer.php"); ?>