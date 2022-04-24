<?php

namespace App\BuiltIn\DataType\FixedTypeArray;

class FixedTypeArray {
    protected $enums; // Accepted datatypes
        
    protected $frame; // Stack info

    /**
    * Array that only allows an user set specific datatype. Allows:
    * INTE;
    * STRI;
    * DOUB;
    * ARRA;
    */
    public function __construct($type) {
        $this->enums = new FixedTypeArrayEnums();

        $this->frame = [
            'values' => [],
            'accepted_type' => '',
            'length' => 0
        ];

        $this->checkType($type, ": The datatype $type is not allowed");
    }

    // Start of available public functions
    
    /**
     * Appends data with the required checks
     *  * The datatype and the type set in the StaticArray must be the same
     */
    public function softAppend($value) {
        $dataType = gettype($value);

        if($this->checkTypeToAppend($dataType)) {
            $this->_hardAppend($value);
        }

    }

    /**
     * *Experimental feature*
     * Allows the insert of data without running any required checks
     *  * The datatype and the type set in the StaticArray don't have to be the same
     */
    public function _hardAppend($value) {  
        array_push($this->frame["values"], $value);
        $this->changeLength();
    }

    /**
     * Returns the amount of values set in the StaticArray
     */

    public function length() {
        return (int)sizeof($this->frame['values']);
    }

    /**
     * Returns all the values added to the StaticArray as an array allowing the iteration
     * or raw modification of the data
     */
    public function toArray(): array
     {
        return $this->frame['values'];
    }

    /**
     * By any chance
     */
    public function _toString(string $delimiter = ', '): string
    {
        return implode($delimiter, $this->toArray());
    }

    // End of available public functions

    // Start of private core functions

    private function changeLength() {
        $this->frame['length'] = $this->length();
    }

    public function _getPossibleTypes(): array 
    {
        $possibleTypes = [];
        foreach($this->enums as $key => $value) {
            $possibleTypes[] = $key;
        }
        return $possibleTypes;
    }

    // End of private Core functions

    // 

    // Start of check functions
    private function checkType($type, $details) {
        if(!isset($this->enums->$type)) {
            throw new FixedTypeArrayException($details);
            die();
        }

        $this->frame['accepted_type'] = $this->enums->$type;

        return true;
    }

    private function checkTypeToAppend($type) {
        $same = strcmp($type, $this->frame["accepted_type"]);

        if($same === 0) {
            return true;
        }

        throw new FixedTypeArrayException(": Cannot append a value with the datatype `$type`, the array only supports `{$this->frame['accepted_type']}`");

        return false;
       
    }

    // End of check functions
}