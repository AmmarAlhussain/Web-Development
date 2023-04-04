<?php $title = "Add Page";
include("header.php"); ?>
<?php
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}
$flag = true;
if (isset($_POST["Add"]) && $login) {
    $file_name = $_FILES['files']['name'];
    $file_type = $_FILES['files']['type'];
    $file_size = $_FILES['files']['size'];
    $file_temp_loc = $_FILES['files']['tmp_name'];
    $file_path = "Img/Games/" . $file_name;

    if ($file_size > 5000000) {
        echo "The picture is too big!!";
    } else if ($_FILES['files']['error'] > 0) {
        echo "Could not upload the file";
    } else {
        $out = move_uploaded_file($file_temp_loc, $file_path);
    }


    $flag = false;
    $name = $_POST["name"];
    $price = $_POST["price"];
    $Categories = $_POST["Categories"];
    $description = $_POST["description"];
    $result = mysqli_query($database, "SELECT  MAX(id) FROM games;");
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['MAX(id)'] + 1;
        $query2 = "insert into games (id, name , price , img , Categories , description) values ($id,'$name',$price,'$file_path','$Categories','$description')";
        $result2 = mysqli_query($database, $query2);
    }
}
?>
<section class="warpper">
    <?php if ($flag == true && $login) { ?> <form action="AddAdmin.php" method="post" enctype="multipart/form-data">
        <h2>Add Game</h2>
        <label for="name">Name of game </label>
        <input name="name" id="name" type="text">
        <br>
        <label for="price">Price </label>
        <input name="price" id="price" type="number">
        <br>
        <label for="file">image </label>
        <input name="files" id="files" type="file" accept="image/*">
        <br>
        <label for="Categories">Categories </label>
        <select name="Categories" id="Categories">
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
        </select>
        <label for="description">description</label>
        <textarea name="description" cols="30" rows="10"></textarea>
        <button type="submit" name="Add">Insert</button>
    </form>
    <?php  } else if ($flag == false) echo "<h1>Inserted</h1>"; ?>

</section>

<?php include("footer.php"); ?>