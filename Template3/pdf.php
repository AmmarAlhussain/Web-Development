<?php
include("database.php");
session_start();
if (isset($_SESSION["id"])) {
    $userid10 = $_SESSION["id"];
    $query = "SELECT g.name,g.img,CAST(IFNULL((1-s.discount)*g.price,g.price) AS int) AS disc_price, c.ID FROM carts c JOIN users u ON c.user_id = u.ID JOIN games g ON c.game_id = g.id LEFT JOIN offers s ON s.game_id=g.ID WHERE u.id = $userid10;";
    $result =  mysqli_query($database, $query);
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $container[] = array("discount" => $row['disc_price'], "name" => $row["name"], "img" => $row["img"], "id" => $row["ID"]);
        $total +=  $row['disc_price'];
        $cart = true;
    }
}
?>

<?php
include('library/tcpdf.php');
$pdf = new tcpdf('p','mm','A4');

$pdf->AddPage();
$pdf->SetFont('helvetica','B',20);
$pdf->Cell(0,50,'Bonus Store',0,1,'C');
$pdf->Cell(95,20,"Game",1,0,'C');
$pdf->Cell(95,20,"Price",1,1,'C');

$pdf->SetFont('helvetica','B',16);
foreach ($container as $id) {
    $N = $id["name"];
    $P = $id['discount'];
    $pdf->Cell(95,20,"{$N}",1,0,'C');
    $pdf->Cell(95,20,"{$P}",1,1,'C');
}
$pdf->SetFont('helvetica','B',20);
$pdf->Cell(95,20,"Total",1,0,'C');
$pdf->Cell(95,20,"{$total}",1,1,'C');

$date = date('d-m-y');
$pdf->Cell(190,30,"Date: {$date}",0,1,'R');
ob_end_clean();
$pdf->Output('buy.pdf','D');
?>