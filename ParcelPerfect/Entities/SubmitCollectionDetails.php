<?php
namespace ParcelPerfect\Entities;

class SubmitCollectionDetails
{
    protected $collectno;
    protected $waybill;
    protected $accnum;
    protected $costcentre;
    protected $service;
    protected $collectiondate;
    protected $origpers;
    protected $origperadd1;
    protected $origperadd2;
    protected $origperadd3;
    protected $origperadd4;
    protected $origplace;
    protected $origperpcode;
    protected $origpercontact;
    protected $origperphone;
    protected $origperphone2;
    protected $origpercell;
    protected $destpers;
    protected $destperadd1;
    protected $destperadd2;
    protected $destperadd3;
    protected $destperadd4;
    protected $destplace;
    protected $desttown;
    protected $destperpcode;
    protected $destpercontact;
    protected $destperphone;
    protected $destperphone2;
    protected $destpercell;
    protected $duedate;
    protected $dspecinstruction;
    protected $reference;
    protected $insuranceflag;
    protected $instype;
    protected $declaredvalue;
    protected $nondoxflag;
    protected $currency;
    protected $customsvalue;
    protected $surchargeflag1;
    protected $surchargeflag2;
    protected $surchargeflag3;
    protected $surchargeflag4;
    protected $surchargeflag5;
    protected $surchargeflag6;
    protected $surchargeflag7;
    protected $surchargeflag8;
    protected $surchargeflag9;
    protected $starttime;
    protected $endtime;
    protected $notes;


    /**
     * QuoteDetails constructor.
     */
    public function __construct() {

    }

    /**
     * @param mixed $waybill
     * @return SubmitCollectionDetails
     */
    public function setWaybill($waybill)
    {
        $this->waybill = $waybill;
        return $this;
    }
    /**
     * @param mixed $collectno
     * @return SubmitCollectionDetails
     */
    public function setCollectno($collectno)
    {
        $this->collectno = $collectno;
        return $this;
    }

    /**
     * @param mixed $accnum
     * @return SubmitCollectionDetails
     */
    public function setAccnum($accnum)
    {
        $this->accnum = $accnum;
        return $this;
    }

    /**
     * @param mixed $costcentre
     * @return SubmitCollectionDetails
     */
    public function setCostcentre($costcentre)
    {
        $this->costcentre = $costcentre;
        return $this;
    }

    /**
     * @param mixed $service
     * @return SubmitCollectionDetails
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

//    /**
//     * @param mixed $waydate
//     * @return SubmitCollectionDetails
//     */
//    public function setWaydate($waydate)
//    {
//        $this->waydate = $waydate;
//        return $this;
//    }

    /**
     * @param $collectiondate
     * @return SubmitCollectionDetails
     */
    public function setCollectiondate($collectiondate)
    {
        $this->collectiondate = $collectiondate;
        return $this;
    }

    /**
     * @param PackageAddress $pickupLocation
     * @return SubmitCollectionDetails
     */
    public function setPickupLocation($pickupLocation)
    {
        $this->pickupLocation = $pickupLocation;
        return $this;
    }

    /**
     * @param PackageAddress $dropoffLocation
     * @return SubmitCollectionDetails
     */
    public function setDropoffLocation($dropoffLocation)
    {
        $this->dropoffLocation = $dropoffLocation;
        return $this;
    }

    /**
     * @param mixed $duedate
     * @return SubmitCollectionDetails
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;
        return $this;
    }

    /**
     * @param mixed $specinstruction
     * @return SubmitCollectionDetails
     */
    public function setSpecinstruction($specinstruction)
    {
        $this->specinstruction = $specinstruction;
        return $this;
    }

    /**
     * @param mixed $reference
     * @return SubmitCollectionDetails
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @param mixed $insuranceflag
     * @return SubmitCollectionDetails
     */
    public function setInsuranceflag($insuranceflag)
    {
        $this->insuranceflag = $insuranceflag;
        return $this;
    }

    /**
     * @param mixed $instype
     * @return SubmitCollectionDetails
     */
    public function setInstype($instype)
    {
        $this->instype = $instype;
        return $this;
    }

    /**
     * @param mixed $declaredvalue
     * @return SubmitCollectionDetails
     */
    public function setDeclaredvalue($declaredvalue)
    {
        $this->declaredvalue = $declaredvalue;
        return $this;
    }

    /**
     * @param mixed $nondoxflag
     * @return SubmitCollectionDetails
     */
    public function setNondoxflag($nondoxflag)
    {
        $this->nondoxflag = $nondoxflag;
        return $this;
    }

    /**
     * @param mixed $currency
     * @return SubmitCollectionDetails
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param $customsvalue
     * @return SubmitCollectionDetails
     */
    public function setCustomsvalue($customsvalue)
    {
        $this->customsvalue = $customsvalue;
        return $this;
    }

