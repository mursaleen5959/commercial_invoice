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

if (isset($_POST['Generate'])) {

    // Allowed Extensions for uploading images
    $extensions= array("jpeg","jpg","png");

    if(isset($_FILES['signature']) && $_FILES['signature']['name'] !='')
    {
        $errors='';
        $signature = $_FILES['signature']['name'];
        $file_tmp = $_FILES['signature']['tmp_name'];
        $file_type = $_FILES['signature']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['signature']['name'])));

        if(in_array($file_ext,$extensions)=== false){
            $errors="Please upload image with valid extension ! jpg,png or jpeg";
        }
        if($errors=='') {
            move_uploaded_file($file_tmp,"images/".$signature);
            $signature = "images/".$signature;
        }else{
            // echo "<script>alert(".$errors.")</script>";
            // echo "<script>window.location.replace('index.php');</script>";
        }
    }
    if(isset($_FILES['logo']) && $_FILES['logo']['name'] !='')
    {
        $errors='';
        $logo = $_FILES['logo']['name'];
        $file_tmp = $_FILES['logo']['tmp_name'];
        $file_type = $_FILES['logo']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));

        if(in_array($file_ext,$extensions)=== false){
            $errors="Please upload image with valid extension ! jpg,png or jpeg";
        }
        if($errors=='') {
            move_uploaded_file($file_tmp,"images/".$logo);
            $logo = "images/".$logo;
        }else{
            // echo "<script>alert(".$errors.")</>";
            // echo "<script>window.location.replace('index.php');</script>";
        }
    }
    if(isset($_FILES['stamp']) && $_FILES['stamp']['name'] !='')
    {
        $errors='';
        $stamp = $_FILES['stamp']['name'];
        $file_tmp = $_FILES['stamp']['tmp_name'];
        $file_type = $_FILES['stamp']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['stamp']['name'])));

        if(in_array($file_ext,$extensions)=== false){
            $errors="Please upload image with valid extension ! jpg,png or jpeg";
        }
        if($errors=='') {
            move_uploaded_file($file_tmp,"images/".$stamp);
            $stamp = "images/".$stamp;
        }else{
            // echo "<script>alert(".$errors.")</script>";
            // echo "<script>window.location.replace('index.php');</script>";
        }
    }

    $exporter = $_POST['exporter'];
    $consignee = $_POST['consignee'];
    $buyerNotConsignee = $_POST['buyerNotConsignee'];
    $invoiceNumber = $_POST['invoiceNumber'];
    $invoiceDate = $_POST['invoiceDate'];
    $awbBL = $_POST['awbBL'];
    $purchaseOrder = $_POST['purchaseOrder'];
    $reference = $_POST['reference'];
    $methodDispatch = $_POST['methodDispatch'];
    $typeShipment = $_POST['typeShipment'];
    $countryofOriginofGoods = $_POST['countryOriginGoods'];
    $countryFinalDestination = $_POST['countryFinalDestination'];
    $packages = $_POST['packages'];
    $totalGrossWeight = $_POST['totalGrossWeight'];
    $termsOfSale = $_POST['termsOfSale'];
    $from = $_POST['from'];
    $dateOfDeparture = $_POST['dateOfDeparture'];
    $destination = $_POST['destination'];
    $finalDestination = $_POST['finalDestination'];
    $insurancePolicy = $_POST['insurancePolicy'];
    $letterOfCredit = $_POST['letterOfCredit'];
    $paymentCurrency = $_POST['paymentCurrency'];
    $beneficiaryAccountNumber = $_POST['beneficiaryAccountNumber'];
    $swiftCode = $_POST['swiftCode'];
    $beneficiaryCountry = $_POST['beneficiaryCountry'];
    $beneficiaryName = $_POST['beneficiaryName'];
    $beneficiaryAddress = $_POST['beneficiaryAddress'];
    $beneficiaryBank = $_POST['beneficiaryBank'];
    $beneficiaryBankAddress = $_POST['beneficiaryBankAddress'];
    $bankCode = $_POST['bankCode'];
    $branchCode = $_POST['branchCode'];
    $freight = $_POST['freight'];
    $consignmentTotal = $_POST['consignmentTotal'];
    $total = $_POST['total'];
    $incoterms2020 = $_POST['incoterms'];
    $currencyCode = $_POST['currencyCode'];
    $signatoryCompany = $_POST['signatoryCompany'];
    $nameofsignatory = $_POST['nameAuthorizedSignatory'];
    $productCode = $_POST['productCode'];
    $descGoods = $_POST['descGoods'];
    $hsCode = $_POST['hsCode'];
    $noUnits = $_POST['noUnits'];
    $unitMeasure = $_POST['unitMeasure'];
    $unitValue = $_POST['unitValue'];
    $amount = $_POST['amount'];


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
    insert_cell($pdf, $X = 180, $Y = 212, $CellWidth = 20, $CellHeight = 3, $text = $consignmentTotal, $border = 0, $alignment = 'L');
    // Total
    insert_cell($pdf, $X = 180, $Y = 217, $CellWidth = 20, $CellHeight = 3, $text = $total, $border = 0, $alignment = 'L');
    // Currency Code
    insert_cell($pdf, $X = 177, $Y = 224, $CellWidth = 20, $CellHeight = 3, $text = $currencyCode, $border = 0, $alignment = 'L');
    // Incoterms 2020
    insert_cell($pdf, $X = 105, $Y = 224, $CellWidth = 20, $CellHeight = 3, $text = $incoterms2020, $border = 0, $alignment = 'L');
    // Signatory company
    insert_cell($pdf, $X = 106, $Y = 232, $CellWidth = 20, $CellHeight = 3, $text = $signatoryCompany, $border = 0, $alignment = 'L');
    // Name of authorized signatory
    insert_cell($pdf, $X = 106, $Y = 240, $CellWidth = 20, $CellHeight = 3, $text = $nameofsignatory, $border = 0, $alignment = 'L');
    // Payment Currency
    insert_cell($pdf, $X = 39, $Y = 223, $CellWidth = 20, $CellHeight = 3, $text = $paymentCurrency, $border = 0, $alignment = 'L');
    // Payment Currency
    insert_cell($pdf, $X = 51, $Y = 226.5, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryAccountNumber, $border = 0, $alignment = 'L');
    // Swift Code
    insert_cell($pdf, $X = 30, $Y = 230.2, $CellWidth = 20, $CellHeight = 3, $text = $swiftCode, $border = 0, $alignment = 'L');
    // Beneficiary Country/Region
    insert_cell($pdf, $X = 50, $Y = 233.7, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryCountry, $border = 0, $alignment = 'L');
    // Beneficiary Name
    insert_cell($pdf, $X = 39, $Y = 237.3, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryName, $border = 0, $alignment = 'L');
    // Beneficiary Address
    //insert_cell($pdf, $X = 40, $Y = 240, $CellWidth = 20, $CellHeight = 3, $text = $beneficiaryAddress, $border = 0, $alignment = 'L');
    $pdf->SetFont('Minion', '', 8);
    $pdf->SetY(240.9);
    $pdf->SetX(15);
    $padd = '                                         ';
    $pdf->MultiCell(90, 3.5, $padd.$beneficiaryAddress, 0, 'L');
    $pdf->SetFont('Arial', '', 8);
    $x = 14.5;
    $pdf->SetX($x);
    $pdf->Write(3.5,"Beneficiary Bank:");
    $pdf->SetFont('Minion', '', 8);
    $pdf->Write(3.5," ".$beneficiaryBank);
    $pdf->Ln(3.6);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetX($x);
    $pdf->Write(3.5,"Beneficiary Bank Address:");
    $padd = '                                                       ';
    $pdf->SetX($x);
    $pdf->SetFont('Minion', '', 8);
    $pdf->MultiCell(88,3.5,$padd.$beneficiaryBankAddress,0,"L");
    $pdf->Ln(0.3);
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

    if($logo!='')
    {
        // logo
        $pdf->Image($logo, 75, 21, 30, 0);
    }
    if($signature!='')
    {
        // signature
        $pdf->Image($signature, 110, 249, 0, 18);
    }
    if($stamp!='')
    {
        // stamp
        $pdf->Image($stamp, 167, 247, 15, 0);
    }


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
