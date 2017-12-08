<?php

class Box
{
    private $length;
    private $width;
    private $height;

    function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }


    public function setLength(float $length)
    {
        if ($length > 0) {
            $this->length = $length;
        }else{
            throw new Exception('Length cannot be zero or negative.');
        }
    }

    public function setWidth(float $width)
    {
        if ($width > 0) {
            $this->width = $width;
        }else{
            throw new Exception('Width cannot be zero or negative.');
        }
    }

    public function setHeight(float $height)
    {
        if ($height > 0) {
            $this->height = $height;
        }else{
            throw new Exception('Height cannot be zero or negative.');
        }
    }


    public function volume()
    {
        return $this->length * $this->height * $this->width;
    }

    public function lateralSurfaceArea()
    {
        return 2 * $this->length * $this->height + (2 * $this->width * $this->height);
    }

    public function surfaceArea()
    {
        return 2 * $this->length * $this->width + 2 * $this->length * $this->height + (2 * $this->width * $this->height);
    }
}
try {
    $length = floatval(rtrim(fgets(STDIN)));
    $width = floatval(rtrim(fgets(STDIN)));
    $height = floatval(rtrim(fgets(STDIN)));

    $myBox = new Box($length, $width, $height);

    echo "Surface Area - " . str_replace(',', '', (string)number_format($myBox->surfaceArea(), 2)) . "\n";
    echo "Lateral Surface Area - " . str_replace(',', '', (string)number_format($myBox->lateralSurfaceArea(), 2)) . "\n";
    echo "Volume - " . str_replace(',', '', (string)number_format($myBox->volume(), 2)) . "\n";
}catch (Exception $e){
    echo $e->getMessage();
}