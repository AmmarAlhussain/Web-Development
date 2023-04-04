<?php $title = "Add Offer";
include("header.php");
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}

$flag = true;
$query = "SELECT g.id, g.name from games g LEFT JOIN offers o on g.id = o.game_id where o.game_id IS NULL AND  g.id IS NOT NULL;";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $games[] = array('name' => $row["name"], 'id' => $row["id"]);
}
?>

<?php
if (isset($_POST["submit"])) {
    $flag = false;
    $discount = $_POST["number"] / 100;
    $gameID = $_POST["id"];
    $add = mysqli_query($database, "INSERT INTO offers (game_id, discount) values ($gameID, $discount);");
}
?>

<section class="warpper">
    <?php if ($flag) { ?> <form action="addOffer.php" method="post">
        <h2>Add Offer</h2>
        <label for="name">Select Game</label>
        <br>
        <select name="id" id="select">
            <option value=""></option>
            <?php foreach ($games as $id) { ?>
            <option value="<?php echo $id['id']; ?>"><?php echo $id['name']; ?></option>
            <?php } ?>
        </select>
        <label for="discount">Decount Percentage</label>
        <input type="range" name="number" min="0" max="100" onchange="updateTextInput(this.value);">
        <input type="text" id="textnumber" value="50%" readonly>

        <button type="submit" name="submit">Add Offer</button>
    </form>
    <?php  }  
    else if ($flag == false) echo "<h1>Offer Added</h1>";
    else echo "<h1>Something Wrong Happens Try Again Later</h1>"; ?>

</section>

<?php include("footer.php"); ?>