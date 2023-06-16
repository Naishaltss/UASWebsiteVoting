<?php
include('../connection.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from konfirmasi");
$html = '<center><h3>PDF Report</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Voter ID</th>
 <th>Email</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['voter_id']."</td>
 <td>".$row['email']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporanvoting.pdf');
?>