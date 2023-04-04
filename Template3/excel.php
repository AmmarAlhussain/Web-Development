<?php $title ="Excel"; include("header.php"); ?>

<?php
if (!$login || !$admin) {
    header('Location: HTTP/1.0 401 ');
    exit;
}

else {
$query = "SELECT *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM Games g LEFT JOIN Offers s ON s.game_id=g.id";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $information[] = array("id" => $row["id"], "name" => $row["name"], "price" => $row["price"],"timesBought"=>$row["timesBought"],"categories"=>$row["categories"],"discount" => $row['discount']*100,"price after discount" => $row["disc_price"]);
}
}
?>
<section class="warpper">
    <h1>Information About Games</h1>
    <table>
        <thead>
            <tr>
                <?php foreach($information[0] as $counter2 => $counter3) { ?>
                <th><?php echo $counter2; ?> </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($information as $counter1) { ?>
            <tr>
                <?php foreach($counter1 as $counter2 => $counter3) { ?>
                <td><?php if($counter2 == "discount") echo '%'.$counter3;  else echo $counter3; ?> </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="<?php echo count($information[0]); ?>">Number of
                    Games <?php echo count($information); ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <a href="excel1.php">Generate Excel Sheet</a>
</section>
<?php include("footer.php"); ?>