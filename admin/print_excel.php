<?php
include('../connection.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Voter ID');
$sheet->setCellValue('C1', 'EMAIL');
 
$query = mysqli_query($koneksi,"select * from konfirmasi");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['voter_id']);
	$sheet->setCellValue('C'.$i, $row['email']);
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Voting.xlsx');
?>