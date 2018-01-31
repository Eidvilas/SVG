<?php

class aaa {
    public function bbb(){
        echo "vienas";
    }
}


class trapecija  {


    function ccc(){
        $rect2 = new aaa;
        return $rect2->bbb();
    }
}

$ddd = new trapecija;
$ddd->ccc();

echo "vjdjfsf";

//  <rect x="50" y="20" width="150" height="150" />
// <rect x="350" <rect="" y="200" width="300" height="200" fill="lime"></rect>

public function draw2(){
    $rect2 = new Rectangle(400, 300, 300, 100, 'red');
    $rect2 -> draw();

}

public function __construct ($x, $y, $height, $width, $width2) {
    $startPointX = $x+($width - $width2)/2;
    $startPointY = $y-$height;
    $rect2 = new Rectangle($width, $height, $startPointX, $startPointY, 'lime');
    $this->aaa = $rect2 -> draw();
}


class trapecija  {

    public $aaa;

    public function __construct ($x, $y, $height, $width, $width2) {
        $startPointX = $x+($width - $width2)/2;
        $startPointY = $y-$height;
        $rect2 = new Rectangle($width, $height , $startPointX, $startPointY, 'lime');
        $this->aaa = $rect2 -> draw();
    }


    public function draw2(){

        echo $this->aaa;
    }

}