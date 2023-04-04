<?php $title = "Delete Offer";
include("header.php");
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}

$query = 'SELECT * FROM games g join offers o on g.id = o.game_id;';
$result = mysqli_query($database, $query);
$flag = true;
if (isset($_POST['gameName'])) {
    $flag = false;
    $id = $_POST["gameName"];
    $query2 = "delete FROM offers WHERE game_id = '$id'";
    mysqli_query($database, $query2);
}
?>
<section class="warpper">

    <?php if ($flag == true) { ?>
    <form action="deleteOffer.php" method="post">
        <h2>Delete offer</h2>
        <label for="select">Select Game</label>
        <select name="gameName">
            <option> </option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
            <?php } ?>
        </select>
        <button type="submit" name="del">Delete Offer</button>
    </form>
    <?php  }
    else if ($flag == false) echo "<h1>Offer Deleted</h1>";
    ?>

</section>

<?php include("footer.php"); ?>