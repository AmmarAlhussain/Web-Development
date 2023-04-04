<?php $title = "Admin Page";
include("header.php");
if (!$login || !$admin) {
        header('Location: HTTP/1.0 401 ');
        exit;
}

?>

<div id="AdminWrapper">
    <a href="AddAdmin.php">Add Game</a>
    <a href="EditAdmin.php">Edit Game</a>
    <a href="deleteAdmin.php">Delete Game</a>
    <a href="acceptAdmin.php">Tradeing Requests</a>
    <a href="excel.php">Download Excel Sheet</a>
    <a href="addOffer.php">Add Offer </a>
    <a href="deleteOffer.php">Delete Offer</a>
</div>


<?php include("footer.php"); ?>