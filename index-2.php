<?php

use ParcelPerfect\Entities\PackageContents;
use ParcelPerfect\Entities\PackageDetails;
use ParcelPerfect\Entities\PackageAddress;
use ParcelPerfect\Entities\QuoteCollection;
use ParcelPerfect\Entities\SubmitCollectionDetails;
use ParcelPerfect\Requests\AcceptQuote;
use ParcelPerfect\Requests\GetQuotes;
use ParcelPerfect\Requests\GetPlacesByName;
use ParcelPerfect\Requests\GetPlacesByPostalCode;
use ParcelPerfect\Requests\QuoteUpdateService;
use ParcelPerfect\Requests\QuoteToWaybill;
use ParcelPerfect\Requests\SampleSubmitCollection;
use ParcelPerfect\Requests\SubmitCollection;

require_once 'vendor/autoload.php';
$config = [
    'username' => 'tcg8@ecomm',
    'password' => 'tcgecomm8',
    'api_url'  => 'http://adpdemo.pperfect.com/ecomService/v17/Soap/index.php?wsdl'
];
$getByPostalCode = new GetPlacesByPostalCode($config);
$dropoffPlace = $getByPostalCode->getPlacesByPostalCode('0083')[0];

$getPlacesByName = new GetPlacesByName($config);
$pickupPlace = $getPlacesByName->getPlacesByName('Alice')[0];

$pickupLocation = new PackageAddress();
$pickupLocation->setPlaceId($pickupPlace->getPlaceId())->setAddressLineOne('4th a')->setTown('fordsburg')->setPostalCode($pickupPlace->getPcode());

$dropoffLocation = new PackageAddress();
$dropoffLocation->setPlaceId($dropoffPlace->getPlaceId())->setAddressLineOne('56 King George St')->setTown('fordsburg')->setPostalCode($dropoffPlace->getPcode());

$pickupDetails = new PackageDetails();
$pickupDetails->setPickupLocation($pickupLocation)->setDropoffLocation($dropoffLocation);

$itemContents = (new PackageContents())->setActmass(1)->setDescription('TEST-2')->setDim1(4)->setDim2(2)->setDim3(6)->setItemNumber(1)->setPieces(1);

$deliveryRequest = new GetQuotes($config);
$quotes = $deliveryRequest->setContents([$itemContents])->setDetails($pickupDetails)->requestQuotes();


$updateService = new QuoteUpdateService($config);
$updateResponse = $updateService->setQuote($quotes->getQuoteNumber())->setService($quotes->getRates()[2]->getService())->updateService();

$wayBill = new QuoteToWaybill($config);
$wayBillResponse = $wayBill->quoteToWaybill($updateResponse->quoteno);

echo "<pre>";
echo "<h1>List of All Quotes</h1>";
print_r($quotes);

echo "<h1>UpdateService Response (service at index 2)</h1>";
print_r($updateResponse);

echo "<h1>RequestToWayBill Response</h1>";
print_r($wayBillResponse);
echo "</pre>";

$qc = new QuoteCollection();
// $qc->setQuoteno($updateResponse->quoteno);
$qc->setQuoteno('quoteno');
$qc->setStarttime("08:00");
$qc->setEndtime("17:00");
$qc->setNotes('Some notes');
$qc->setPrintWaybill(0);
$qc->setPrintLabels(0);

// $acc = new AcceptQuote($config);
// // $params['quoteno'] = 
// echo "<h1>pdf detail----------------</h1>";
// print_r($acc->setQuote($qc)->accept());
// echo "</pre>";