    /**
     * @param mixed $surchargeflag1
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag1($surchargeflag1)
    {
        $this->surchargeflag1 = $surchargeflag1;
        return $this;
    }

    /**
     * @param mixed $surchargeflag2
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag2($surchargeflag2)
    {
        $this->surchargeflag2 = $surchargeflag2;
        return $this;
    }

    /**
     * @param mixed $surchargeflag3
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag3($surchargeflag3)
    {
        $this->surchargeflag3 = $surchargeflag3;
        return $this;
    }

    /**
     * @param mixed $surchargeflag4
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag4($surchargeflag4)
    {
        $this->surchargeflag4 = $surchargeflag4;
        return $this;
    }

    /**
     * @param mixed $surchargeflag5
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag5($surchargeflag5)
    {
        $this->surchargeflag5 = $surchargeflag5;
        return $this;
    }

    /**
     * @param mixed $surchargeflag6
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag6($surchargeflag6)
    {
        $this->surchargeflag6 = $surchargeflag6;
        return $this;
    }

    /**
     * @param mixed $surchargeflag7
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag7($surchargeflag7)
    {
        $this->surchargeflag7 = $surchargeflag7;
        return $this;
    }

    /**
     * @param mixed $surchargeflag8
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag8($surchargeflag8)
    {
        $this->surchargeflag8 = $surchargeflag8;
        return $this;
    }

    /**
     * @param mixed $surchargeflag9
     * @return SubmitCollectionDetails
     */
    public function setSurchargeflag9($surchargeflag9)
    {
        $this->surchargeflag9 = $surchargeflag9;
        return $this;
    }

    /**
     * @param mixed $origpers
     * @return SubmitCollectionDetails
     */
    public function setOrigpers($origpers)
    {
        $this->origpers = $origpers;
        return $this;
    }

    /**
     * @param mixed $origplace
     * @return SubmitCollectionDetails
     */
    public function setOrigplace($origplace)
    {
        $this->origplace = $origplace;
        return $this;
    }

    /**
     * @param mixed $starttime
     * @return SubmitCollectionDetails
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
        return $this;
    }



   /**
     * @param mixed $endtime
     * @return SubmitCollectionDetails
     */
    public function setendtime($endtime)
    {
        $this->endtime = $endtime;
        return $this;
    }













    /**
     * @return mixed
     */
    public function getWaybill()
    {
        return $this->waybill;
    }

    /**
     * @return mixed
     */
    public function getAccnum()
    {
        return $this->accnum;
    }

    /**
     * @return mixed
     */
    public function getCostcentre()
    {
        return $this->costcentre;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

//    /**
//     * @return mixed
//     */
//    public function getWaydate()
//    {
//        return $this->waydate;
//    }

      /**
     * @return mixed
     */
    public function getCollectiondate()
    {
        return $this->collectiondate;
    }

    /**
     * @return PackageAddress
     */
    public function getPickupLocation()
    {
        return $this->pickupLocation;
    }

    /**
     * @return PackageAddress
     */
    public function getDropoffLocation()
    {
        return $this->dropoffLocation;
    }

    /**
     * @return mixed
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * @return mixed
     */
    public function getSpecinstruction()
    {
        return $this->specinstruction;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return mixed
     */
    public function getInsuranceflag()
    {
        return $this->insuranceflag;
    }

    /**
     * @return mixed
     */
    public function getInstype()
    {
        return $this->instype;
    }

    /**
     * @return mixed
     */
    public function getDeclaredvalue()
    {
        return $this->declaredvalue;
    }

    /**
     * @return mixed
     */
    public function getNondoxflag()
    {
        return $this->nondoxflag;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getCustomsvalue()
    {
        return $this->customsvalue;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag1()
    {
        return $this->surchargeflag1;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag2()
    {
        return $this->surchargeflag2;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag3()
    {
        return $this->surchargeflag3;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag4()
    {
        return $this->surchargeflag4;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag5()
    {
        return $this->surchargeflag5;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag6()
    {
        return $this->surchargeflag6;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag7()
    {
        return $this->surchargeflag7;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag8()
    {
        return $this->surchargeflag8;
    }

    /**
     * @return mixed
     */
    public function getSurchargeflag9()
    {
        return $this->surchargeflag9;
    }

    /**
     * @return mixed
     */
    public function getOrigpers()
    {
        return $this->origpers;
    }

    /**
     * @return mixed
     */
    public function getOrigplace()
    {
        return $this->origplace;
    }

 /**
     * @return mixed
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

 /**
     * @return mixed
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

}