<?php
namespace ParcelPerfect\Requests;

use ParcelPerfect\Entities\QuotePlace;
use ParcelPerfect\ParcelPerfectBase;
use ParcelPerfect\ParcelPerfectException;

class QuoteToWaybill extends ParcelPerfectBase
{
    /**
     * @param $quoteno
     * @return QuotePlace[]
     */
    public function quoteToWaybill($quoteno)
    {
        $params = [
            "waybillno" => '',
            "gentracking_retval" => 1,
            "recalcwb_retval" => 1,
            "quoteno" => $quoteno
        ];


        $result = $this->client->__soapCall("Quote_quoteToWaybill", array($this->token, $params));


        if ($result->errorcode != 0) {
           return  new ParcelPerfectException($result->errormessage, $result->errorcode);
        } else {
         return $result;
        }
    }
}