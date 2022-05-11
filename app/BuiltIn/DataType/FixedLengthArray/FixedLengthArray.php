<?php

namespace App\BuiltIn\DataType\FixedLengthArray;

class FixedLengthArray{

    private $frame;

    public function __construct(int $size)
    {
        $this->frame = [
            'values' => [],
            'accepted_type' => '',
            'size' => $size,
            'length' => 0
        ];
    }

    public function softAppend($value): void 
    {
        $this->checkLength("
            FixedLengthArray only allows {$this->frame['size']} elements, {$this->frame['length']} given
        ");

        $this->_hardAppend($value);
    }

    public function _hardAppend($value): void
    {
        array_push($this->frame['values'], $value);
        $this->changeLength();
    }


    private function changeLength(): void
    {
        $this->frame['length'] = count($this->frame['values']);
    }

    public function toArray(): array
    {
        return $this->frame['values'];
    }

    public function _toString(string $delimiter = ', '): string
    {
        return implode($delimiter, $this->toArray());
    }

    /**
     * Check functions
     */

    private function checkLength(string $details) {
        if($this->frame['length'] > $this->frame['size'] ) {
            throw new FixedLengthArrayException($details);
            die();
        }

        return true;
    }
}

?>