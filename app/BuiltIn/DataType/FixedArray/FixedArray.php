<?php

namespace App\BuiltIn\DataType\FixedArray;

class FixedArray {
    protected $enums; // Accepted datatypes
        
    protected $frame; // Stack info

    /**
     * Array that only allows an user set specific datatype
     */
    public function __construct($type) {
        $this->enums = new FixedArrayEnums();

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
            $this->__hardAppend($value);
        }

        $this->changeLength();

    }

    /**
     * *Experimental feature*
     * Allows the insert of data without running any required checks
     *  * The datatype and the type set in the StaticArray don't have to be the same
     */
    public function __hardAppend($value) {  
        array_push($this->frame["values"], $value);
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
    public function __toString(): string
    {
        return implode(', ', $this->toArray());
    }

    // End of available public functions

    // Start of private core functions

    private function changeLength() {
        $this->frame['length'] = $this->length();
    }

    // End of private Core functions

    // 

    // Start of check functions
    private function checkType($type, $details) {
        if(!isset($this->enums->$type)) {
            throw new FixedArrayException($details);
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

        throw new FixedArrayException(": Cannot append a value with the datatype `$type`, the array only supports `{$this->frame['accepted_type']}`");

        return false;
       
    }

    // End of check functions
}