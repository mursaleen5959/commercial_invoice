<?php
////////////////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function insert_cell($pdf, $X = 0, $Y = 0, $CellWidth = 0, $CellHeight = 0, $text, $border = 0, $alignment = 'L')
{
    $pdf->SetY($Y);
    $pdf->SetX($X);
    $pdf->Cell($CellWidth, $CellHeight, $text, $border, 0, $alignment);
}


function wh_log($log_msg)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) {
        // create directory/folder uploads.
        mkdir($log_filename, 777, true);
    }
    $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';
    // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
//wh_log("this is my log message");

if (isset($_POST['Generate']) || 1==1) {

    // $exporter = $_POST['exporter'];
    // $consignee = $_POST['consignee'];
    // $buyerNotConsignee = $_POST['buyerNotConsignee'];
    // $invoiceNumber = $_POST['invoiceNumber'];
    // $invoiceDate = $_POST['invoiceDate'];
    // $awbBL = $_POST['awbBL'];
    // $purchaseOrder = $_POST['purchaseOrder'];
    // $reference = $_POST['reference'];
    // $methodDispatch = $_POST['methodDispatch'];
    // $typeShipment = $_POST['typeShipment'];
    // $countryOriginGoods = $_POST['countryOriginGoods'];
    // $countryFinalDestination = $_POST['countryFinalDestination'];
    // $packages = $_POST['packages'];
    // $totalGrossWeight = $_POST['totalGrossWeight'];
    // $termsOfSale = $_POST['termsOfSale'];
    // $from = $_POST['from'];
    // $dateOfDeparture = $_POST['dateOfDeparture'];
    // $destination = $_POST['destination'];
    // $finalDestination = $_POST['finalDestination'];
    // $insurancePolicy = $_POST['insurancePolicy'];
    // $letterOfCredit = $_POST['letterOfCredit'];



    $exporter = 'Shenzhen Tonghua Weiye Technology Co., Ltd.
No.92 Fukang Road, Henggang Street Flat B,
5 Floor, Yaoxiang Industrial Building,
Shenzhen, Guangdong, Longgang District
518115 CN';
    $consignee = 'DXB6 - CEVA AFT-X (Dubai, AE)
National Industries Park,
Plot number: TP10104C and TP10104D
Dubai, Province of Dubai 00000
AE (DXB6)';
    $buyerNotConsignee = 'UGUR CELTIKCI
HIZIRBEY CD
FORTIS SINANLI B BLOK NO 25A D 106
KADIKOY ISTANBUL
Turkey 34720
+905445949233';
    $invoiceNumber = '32529';
    $invoiceDate = '16 Sep 2022';
    $awbBL = '97699059';
    $purchaseOrder = '152409066001020196';
    $reference = '1BD8ZR4L';
    $methodDispatch = 'Expres Shipping';
    $typeShipment = 'Expedited';
    $countryofOriginofGoods = 'China';
    $countryFinalDestination = 'United Arab Emirates';
    $packages = '2';
    $totalGrossWeight = '36';
    $termsOfSale = 'Prepayment
Duties and Taxes Payable by Buyer';
    $from = 'Shenzen';
    $dateOfDeparture = '25 Oct 2022';
    $destination = 'Dubai';
    $finalDestination = 'Dubai, UAE';
    $insurancePolicy = 'NA';
    $letterOfCredit = 'NA';
    $paymentCurrency = 'USA';
    $beneficiaryAccountNumber = '101417 34247877';
    $swiftCode = 'HASSGSGXXX or CHASSGSG';
    $beneficiaryCountry = 'Singapore';
    $beneficiaryName = 'Shenzhen Tonghua Weiye Technology Co., Ltd.';
    $beneficiaryAddress = '8 Shenton Way, #45-01, AXA Tower, Singapore 068811';
    $beneficiaryBank = 'JPMorgan Chase Bank N.A., Singapore Branch';
    $beneficiaryBankAddress = '168 Robinson Road, Capital Tower 17-00, Singapore 068912';
    $bankCode = '7153';
    $branchCode = '001';
    $freight = '224';
    $consigmentTotal = '632';
    $total = '$632';
    $incoterms2020 = 'DDP';
    $currencyCode = 'USD';
    $signatureCompany = 'Shenzhen Tonghua Weiye Technology Co., Ltd.';
    $nameofsignatory = 'Judy Zhu';
    $signature = 'src/black.png';
    $stamp = 'src/black.png';

    $productCode = array('TD10020-YD-YR',"23423dsf");
    $descGoods = array('CORNMI Electric Milk Frother, 4 in 1 Automatic Milk Warmer and Foam Maker for Latte&Cappucino&Hot Chocolates',"2nd Product");
    $hsCode = array('8516.79.70',"234");
    $noUnits = array('24',"2345");
    $unitMeasure = array('PCS',"ewr");
    $unitValue = array('17',"34");
    $amount = array('408',"4rwef");


    /* Necessary File includes */
    require_once('fpdf/fpdf.php');
    require_once('fpdf/extension.php');

    /* ********************** */
    ob_start();
    // PDF Object
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->AddFont("Minion",'','MinionPro-Regular.php');
    $pdf->AddFont("MinionBold",'','MinionPro-Bold.php');

//    $pdf->Image('src/realtone.jpeg', 74, 21, 30, 0);
    $pdf->Image('src/black.png', 75, 21, 0, 20);
    $pdf->SetMargins(0, 0, 0);

    /* Template Cells include */
    require_once("template_cells.php");
    /* ********************** */

    // Exporter
    $pdf->SetFont('MinionBold', '', 8);
    $pdf->SetY(25);
    $pdf->SetX(14.5);
    $pdf->MultiCell(60, 3.4, $exporter, 0, 'L');
    // Consignee
    $pdf->SetY(52.4);
    $pdf->SetX(14.5);
    $pdf->MultiCell(60, 3.5, $consignee, 0, 'L');
    // Buyer (If not consignee)
    $pdf->SetY(53);
    $pdf->SetX(105);
    $pdf->MultiCell(60, 3.5, $buyerNotConsignee, 0, 'L');
    // Invoice Number & Date
    insert_cell($pdf, $X = 105, $Y = 34.7, $CellWidth = 20, $CellHeight = 3, $text = $invoiceNumber, $border = 0, $alignment = 'L');
    insert_cell($pdf, $X = 127, $Y = 34.7, $CellWidth = 20, $CellHeight = 3, $text = $invoiceDate, $border = 0, $alignment = 'L');
    // AWB / BL
    insert_cell($pdf, $X = 150, $Y = 34.7, $CellWidth = 20, $CellHeight = 3, $text = $awbBL, $border = 0, $alignment = 'L');
    // Purchase order
    insert_cell($pdf, $X = 105, $Y = 44, $CellWidth = 20, $CellHeight = 3, $text = $purchaseOrder, $border = 0, $alignment = 'L');
    // Reference
    insert_cell($pdf, $X = 150, $Y = 44, $CellWidth = 20, $CellHeight = 3, $text = $reference, $border = 0, $alignment = 'L');
    // Method of dispatch
    insert_cell($pdf, $X = 15, $Y = 79, $CellWidth = 20, $CellHeight = 3, $text = $methodDispatch, $border = 0, $alignment = 'L');
    // Type of shipment
    insert_cell($pdf, $X = 59.5, $Y = 79.5, $CellWidth = 20, $CellHeight = 3, $text = $typeShipment, $border = 0, $alignment = 'L');
    // Country of origin of goods
    insert_cell($pdf, $X = 105, $Y = 79.5, $CellWidth = 20, $CellHeight = 3, $text = $countryofOriginofGoods, $border = 0, $alignment = 'L');
    // Country of Final Destination
    insert_cell($pdf, $X = 150, $Y = 79.5, $CellWidth = 20, $CellHeight = 3, $text = $countryFinalDestination, $border = 0, $alignment = 'L');
    // No. of packages
    insert_cell($pdf, $X = 37, $Y = 86, $CellWidth = 20, $CellHeight = 3, $text = $packages, $border = 0, $alignment = 'L');
    // Total Gross Weight
    insert_cell($pdf, $X = 72, $Y = 87, $CellWidth = 20, $CellHeight = 3, $text = $totalGrossWeight, $border = 0, $alignment = 'L');
    // From
    insert_cell($pdf, $X = 15, $Y = 94, $CellWidth = 20, $CellHeight = 3, $text = $from, $border = 0, $alignment = 'L');
    // Date of Departure
    insert_cell($pdf, $X = 60, $Y = 95, $CellWidth = 20, $CellHeight = 3, $text = $dateOfDeparture, $border = 0, $alignment = 'L');
    // Terms of sale
    $pdf->SetY(87);
    $pdf->SetX(105);
    $pdf->MultiCell(80, 5, $termsOfSale, 0, 'L');
    // Destination
    insert_cell($pdf, $X = 15, $Y = 103, $CellWidth = 20, $CellHeight = 3, $text = $destination, $border = 0, $alignment = 'L');
    // Final Destination
    insert_cell($pdf, $X = 60, $Y = 103, $CellWidth = 20, $CellHeight = 3, $text = $finalDestination, $border = 0, $alignment = 'L');
    // Insurance Policy No
    insert_cell($pdf, $X = 106, $Y = 103, $CellWidth = 20, $CellHeight = 3, $text = $insurancePolicy, $border = 0, $alignment = 'L');
    // Letter of Credit no
    insert_cell($pdf, $X = 150, $Y = 103, $CellWidth = 20, $CellHeight = 3, $text = $letterOfCredit, $border = 0, $alignment = 'L');
    // Freight
    insert_cell($pdf, $X = 180, $Y = 208, $CellWidth = 20, $CellHeight = 3, $text = $freight, $border = 0, $alignment = 'L');
    // Consignment Total
    insert_cell($pdf, $X = 180, $Y = 212, $CellWidth = 20, $CellHeight = 3, $text = $consigmentTotal, $border = 0, $alignment = 'L');
    // Total
    insert_cell($pdf, $X = 180, $Y = 217, $CellWidth = 20, $CellHeight = 3, $text = $total, $border = 0, $alignment = 'L');
    // Currency Code
    insert_cell($pdf, $X = 177, $Y = 224, $CellWidth = 20, $CellHeight = 3, $text = $currencyCode, $border = 0, $alignment = 'L');
    // Incoterms 2020
    insert_cell($pdf, $X = 105, $Y = 224, $CellWidth = 20, $CellHeight = 3, $text = $incoterms2020, $border = 0, $alignment = 'L');
    // Signatory company
    insert_cell($pdf, $X = 106, $Y = 232, $CellWidth = 20, $CellHeight = 3, $text = $signatureCompany, $border = 0, $alignment = 'L');
    // Name of authorized signatory
    insert_cell($pdf, $X = 106, $Y = 240, $CellWidth = 20, $CellHeight = 3, $text = $nameofsignatory, $border = 0, $alignment = 'L');
    // Payment Currency
    insert_cell($pdf, $X = 39, $Y = 223, $CellWidth = 20, $CellHeight = 3, $text = $paymentCurrency, $border = 0, $alignment = 'L');
    // Payment Currency
    insert_cell($pdf, $X = 51, $Y = 226.5, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryAccountNumber, $border = 0, $alignment = 'L');
    // Swift Code
    insert_cell($pdf, $X = 30, $Y = 230, $CellWidth = 20, $CellHeight = 3, $text = $swiftCode, $border = 0, $alignment = 'L');
    // Beneficiary Country/Region
    insert_cell($pdf, $X = 50, $Y = 233.5, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryCountry, $border = 0, $alignment = 'L');
    // Beneficiary Name
    insert_cell($pdf, $X = 39, $Y = 237, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryName, $border = 0, $alignment = 'L');
    // Beneficiary Address
    //insert_cell($pdf, $X = 40, $Y = 240, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryAddress, $border = 0, $alignment = 'L');
    $pdf->SetY(239.5);
    $pdf->SetX(15);
    $padd = '                                           ';
    $pdf->MultiCell(90, 3.5, $padd.$beneficiaryAddress, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $x = 14.5;
    $pdf->SetX($x);
    $pdf->Write(3.5,"Beneficiary Bank:");
    $pdf->Ln(3);
    $pdf->SetX($x);
    $pdf->Write(3.5,"Beneficiary Bank Address:");
    $padd = '                                                        ';
    $pdf->SetX($x);
    $pdf->SetFont('MinionBold', '', 8);
    $pdf->MultiCell(88,3.5,$padd.$beneficiaryBankAddress,0,"L");
    $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Write(3.5,"Bank Code:");
    $pdf->SetFont('MinionBold', '', 8);
    $pdf->Write(3.5,"  ".$bankCode);
    $pdf->Ln(3);
    $pdf->SetX($x);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Write(5,"Branch Code:");
    $pdf->SetFont('MinionBold', '', 8);
    $pdf->Write(5," ".$branchCode);

    // signature
    $pdf->Image($signature, 110, 249, 0, 18);
    // stamp
    $pdf->Image($stamp, 167, 247, 15, 0);


    // Products Insertion Area
    // $productCode = array('TD10020-YD-YR');
    // $descGoods = array('CORNMI Electric Milk Frother, 4 in 1 Automatic Milk Warmer and Foam Maker for Latte&Cappucino&Hot Chocolates');
    // $hsCode = array('8516.79.70');
    // $noUnits = array('24');
    // $unitMeasure = array('PCS');
    // $unitValue = array('17');
    // $amount = array('408');
    $x = 15;
    $y = 113;
    for($i=0;$i<count($productCode);$i++)
    {
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 26, $CellHeight = 3, $text = $productCode[$i], $border = 0, $alignment = 'L');
        $x += 67;
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 23, $CellHeight = 3, $text = $hsCode[$i], $border = 0, $alignment = 'L');
        $x += 23;
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 23, $CellHeight = 3, $text = $noUnits[$i], $border = 0, $alignment = 'C');
        $x += 23;
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 23, $CellHeight = 3, $text = $unitMeasure[$i], $border = 0, $alignment = 'C');
        $x += 23;
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 23, $CellHeight = 3, $text = $unitValue[$i], $border = 0, $alignment = 'C');
        $x += 21;
        insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 23, $CellHeight = 3, $text = $amount[$i], $border = 0, $alignment = 'C');
        $pdf->SetX(42);
        $pdf->MultiCell(39,3.5,$descGoods[$i],0,"L");
        $y = $pdf->GetY();
        $y+=1;
        $x = 15;
        
    }



    $filename = "file.pdf";
    header('Content-type: application/pdf');
    ob_clean();
    $pdf->Output('I', $filename);
} else {
    echo "<script>window.location.replace('index.php');</script>";
}
