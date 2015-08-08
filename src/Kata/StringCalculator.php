<?php
/**
 * Interview task for Afilias
 * User: xingda Wang
 * Date: 8/7/15
 * Time: 8:16 PM
 */

namespace Kata;
use Exception;
/**
 * Class StringCalculator
 * @package Kata
 */
class StringCalculator{

    private $delimiterFlag;
    private $param;
    private $delimiter;

    /**
     * Default constructor
     */
    function __construct(){
        $this->delimiterFlag = false;
        $this->delimiter = ',';
    }

    /**
     * String calculator, manipulate string with examination
     * @param $param
     * @return int|string
     * @throws Exception
     */
    function Add($param){
        $this->param = $param;
        if($this->ValidationComma($this->param)){
            if($this->DetectDelimiter($this->param)){
                $this->delimiter = $this->GetDelimiter($this->param);
                $this->param = $this->RemoveDelimiter($this->param, $this->delimiter);
                $this->delimiterFlag = true;
            }
            $this->param = $this->ConvertNextLineToDelimiter($this->param, $this->delimiter);
            $numbers = explode($this->delimiter,$this->param);
            $total = 0;
            foreach($numbers as $number) {
                try {
                    if($number < 0)
                        throw new Exception();
                    else
                        $total = $total + $this->IgnoreBigNumber($number);
                } catch (Exception $e) {
                    return "something went wrong ".$number;
                }

            }
            if ($this->delimiterFlag == true)
                return $this->delimiter.$total;
            else
                return $total;
        } else {

            return "The following input is NOT ok";
        }

    }

    /**
     * Change slash n to the given delimiter
     * @param $param
     * @return mixed
     */
    public function ConvertNextLineToDelimiter($param, $delimiter){
        $original = array("\n");
        $destination = array($delimiter);
        return str_replace($original, $destination, $param);
    }

    /**
     * Check whether the last characters are ,/n
     * @param $param
     * @return bool
     */
    public function ValidationComma($param){
        if(strpos($param,",\n") == 0)
            return true;
        if((strpos($param,",\n") != strlen($param) - 3) && strlen($param) != 3)
            return true;
        else
            return false;
    }

    /**
     * Check whether there is a delimiter
     * @param $param
     * @return bool
     */
    public function DetectDelimiter($param){
        if(strpos($param, "//") === 0)
            return true;
        else
            return false;
    }

    /**
     * Return delimiter
     * @param $param
     * @return string
     */
    public function GetDelimiter($param){
        return substr($param, 2, 1);
    }

    /**
     * Remove the given delimiter
     * @param $param
     * @return mixed
     */
    public function RemoveDelimiter($param, $delimiter){
        $newParam = substr($param, 2);
        if(substr($newParam, 0, 1) == $delimiter)
            $newParam = substr($newParam, 1);
        return $newParam;
    }

    /**
     * If a given number is bigger than 1000, return 0
     * @param $value
     * @return int
     */
    public function IgnoreBigNumber($value){
        return $value>1000?0:$value;
    }
}