<?php $title = "Delete Page";
include("header.php");
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}
$query = 'SELECT * FROM games';
$result = mysqli_query($database, $query);
$flag = true;
if (isset($_POST['gameName'])) {
    $flag = false;
    $id = $_POST["gameName"];
    $query2 = "delete FROM games WHERE id = '$id'";
    mysqli_query($database, $query2);
}
?>
<section class="warpper">

    <?php if ($flag == true && $login) { ?>
    <form action="deleteAdmin.php" method="post">
        <h2>Delete Game</h2>
        <label for="select">Select Game</label>
        <select name="gameName">
            <option> </option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
            <?php } ?>
        </select>
        <button type="submit" name="del">Delete</button>
    </form>
    <?php  } else if ($flag == false) echo "<h1>Deleted</h1>"; ?>

</section>

<?php include("footer.php"); ?>