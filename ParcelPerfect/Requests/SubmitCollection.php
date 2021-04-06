<?php


namespace ParcelPerfect\Requests;

use ParcelPerfect\Entities\PackageContents;
//use ParcelPerfect\Entities\PackageDetails;
use ParcelPerfect\Entities\SubmitCollectionDetails;
use ParcelPerfect\Entities\QuoteRate;
use ParcelPerfect\ParcelPerfectBase;
use ParcelPerfect\Entities\Quotes;
use ParcelPerfect\ParcelPerfectException;

class SubmitCollection extends ParcelPerfectBase
{
    /**
     * @var SubmitCollectionDetails
     */
    private $details;

    /**
     * @var SubmitCollectionDetails[]
     */
    private $contents;

    /**
     * @param SubmitCollectionDetails $deliveryDetails
     * @return GetQuotes
     */
    public function setDetails(SubmitCollectionDetails $deliveryDetails)
    {

        $this->details = $deliveryDetails;
        return $this;
    }

    /**
     * @param SubmitCollectionDetails[] $contents
     * @return GetQuotes
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
        return $this;
    }


    /**
     * @return Quotes
     * @throws ParcelPerfectException
     */
    public function submitCollection()
    {
        $result = $this->client->__soapCall("Collection_submitCollection", array($this->token, $this->buildRequest()));
//echo "<pre>";
//    print_r($result->results);
//    var_dump($this->buildRequest());
//echo "</pre>";
//die("*********************************************");
        if ($result->errorcode != 0) {
            new ParcelPerfectException($result->errormessage, $result->errorcode);
        } else {

            return $result->results[0];
        }
    }

    private function buildRequest()
    {
        $requestQuote = [];
        $requestQuote['details'] = [];
        $requestQuote['details']['waybill'] = $this->details->getWaybill();
        $requestQuote['details']['accnum'] = $this->details->getAccnum();
        $requestQuote['details']['costcentre'] = $this->details->getCostcentre();
        $requestQuote['details']['service'] = $this->details->getService();
//        $requestQuote['details']['waydate'] = $this->details->getWaydate();

//        $requestQuote['details']['duedate'] = $this->details->getDuedate();
//        $requestQuote['details']['specinstruction'] = $this->details->getSpecinstruction();
        $requestQuote['details']['reference'] = $this->details->getReference();
        $requestQuote['details']['insuranceflag'] = $this->details->getInsuranceflag();
        $requestQuote['details']['instype'] = $this->details->getInstype();
        $requestQuote['details']['declaredvalue'] = $this->details->getDeclaredvalue();
        $requestQuote['details']['nondoxflag'] = $this->details->getNondoxflag();
        $requestQuote['details']['currency'] = $this->details->getCurrency();
        $requestQuote['details']['customsvalue'] = $this->details->getCustomsvalue();
        $requestQuote['details']['surchargeflag1'] = $this->details->getSurchargeflag1();
        $requestQuote['details']['surchargeflag2'] = $this->details->getSurchargeflag2();
        $requestQuote['details']['surchargeflag3'] = $this->details->getSurchargeflag3();
        $requestQuote['details']['surchargeflag4'] = $this->details->getSurchargeflag4();
        $requestQuote['details']['surchargeflag5'] = $this->details->getSurchargeflag5();
        $requestQuote['details']['surchargeflag6'] = $this->details->getSurchargeflag6();
        $requestQuote['details']['surchargeflag7'] = $this->details->getSurchargeflag7();
        $requestQuote['details']['surchargeflag8'] = $this->details->getSurchargeflag8();
        $requestQuote['details']['surchargeflag9'] = $this->details->getSurchargeflag9();
        $requestQuote['details']['origpers'] = $this->details->getOrigpers();
        $requestQuote['details']['collectiondate'] = $this->details->getCollectiondate();
        $requestQuote['details']['origplace'] = $this->details->getOrigplace();
        $requestQuote['details']['starttime'] = $this->details->getStarttime();
        $requestQuote['details']['endtime'] = $this->details->getEndtime();
        $requestQuote['details']['destpers'] ='Mohsin ali';
        $requestQuote['details']['destperadd1'] ='';
        $requestQuote['details']['desttown'] ='';
        $requestQuote['details']['destperpcode'] =2000;
        $requestQuote['details']['destpercontact'] ='03077020163';
        $requestQuote['details']['destperphone'] ='03021232654';



        $requestQuote['contents'] = [];

        foreach ($this->contents as $key => $item) {
            $requestQuote['contents'][$key] = [];
            $requestQuote['contents'][$key]['item'] = $item->getItemNumber();
            $requestQuote['contents'][$key]['description'] = $item->getDescription();
            $requestQuote['contents'][$key]['pieces'] = $item->getPieces();
            $requestQuote['contents'][$key]['dim1'] = $item->getDim1();
            $requestQuote['contents'][$key]['dim2'] = $item->getDim2();
            $requestQuote['contents'][$key]['dim3'] = $item->getDim3();
            $requestQuote['contents'][$key]['actmass'] = $item->getActmass();
            $requestQuote['contents'][$key]['defitem'] = '1';
        }
        return $requestQuote;
    }
}
