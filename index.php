<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container" style="border:1px solid black">
        <div class="text-center mt-4 mb-4">
            <h2>Enter Data</h2>
        </div>
        <form action="generate.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for=""><strong>Exporter:</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="exporter" placeholder="Comment goes here"></textarea>
                        <label for="comment">Exporter</label>
                    </div>
                </div>
                <div class="col">
                    <label for=""><strong>Consignee:</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="consignee" placeholder="Comment goes here"></textarea>
                        <label for="comment">Consignee</label>
                    </div>
                </div>
                <div class="col">
                    <label for=""><strong>Buyer (If not Consignee):</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="buyerNotConsignee" placeholder="Comment goes here"></textarea>
                        <label for="comment">Buyer</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Invoice Number:</strong></label>
                    <input type="text" name="invoiceNumber" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Invoice Date:</strong></label>
                    <input type="text" name="invoiceDate" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>AWB/BL:</strong></label>
                    <input type="text" name="awbBL" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Purchase Order:</strong></label>
                    <input type="text" name="purchaseOrder" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Reference:</strong></label>
                    <input type="text" name="reference" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Method of Dispatch:</strong></label>
                    <input type="text" name="methodDispatch" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Type of Shipment:</strong></label>
                    <input type="text" name="typeShipment" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Country Of Origin of Goods:</strong></label>
                    <input type="text" name="countryOriginGoods" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Country of Final Destination:</strong></label>
                    <input type="text" name="countryFinalDestination" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>No. of Packages:</strong></label>
                    <input type="text" name="packages" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Total Gross Weight (KGS):</strong></label>
                    <input type="text" name="totalGrossWeight" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Terms Of Sale:</strong></label>
                    <input type="text" name="termsOfSale" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>From:</strong></label>
                    <input type="text" name="from" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Date of Departure:</strong></label>
                    <input type="text" name="dateOfDeparture" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Destination:</strong></label>
                    <input type="text" name="destination" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Final Destination:</strong></label>
                    <input type="text" name="finalDestination" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Insurance Policy No:</strong></label>
                    <input type="text" name="insurancePolicy" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Letter Of Credit No:</strong></label>
                    <input type="text" name="letterOfCredit" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Freight:</strong></label>
                    <input type="text" name="freight" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Consignment Total:</strong></label>
                    <input type="text" name="consignmentTotal" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>TOTAL:</strong></label>
                    <input type="text" name="total" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Incoterms® 2020:</strong></label>
                    <input type="text" name="incoterms" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Currency Code:</strong></label>
                    <input type="text" name="currencyCode" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Signatory Company:</strong></label>
                    <input type="text" name="signatoryCompany" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Name of Authorized Signatory:</strong></label>
                    <input type="text" name="nameAuthorizedSignatory" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Payment Currency:</strong></label>
                    <input type="text" name="paymentCurrency" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Beneficiary Account Number:</strong></label>
                    <input type="text" name="beneficiaryAccountNumber" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Swift Code:</strong></label>
                    <input type="text" name="swiftCode" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Beneficiary Country/Region::</strong></label>
                    <input type="text" name="beneficiaryCountry" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Beneficiary Name:</strong></label>
                    <input type="text" name="beneficiaryName" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Bank Code:</strong></label>
                    <input type="text" name="bankCode" class="form-control" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Branch Code:</strong></label>
                    <input type="text" name="branchCode" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Beneficiary Address:</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="beneficiaryAddress" placeholder="Beneficiary Address"></textarea>
                        <label for="comment">Beneficiary Address</label>
                    </div>
                </div>
                <div class="col">
                    <label for=""><strong>Beneficiary Bank:</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="beneficiaryBank" placeholder="Beneficiary Bank"></textarea>
                        <label for="comment">Beneficiary Bank</label>
                    </div>
                </div>
                <div class="col">
                    <label for=""><strong>Beneficiary Bank Address:</strong></label>
                    <div class="form-floating">
                        <textarea class="form-control" id="comment" name="beneficiaryBankAddress" placeholder="Beneficiary Address"></textarea>
                        <label for="comment">Beneficiary Address</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""><strong>Signature:</strong></label><br>
                    <input type="file" name="signature" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Logo:</strong></label><br>
                    <input type="file" name="logo" id="">
                </div>
                <div class="col">
                    <label for=""><strong>Stamp:</strong></label><br>
                    <input type="file" name="stamp" id="">
                </div>
            </div>
            <div id="productRow">
                <div class="row">
                    <div class="col">
                        <label for=""><strong>Product Code:</strong></label><br>
                        <input type="text" name="productCode[]" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for=""><strong>Description of Goods:</strong></label><br>
                        <div class="form-floating">
                            <textarea class="form-control" id="comment" name="descGoods[]" placeholder="Beneficiary Address"></textarea>
                            <label for="comment">Description of Goods</label>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""><strong>HS Code:</strong></label><br>
                        <input type="text" name="hsCode[]" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for=""><strong>No. of Units:</strong></label><br>
                        <input type="text" name="noUnits[]" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for=""><strong>Units of Measure:</strong></label><br>
                        <input type="text" name="unitMeasure[]" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for=""><strong>Unit Value:</strong></label><br>
                        <input type="text" name="unitValue[]" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for=""><strong>Amount:</strong></label><br>
                        <input type="text" name="amount[]" class="form-control" id="">
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="text-end">
                    <button type="button" id="addProduct" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add More Product</button>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col"></div>
                <div class="col">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" name="Generate"><i class="fa-solid fa-file-pdf"></i> &nbsp;&nbsp; Generate PDF</button>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#addProduct").click(function() {
            var html = `<div class="row">
                            <div class="col-sm-1">
                                <label for=""><strong>Product Code:</strong></label><br>
                                <input type="text" name="productCode[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-3">
                                <label for=""><strong>Description of Goods:</strong></label><br>
                                <div class="form-floating">
                                    <textarea class="form-control" id="comment" name="descGoods[]" placeholder="Beneficiary Address"></textarea>
                                    <label for="comment">Description of Goods</label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label for=""><strong>HS Code:</strong></label><br>
                                <input type="text" name="hsCode[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-2">
                                <label for=""><strong>No. of Units:</strong></label><br>
                                <input type="text" name="noUnits[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-2">
                                <label for=""><strong>Units of Measure:</strong></label><br>
                                <input type="text" name="unitMeasure[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-1">
                                <label for=""><strong>Unit Value:</strong></label><br>
                                <input type="text" name="unitValue[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-1">
                                <label for=""><strong>Amount:</strong></label><br>
                                <input type="text" name="amount[]" class="form-control" id="">
                            </div>
                            <div class="col-sm-1 text-center">
                                <button type="button" class="deleteProduct btn btn-danger mt-4 mb-3"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            <hr>
                        </div>`;
            $('#productRow').append(html);
        });
        $(document).on('click', '.deleteProduct', function() {
            $(this).parent().parent().remove();
        });
    });
</script>