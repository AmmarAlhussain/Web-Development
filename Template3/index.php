<?php
$title = "Bonus Store";
include("header.php");
$query = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM Games g JOIN Offers s ON s.game_id=g.id";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $offers[$row["id"]] = array("discount" => $row['discount'], "name" => $row["name"], "new price" => $row["disc_price"], "price" => $row["price"], "img" => $row["img"]);
}
$query2 = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id ORDER BY g.timesBought DESC LIMIT 10;";
$result2 = mysqli_query($database, $query2);
while ($row = mysqli_fetch_assoc($result2)) {
    $salles[$row["id"]] = array("name" => $row["name"], "price" => $row["disc_price"], "img" => $row["img"]);
} ?>

<section id="container">
    <div id="background"></div>
    <article class="games">
        <header>
            <h2>Offers</h2>
        </header>
        <div class="gameImg">
            <?php foreach ($offers as $id => $value) { ?>
            <a href="add.php?id=<?php echo $id; ?>" class="imgDisplay"
                discount="<?php echo ($value["discount"] * 100) . "%"; ?>">
                <img src="<?php echo ($value["img"]); ?>" alt="<?php echo $value["name"] ?>">
                <div>
                    <h4><del><?php echo ($value["price"]); ?></del><span><?php echo $value["new price"]; ?></span>
                    </h4>
                </div>
            </a>
            <?php } ?>
            <i class=" fas fa-chevron-left"></i>
            <i class="fas fa-chevron-right"></i>
        </div>
    </article>

    <article class="games">
        <header>
            <h2>Best Sales</h2>
        </header>
        <div class="gameImg">
            <?php foreach ($salles as $id => $value) { ?>
            <a href="add.php?id=<?php echo $id; ?>" class=" imgDisplay">
                <img src="<?php echo ($value["img"]); ?>" alt="<?php echo $value["name"] ?>">
                <div>
                    <h4><?php echo  $value["price"]; ?></h4>
                </div>
            </a>
            <?php } ?>
            <i class="fas fa-chevron-left"></i>
            <i class="fas fa-chevron-right"></i>
        </div>
    </article>
    <article class="intro">
        <header>
            <h2>Services</h2>
            <p>Bonus Store is a unique store that provides</p>
            <div id="services">
                <div>
                    <h3> <i class="fas fa-exchange-alt"></i> Exchange Games</h3>
                </div>
                <div>
                    <h3> <i class="fas fa-percent"></i> Discount up to 100% on games</h3>
                </div>
                <div>
                    <h3> <i class="fas fa-gamepad"></i> Exclusive Games</h3>
                </div>
                <div>
                    <h3>Coming soon</h3>
                </div>
            </div>
        </header>
    </article>
</section>
<?php include("footer.php"); ?>