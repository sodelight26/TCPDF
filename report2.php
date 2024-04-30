<?php
require_once('vendor/autoload.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        $this->SetFont('helvetica', '', 11);
        $this->Setxy(0,2); 
        $this->Cell(0, 1, 'Agreement  Number _______________ Name ______________', 0, 1, 'C');

        $this->SetFont('helvetica', 'B', 14);
        $this->SetLineWidth(0.5); 
        $this->SetLineWidth(0.5);
        $this->Rect(183, 7, 15, 6, 'D'); 
        $this->Cell(190, 6, 'no.1', 0, false, 'R');

        $this->Setx(0);
        $this->SetFont('helvetica', 'B', 14);
        $this->Cell(0, 8, 'Reimbursement for travel expenses for work', 0, 1, 'C');
        
        $this->SetFont('helvetica', '', 11);
        $this->Cell(0, 8, 'date ........... month ...................B.E.............', 0, 1, 'R');

    }
}

// Create a new PDF document
$pdf = new MYPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Author Name');
$pdf->SetTitle('Your Document Title');
$pdf->SetSubject('Your Subject');
$pdf->SetKeywords('Keywords, Here');

// Set header
$pdf->setPrintHeader(true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// Set margins
$pdf->SetMargins(5, PDF_MARGIN_TOP, 5);

// Set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(0, 0, 'Subject: Requesting approval to reimburse travel expenses for work', 0, 1, 'L');
$pdf->Cell(0, 0, 'learn________________________________________________', 0, 1, 'L');
$pdf->Setx(35);
$pdf->Cell(0, 6, 'According order/record_________________________ dated ________________ approved', 0, 1, 'L');
$pdf->Cell(0, 6, 'I am __________________________________ Position _______________ Affiliation _______________________', 0, 1, 'L');
$pdf->Cell(0, 6, 'along with _____________________________________ traveling to work at ______________________________', 0, 1, 'L');

// Add checkboxes
$options = array();

$pdf->Cell(0, 6, 'By the exit from', 0, 1, 'L');
$pdf->Ellipse(36, 58, 1.5, 1.5);
$pdf->Text(38, 55.5, 'house'); // Add 'X' behind the checkbox

$pdf->Ellipse(52, 58, 1.5, 1.5);
$pdf->Text(54, 55.5, 'office');

$pdf->Ellipse(67, 58, 1.5, 1.5);
$pdf->Text(69, 55.5, 'Thailand');

$pdf->Text(85, 55.5, 'From the date of______ month ________ B.E. _____ time ______ hrs.');

$pdf->ln();
$pdf->Cell(0, 6, 'and returned to', 0, 1, 'L');
$pdf->Ellipse(36, 63.6, 1.5, 1.5);
$pdf->Text(38, 61, 'house'); // Add 'X' behind the checkbox

$pdf->Ellipse(52, 63.6, 1.5, 1.5);
$pdf->Text(54, 61, 'office');

$pdf->Ellipse(67, 63.6, 1.5, 1.5);
$pdf->Text(69, 61, 'Thailand');

$pdf->Text(86, 61, 'date______ month ________ B.E. _____ time ______ hrs.');

$pdf->Setx(5);
$pdf->Cell(0, 15 , 'Total time for this inspection _____________ days _____________ hours', 0, 1, 'L');
$pdf->Setxy(30,71);
$pdf->Cell(0, 0 , 'I would like to request reimbursement for travel expenses for work.', 0, 1, 'L');

$pdf->Ellipse(150, 74, 1.5, 1.5);
$pdf->Text(152, 71, 'me');


$pdf->Ellipse(162, 74, 1.5, 1.5);
$pdf->Text(164, 71, 'party');

$pdf->Text(175, 71, 'As follows:');
$pdf->ln();
$pdf->Cell(0, 0, 'Travel allowance type ___________________________ day', 0, 0, 'L');
$pdf->Setx(145);
$pdf->Cell(0, 0, 'Total _________________ baht', 0, 1, 'L');

$pdf->Cell(0, 0, 'Accommodation rental fees _________________ number of ___________ days', 0, 0, 'L');
$pdf->Setx(145);
$pdf->Cell(0, 0, 'Total _________________ baht', 0, 1, 'L');

$pdf->Cell(0, 0, 'Accommodation rental fees _________________ number of ___________ days', 0, 0, 'L');
$pdf->Setx(145);
$pdf->Cell(0, 0, 'Total _________________ baht', 0, 1, 'L');

$pdf->Cell(0, 0, 'Transportation cost_________________Baht Other expenses__________ Baht', 0, 0, 'L');
$pdf->Setx(145);
$pdf->Cell(0, 0, 'Total _________________ baht', 0, 1, 'L');

$pdf->ln();
$pdf->Cell(0, 0, '(character) _______________________________________________', 0, 0, 'L');

$pdf->ln();
$pdf->Cell(0, 10, 'I hereby certify that the above items are true.', 0, 0, 'C');

$pdf->ln();
$pdf->Setx(145);
$pdf->Cell(0, 10, 'Signed _________________ Person', 0, 0, 'C');

//ตาราง
$pdf->Line(5, 130, 205, 130);
$pdf->Line(100, 130, 100, 240); // เส้นตรงแนวตั้ง

$pdf->ln();
$pdf->ln();
$pdf->Cell(100, 0, 'learn  ______________________________', 0, 0, 'C');

$pdf->SetFont('helvetica', 'B', 11); // ตั้งความหนาเป็น 12
$pdf->Cell(65, 0, 'Approved to pay', 0, 1, 'R');

$pdf->ln();
$pdf->SetFont('helvetica', '', 11); 
$pdf->MultiCell(96, 0, 'Have examined the evidence of disbursement of money attached.', 0, 'L');

$pdf->Cell(0, 0, 'Money _______________ Year ________', 0, 1, 'L');
$pdf->Cell(0, 0, 'Amount _________________________Baht', 0, 1, 'L');


$pdf->ln();
$pdf->Setx(10);
$pdf->Cell(105, 0,'sign1 __________________________', 0, 0, 'L');
$pdf->Cell(75, 0, 'sign __________________________', 0, 1, 'R');


$pdf->Setx(10);
$pdf->Cell(105, 6,'( ______________________________ )', 0, 0, 'L');
$pdf->Cell(80, 6, '( ______________________________ )', 0, 1, 'R');

$pdf->Setx(10);
$pdf->Cell(105, 6,'position _______________________', 0, 0, 'L');
$pdf->Cell(75, 6, 'position _______________________', 0, 1, 'R');

$pdf->Setx(15);
$pdf->Cell(105, 6,'date _______________________', 0, 0, 'L');
$pdf->Cell(70, 6, 'date _______________________', 0, 1, 'R');

$pdf->Line(5, 200, 205, 200);
$pdf->ln();
$pdf->ln();

$pdf->Setx(5);
$pdf->Cell(105, 6,'received the amount _____________ baht is correct.', 0, 0, 'L');
$pdf->ln();
$pdf->ln();
$pdf->Cell(105, 6,'Signed ______________________ Recipient', 0, 0, 'L');
$pdf->Cell(90, 6,'Signed ______________________ Recipient', 0, 1, 'R');

$pdf->Cell(75, 6, '( ______________________________ )', 0, 0, 'R');
$pdf->Cell(115, 6, '( ______________________________ )', 0, 1, 'R');

$pdf->Cell(70, 6,'date _______________________', 0, 0, 'R');
$pdf->Cell(115, 6, 'date _______________________', 0, 1, 'R');

$pdf->ln();
$pdf->ln();
$pdf->SetFont('helvetica', 'B', 11); // ตั้งความหนาเป็น 12
$pdf->Cell(105, 6,'annotation __________________________________________________________________________', 0, 0, 'L');


// Output the PDF as a download (I) or save (F)
$pdf->Output('output.pdf', 'I');
?>