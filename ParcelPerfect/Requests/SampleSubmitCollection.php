<?php


namespace ParcelPerfect\Requests;

use ParcelPerfect\Entities\PackageContents;
use ParcelPerfect\Entities\PackageDetails;
use ParcelPerfect\Entities\QuoteRate;
use ParcelPerfect\ParcelPerfectBase;
use ParcelPerfect\Entities\Quotes;
use ParcelPerfect\ParcelPerfectException;

class SampleSubmitCollection extends ParcelPerfectBase
{
    /**
     * @var PackageDetails
     */
    private $details;

    /**
     * @var PackageContents[]
     */
    private $contents;

    /**
     * @param PackageDetails $deliveryDetails
     * @return GetQuotes
     */
    public function setDetails(PackageDetails $deliveryDetails)
    {
        $this->details = $deliveryDetails;
        return $this;
    }

    /**
     * @param PackageContents[] $contents
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
        //build quote request:
        $collectParams = array();
        $collectParams = array();
        $collectParams['details'] = array();

        $collectParams['details']['specinstruction'] = "This is a test";
        $collectParams['details']['reference'] = "This is a test";
        $collectParams['details']['service'] = "ONX";
        $collectParams['details']['accnum'] = "PPO";
        //originating location
        $collectParams['details']['origperadd1'] = 'Address line 1';
        $collectParams['details']['origperadd2'] = 'Address line 2';
        $collectParams['details']['origperadd3'] = 'Address line 3';
        $collectParams['details']['origperadd4'] = 'Address line 4';
        $collectParams['details']['origperphone'] = '012345678';
        $collectParams['details']['origpercell'] = '012345678';

        $collectParams['details']['origplace'] = 4969;
        $collectParams['details']['origtown'] = 'lahore';
        $collectParams['details']['origpers'] = 'TESTCUSTOMER';
        $collectParams['details']['origpercontact'] = 'origcontactsname';
        $collectParams['details']['origperpcode'] = '6730'; //postal code

        //destination location details
        $collectParams['details']['destperadd1'] = 'Address line 1';
        $collectParams['details']['destperadd2'] = 'Address line 2';
        $collectParams['details']['destperadd3'] = 'Address line 3';
        $collectParams['details']['destperadd4'] = 'Address line 4';
        $collectParams['details']['destperphone'] = '012345678';
        $collectParams['details']['destpercell'] = '012345678';

        //i chose the 1st result, but this will be up to the user as above
        $collectParams['details']['destplace'] = 4969;
        $collectParams['details']['desttown'] = 'karachi';
        $collectParams['details']['destpers'] = 'TESTCUSTOMER';
        $collectParams['details']['destpercontact'] = 'destcontactsname';
        $collectParams['details']['destperpcode'] = '3340'; //postal code
        $collectParams['details']['starttime'] = '08:00';
        $collectParams['details']['endtime'] = '16:30';
        $collectParams['details']['notes'] = 'collection note';
        $collectParams['details']['collectiondate'] = '';

        /* Add the Contents:
         * There needs to be at least 1 contest item with an "actmass" > 0 otherwise a rate will not calculate.
         * "Contents" needs to be an array object, even if there is only one contents item. */

        //Create the waybill's contents array object
        $collectParams['contents'] = array();

        //Create first contents item (index 0 in the contents array)
        $collectParams['contents'][0] = array();

        //Add contents details
        $collectParams['contents'][0]['item'] = 1;
        $collectParams['contents'][0]['description'] = 'this is a test';
        $collectParams['contents'][0]['pieces'] = 1;
        $collectParams['contents'][0]['dim1'] = 1;
        $collectParams['contents'][0]['dim2'] = 1;
        $collectParams['contents'][0]['dim3'] = 1;
        $collectParams['contents'][0]['actmass'] = 1;
        $collectParams['contents'][0]['defitem'] = 1;

        //Create second contents item (index 1 in the contents array)
        $collectParams['contents'][1] = array();

        //Add contents details
        $collectParams['contents'][1]['item'] = 2;
        $collectParams['contents'][1]['description'] = 'this is another test';
        $collectParams['contents'][1]['pieces'] = 1;
        $collectParams['contents'][1]['dim1'] = 1;
        $collectParams['contents'][1]['dim2'] = 1;
        $collectParams['contents'][1]['dim3'] = 1;
        $collectParams['contents'][1]['actmass'] = 1;
        $collectParams['contents'][1]['defitem'] = 1;



        $result = $this->client->__soapCall("Collection_submitCollection", array($this->token, $collectParams));

