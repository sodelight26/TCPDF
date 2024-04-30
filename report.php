<?php

require_once('vendor/autoload.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        // Logo
        // $this->Image(dirname(__FILE__).'/images/mym.png', 175, 5, 18);
        // Set font

        $this->SetFont('helvetica', '', 14);

        $this->SetX(145);
        $this->Cell(130, 20, 'no.2', 0, false, 'R');

    }
}


// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('หลักฐานการจ่ายเงินค่าใช้จ่ายเดินทางไปปฏิบัติงาน');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header
$pdf->setPrintHeader(true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage('L', 'A4');

// Print text
$pdf->SetX(20);

$pdf->SetFont('helvetica', 'B', 12);

$pdf->Cell(0, 10, 'HEADING 1', 0, 1, 'C');

$pdf->Cell(0, 10, 'Department name .....................................................................................', 0, 1, 'C');
$pdf->Cell(0, 10, 'expense form. ............................... date ............. month .......................B.E................ ', 0, 1, 'C');
$pdf->SetFont('helvetica',  14);
//table
$tableHtml = '<table border="0.1" style="width: 100%; font-size: 14px; text-align: center; overflow-x: auto;">
<tr style="font-size: 14px; text-align: center; ">
    <td rowspan="2">No</td>
    <td rowspan="2">Name - Surname</td>
    <td rowspan="2">Position</td>
    <td colspan="4">Expenses</td>
    <td rowspan="2">Sum</td>
    <td rowspan="2">Signature</td>
    <td rowspan="2">Day Month Year</td>
    <td rowspan="2">Note</td>
</tr>
<tr style="font-size: 14px; text-align: center;">
    <td>Allowance</td>
    <td>Rental</td>
    <td>Expenses</td>
    <td>Other</td>
</tr>
<tr style="font-size: 14px; text-align: center; ">
    <td>1</td>
    <td>John Doe</td>
    <td>Employees</td>
    <td>100</td>
    <td>200</td>
    <td>50</td>
    <td>75</td>
    <td>425</td>
    <td>John\'s Signature</td>
    <td>22/10/2023</td>
    <td>Some notes here</td>
</tr>
<tr style="font-size: 14px; text-align: center;">
    <td>1</td>
    <td>John Doe</td>
    <td>Employees</td>
    <td>100</td>
    <td>200</td>
    <td>50</td>
    <td>75</td>
    <td>425</td>
    <td>John\'s Signature</td>
    <td>22/10/2023</td>
    <td>Some notes here</td>
</tr>
<tr style="font-size: 14px; text-align: center; font-weight: bold; ">
    <td colspan="3">Expenses</td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
    <td colspan="3">Contract...............Dated...........</td>
</tr>
<!-- Add more rows as needed -->
</table>';
$pdf->writeHTML($tableHtml);
$pdf->ln();
// $pdf->SetX(35);
// $pdf->SetX(150);    
$pdf->Cell(155, 0, 'Total amount (in letters) ...........................................', 0, 0, 'C');
$pdf->Cell(150, 0, 'sign .............................. payer', 0, 1, 'C');

$pdf->Cell(460, 0, '( .......................................... )', 0, 1, 'C');
$pdf->SetX(20);
$pdf->SetFont('helvetica', 14);

// Set Y position for MultiCell
$multiCellY = $pdf->GetY();
$pdf->SetX(15);
$pdf->MultiCell(195, 0, 'Explanation 1. For studies alone, attach only part 1, and in the case of group travel, attach part 2 if the travel period begins or ends in consideration.', 0, 'L');

// Reset the Y position and set X for the following Cell
$pdf->SetXY(210, $multiCellY);
$pdf->Cell(0, 0, 'position.................................', 0, 1, 'C');
$pdf->Cell(460, 0, 'date..................................', 0, 1, 'C');

$pdf->SetX(42);
$pdf->MultiCell(185, 0, '2. For allowances and accommodation rentals, specify the day rate and number of days requested for withdrawal for each person in the notes box.', 0, 'L');
$pdf->SetX(42);
$pdf->MultiCell(185, 0, '3. Each eligible person must sign the name of the recipient of the money and the date of receipt of the money. In the case of receiving from a loan Specify the date you received the loan.', 0, 'L');
$pdf->SetX(42);
$pdf->MultiCell(185, 0, "4. The payer means the person who borrows money from the government. and paid the loan to each traveler. Be the person who signs the payer's name.", 0, 'L');


$pdf->Output('หลักฐานการจ่ายเงินค่าใช้จ่ายเดินทางไปปฏิบัติงาน.pdf', 'I');
$pdf->AddPage('L', 'A4');
$pdf->Close();
