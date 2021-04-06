<?php
namespace App\Libraries\external\curior;

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


$parecl=new ParcelPerfect();
$parecl->dd($parecl->getPlaceByName());
function dd($var) {
    echo "<pre>";
        print_r($var);
    echo "</pre>";
    die();
}

$config = [
    'username' => 'tcg8@ecomm',
    'password' => 'tcgecomm8',
    'api_url'  => 'http://adpdemo.pperfect.com/ecomService/v17/Soap/index.php?wsdl'
//    'api_url'  => 'http://tcgweb16931.pperfect.com/ecomService/v18/Soap/index.php'
];

$getByPostalCode = new GetPlacesByPostalCode($config);
$dropoffPlace = $getByPostalCode->getPlacesByPostalCode('0083')[0];

$getPlacesByName = new GetPlacesByName($config);
$pickupPlace = $getPlacesByName->getPlacesByName('Alice')[0];

$pickupLocation = new PackageAddress();
$pickupLocation
    ->setPlaceId($pickupPlace->getPlaceId())
//    ->setAddressLineOne('4th a')
//    ->setTown('fordsburg')
    ->setPostalCode($pickupPlace->getPcode());

$dropoffLocation = new PackageAddress();
$dropoffLocation
    ->setPlaceId($dropoffPlace->getPlaceId())
//    ->setAddressLineOne('56 King George St')
//    ->setTown('fordsburg')
    ->setPostalCode($dropoffPlace->getPcode());

$pickupDetails = new PackageDetails();
$pickupDetails->setPickupLocation($pickupLocation)->setDropoffLocation($dropoffLocation);

$itemContents = (new PackageContents())
    ->setActmass(1)
    ->setDescription('TEST-2')
    ->setDim1(20)
//    ->setDim2(40)
//    ->setDim3(30)
    ->setItemNumber(1)
    ->setPieces(1);

$deliveryRequest = new GetQuotes($config);
$quotes = $deliveryRequest->setContents([$itemContents])->setDetails($pickupDetails)->requestQuotes();

//$quote = (new QuoteCollection())
//    ->setQuoteno($quotes->getQuoteNumber())
//    ->setPrintWaybill(1)
//    ->setStarttime(date('d.m.yy'))
//    ->setEndtime(date('d.m.yy'))
//    ->setSpecins("test instructions");
//
//$acceptQuote = (new AcceptQuote($config))
//    ->setQuote($quote)
//    ->accept();

$updateService=new QuoteUpdateService($config);
$up=$updateService->setQuote($quotes->getQuoteNumber())->setService($quotes->getRates()[2]->getService())->updateService();

//$wayBill=new QuoteToWaybill($config);
//$wb=$wayBill->quoteToWaybill($up->quoteno);
//$wb=$wayBill->quoteToWaybill('RDF');


$detail = new SubmitCollectionDetails();
$detail->setAccnum('PPO')
    ->setCollectiondate(date('d.m.yy'))
    ->setService('ECO')
    ->setOrigpers('TESTCUSTOMER')
    ->setOrigplace(4969)
    ->setStarttime('08:00')
    ->setEndtime('16:00');
//submit collection
$submitCollection = new SubmitCollection($config);
$submit = $submitCollection->setContents([$itemContents])->setDetails($detail)->submitCollection();
echo "<pre>";
print_r($quotes);
print_r($up);
print_r($submit);
echo "</pre>";


//User: flashdea_shop_local
//
//Database: flashdea_show_local


