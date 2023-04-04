<?php
$title = "Games";
include("header.php");
$query = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id";
if (isset($_GET["sort"])) {
    switch ($_GET["sort"]) {
        case 1:
            $query = 'select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id  order by disc_price asc';
            break;
        case 2:
            $query = 'select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id  order by disc_price desc';
            break;
        case 3:
            $query = 'select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id  where categories = "Action"';
            break;
        case 4:
            $query = 'select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id  where categories = "Adventure"';
            break;
        default:
            $query = "select *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM games g LEFT JOIN offers s ON s.game_id=g.id";
    }
}
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $stuff[$row["id"]] = array("name" => $row['name'], "price" => $row["disc_price"], "img" => $row["img"]);
}
?>
<section id="container">
    <header>
        <h2>Games</h2>
    </header>
    <form action="games.php" method="Get">
        <button>Fillter</button>
        <select name="sort" id="">
            <option value="">sort by</option>
            <option value="1">Low to High</option>
            <option value="2">High to low</option>
            <option value="3">Action</option>
            <option value="4">Adventure</option>
        </select>

    </form>
    <div id="box">
        <?php foreach ($stuff as $id => $value) { ?>
        <a href="add.php?id=<?php echo $id; ?>">
            <img src="<?php echo $value["img"] ?>" alt="">
            <div>
                <h4><?php echo $value["price"] ?></h4>
            </div>
        </a>
        <?php } ?>
    </div>
</section>
<?php include("footer.php"); ?>