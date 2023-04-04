<?php $title = "Edit Page";
include("header.php"); ?>

<?php
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}

$flag = true;
if (isset($_POST['insert']) && $login) {
    $checkID = $_POST['id'];
    $checkResult = mysqli_query($database, "select * from games where id= $checkID;");
    $checkRow = mysqli_fetch_assoc($checkResult);


    if ($_FILES['files']['error'] == 0) {
        $file_name = $_FILES['files']['name'];
        $file_type = $_FILES['files']['type'];
        $file_size = $_FILES['files']['size'];
        $file_temp_loc = $_FILES['files']['tmp_name'];
        $file_path = "Img/Games/" . $file_name;


        if ($file_size > 5000000) {
            echo "The picture is too big!!";
        } else
            $out = move_uploaded_file($file_temp_loc, $file_path);
    } else {
        $file_path = $checkRow['img'];
    }


    $id = $_POST['id'];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $Categories = $_POST["Categories"];
    $description = $_POST["description"];

    $result = mysqli_query($database, "update games SET name = '$name', price = $price, img = '$file_path', categories = '$Categories' , description = '$description' WHERE id = $id;");
    if ($result) {
        $flag = false;
    }
} else {
    $result = mysqli_query($database, "Select * from games");
    while ($row = mysqli_fetch_assoc($result)) {
        $stuff[$row['id']] = array('name' => $row["name"], 'id' => $row["id"]);
    }
}
?>
<section class="warpper">
    <?php if ($flag == true && $login) { ?> <form action="EditAdmin.php" method="post" enctype="multipart/form-data">
        <h2>Edit Game</h2>
        <label for="name">Select the game </label>
        <select name="id">
            <option value=""></option>
            <?php foreach ($stuff as $id) { ?>
            <option value="<?php echo $id['id'] ?>"><?php echo $id['name'] ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="name">Name </label>
        <input name="name" id="name" type="name">
        <br>
        <label for="price">Price </label>
        <input name="price" id="price" type="number">
        <br>
        <label for="files">image</label>
        <input name="files" id="files" type="file" accept="image/*">
        <br>
        <label for="Categories">Categories </label>
        <select name="Categories" id="Categories">
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
        </select>
        <label for="description">description</label>
        <textarea name="description" cols="30" rows="8"></textarea>
        <button type="submit" name="insert">Insert</button>
    </form>
    <?php  }  else if ($flag == false) echo "<h1>Done</h1>"; ?>

</section>

<?php include("footer.php"); ?>