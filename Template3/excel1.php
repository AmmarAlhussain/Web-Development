    <?php
include("database.php");
$query = "SELECT *, CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price FROM Games g LEFT JOIN Offers s ON s.game_id=g.id";
$result = mysqli_query($database, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $information[] = array("id" => $row["id"], "name" => $row["name"], "price" => $row["price"],"timesBought"=>$row["timesBought"],"categories"=>$row["categories"],"discount" => $row['discount'],"price after discount" => $row["disc_price"]);
}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=BonusStore.xls");
?>
    <style>
table,
td,
tr,
th {
    border: 1px solid black;
    text-align: center;
}
    </style>
    <table>
        <thead>
            <tr>
                <?php foreach($information as $counter1) { ?>
                <?php foreach($counter1 as $counter2 => $counter3) { ?>
                <th><?php echo $counter2; ?> </th>
                <?php } break; } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($information as $counter1) { ?>
            <tr>
                <?php foreach($counter1 as $counter2 => $counter3) { ?>
                <td>
                    <?php if($counter2 == "discount") echo "%".($counter3*100); else echo $counter3; ?> </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="<?php echo count($information[0]); ?>">Number of Games
                    <?php echo count($information); ?>
                </td>
            </tr>
        </tfoot>
    </table>