        echo "<pre>";
            print_r($result);
        echo "</pre>";
        die("***********************************************************");
        if ($result->errorcode != 0) {
            new ParcelPerfectException($result->errormessage, $result->errorcode);
        } else {
            if (!$result->results[0]) {
                throw new ParcelPerfectException('Parcel Perfect returned no results', 400);
            }
            $rates = [];
            foreach ($result->results[0]->rates as $rate) {
                $rates[] = (new QuoteRate())
                    ->setService($rate->service)
                    ->setName($rate->name)
                    ->setCharge($rate->charge)
                    ->setInsurance($rate->insurance)
                    ->setCustomsValue($rate->customsvalue)
                    ->setOutly($rate->outly)
                    ->setDoc($rate->docs)
                    ->setHandling($rate->handling)
                    ->setCursurCharge($rate->cursurcharge)
                    ->setTotalSurcharge($rate->totsurcharge)
                    ->setSubtotal($rate->subtotal)
                    ->setVat($rate->vat)
                    ->setTotal($rate->total)
                    ->setCustomDuties($rate->customsduties)
                    ->setCustomsVat($rate->customsvat)
                    ->setDueDate($rate->duedate)
                    ->setDueTime($rate->duetime);
            }
            return new Quotes($result->results[0]->quoteno, $rates);
        }
    }

    private function buildRequest()
    {



        $requestQuote = [];
//        $requestQuote['details'] = [];
//        $requestQuote['details']['waybill'] = $this->details->getWaybill();
//        $requestQuote['details']['accnum'] = $this->details->getAccnum();
//        $requestQuote['details']['costcentre'] = $this->details->getCostcentre();
//        $requestQuote['details']['service'] = $this->details->getService();
//        $requestQuote['details']['waydate'] = $this->details->getWaydate();
//
//        $requestQuote['details']['duedate'] = $this->details->getDuedate();
//        $requestQuote['details']['specinstruction'] = $this->details->getSpecinstruction();
//        $requestQuote['details']['reference'] = $this->details->getReference();
//        $requestQuote['details']['insuranceflag'] = $this->details->getInsuranceflag();
//        $requestQuote['details']['instype'] = $this->details->getInstype();
//        $requestQuote['details']['declaredvalue'] = $this->details->getDeclaredvalue();
//        $requestQuote['details']['nondoxflag'] = $this->details->getNondoxflag();
//        $requestQuote['details']['currency'] = $this->details->getCurrency();
//        $requestQuote['details']['customsvalue'] = $this->details->getCustomsvalue();
//        $requestQuote['details']['surchargeflag1'] = $this->details->getSurchargeflag1();
//        $requestQuote['details']['surchargeflag2'] = $this->details->getSurchargeflag2();
//        $requestQuote['details']['surchargeflag3'] = $this->details->getSurchargeflag3();
//        $requestQuote['details']['surchargeflag4'] = $this->details->getSurchargeflag4();
//        $requestQuote['details']['surchargeflag5'] = $this->details->getSurchargeflag5();
//        $requestQuote['details']['surchargeflag6'] = $this->details->getSurchargeflag6();
//        $requestQuote['details']['surchargeflag7'] = $this->details->getSurchargeflag7();
//        $requestQuote['details']['surchargeflag8'] = $this->details->getSurchargeflag8();
//        $requestQuote['details']['surchargeflag9'] = $this->details->getSurchargeflag9();
//        $requestQuote['details']['origpers'] = $this->details->getOrigpers();
//        $requestQuote['details']['collectiondate'] = $this->details->getCollectiondate();
//        $requestQuote['details']['origplace'] = $this->details->getOrigplace();
//        $requestQuote['details']['starttime'] = $this->details->getStarttime();
//        $requestQuote['details']['endtime'] = $this->details->getEndtime();
//        $requestQuote['details']['destpers'] ='';


        $requestQuote['details']['specinstruction'] = "This is a test";
        $requestQuote['details']['reference'] = "This is a test";
        $requestQuote['details']['service'] = "ONX";
        $requestQuote['details']['accnum'] = "PPO";
        //originating location
        $requestQuote['details']['origperadd1'] = 'Address line 1';
        $requestQuote['details']['origperadd2'] = 'Address line 2';
        $requestQuote['details']['origperadd3'] = 'Address line 3';
        $requestQuote['details']['origperadd4'] = 'Address line 4';
        $requestQuote['details']['origperphone'] = '012345678';
        $requestQuote['details']['origpercell'] = '012345678';

//        $requestQuote['details']['origplace'] = $this->origPlace;
//        $requestQuote['details']['origtown'] = $this->origPlacename;
        $requestQuote['details']['origpers'] = 'TESTCUSTOMER';
        $requestQuote['details']['origpercontact'] = 'origcontactsname';
        $requestQuote['details']['origperpcode'] = '6730'; //postal code

        //destination location details
        $requestQuote['details']['destperadd1'] = 'Address line 1';
        $requestQuote['details']['destperadd2'] = 'Address line 2';
        $requestQuote['details']['destperadd3'] = 'Address line 3';
        $requestQuote['details']['destperadd4'] = 'Address line 4';
        $requestQuote['details']['destperphone'] = '012345678';
        $requestQuote['details']['destpercell'] = '012345678';

        //i chose the 1st result, but this will be up to the user as above
//        $requestQuote['details']['destplace'] = $this->destPlace;
//        $requestQuote['details']['desttown'] = $this->destPlacename;
        $requestQuote['details']['destpers'] = 'TESTCUSTOMER';
        $requestQuote['details']['destpercontact'] = 'destcontactsname';
        $requestQuote['details']['destperpcode'] = '3340'; //postal code
        $requestQuote['details']['starttime'] = '08:00';
        $requestQuote['details']['endtime'] = '16:30';
        $requestQuote['details']['notes'] = 'collection note';

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
        }
        return $requestQuote;
    }
}