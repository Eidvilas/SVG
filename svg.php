<?php
/**
 * Created by PhpStorm.
 * User: Edis
 * Date: 1/30/2018
 * Time: 10:52 AM
 */
class Tag {
    protected $name;
    protected $attributes;
    protected $draw;
    protected $text;
    public function draw() {
        $draw = '<';
        $draw .= $this->name . " ";
        foreach ($this->attributes as $key => $attribute) {
            echo $draw .= $key . "='" . $attribute . "' ";
        }
        if (!isset($this->text)) {
            $draw .=  "/>";
        } else {
            $draw .= ">" . $this->text['text'] . "</text>";
        }
        // $draw .=   . " x='" . $this->attributes['x']  . "' y='" . $this->attributes['y']  . "' "  ;
        // $draw .= "width='" . $this->attributes['width']  . "' height=" . "'" . $this->attributes['height']  . "'"  ;
        // <text x="0" y="15" fill="red">I love SVG!</text>
        //  <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" />
        return $draw;
        // "<" . $this->name . x="50" y="20" width="150" height="150"
        //   <rect x="50" y="20" width="150" height="150"
    }
}
class Rectangle extends Tag {
    public function __construct ($width, $height, $x, $y, $style )
    {
        $this->name = 'rect';
        $this->attributes = [
            'x' => $x,
            'y' => $y,
            'width' => $width,
            'height' => $height,
            'fill' => $style,
        ];
    }
}
class circle extends Tag {
    public function __construct ($cx, $cy, $r, $style )
    {
        $this->name = 'circle';
        $this->attributes = [
            'cx' => $cx,
            'cy' => $cy,
            'r' => $r,
            'fill' => $style,
        ];
    }
}
class polygon extends Tag {
    public function __construct ($a, $b, $c, $style)
    {
        $this->name = 'polygon';
        $this->attributes = [
            'points' => $a->x . "," . $a->y . " " . $b->x . "," . $b->y . " " . $c->x . "," . $c->y,
            'fill' => $style,
        ];
    }
}
class points {
    public $x;
    public $y;
    public function __construct ($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}
class text extends Tag {
    public function __construct ($x, $y, $style, $text )
    {
        $this->name = 'text';
        $this->attributes = [
            'x' => $x,
            'y' => $y,
            'fill' => $style,
        ];
        $this->text = [
            'text' => $text ,
        ];
    }
}
class trapecija  {
    public $aaa;
    public $triangle1;
    public $triangle2;

    public function __construct ($x, $y, $height, $width, $width2, $style) {
        $startPointX = $x+($width - $width2)/2;
        $startPointY = $y-$height;
        $endPointX =  $x+$width-($width - $width2)/2;
        $endPointx2 =$x + $width;

        $rect2 = new Rectangle($width2, $height , $startPointX, $startPointY, $style);
        $this->aaa = $rect2;

        //triange 1

        $trian = new polygon (new points($x, $y), new points($startPointX, $y), new points($startPointX, $startPointY), $style );
        $this -> triangle1 =$trian;

        //triange 2

        $trian2 = new polygon (new points($endPointX, $y), new points($endPointX, $startPointY), new points($endPointx2, $y), $style );
        $this -> triangle2 =$trian2;

// $trapecija = new trapecija(300, 500, 600, 800, 300, 'yellow');
// <polygon points="850,500 850,-100 1100,500" <polygon="" fill="yellow"></polygon>

    }
    public function draw2(){
        return $this->aaa->draw();
    }

    public function draw3(){
        return $this->triangle1->draw();

    }

    public function draw4(){
        return $this->triangle2->draw();
    }

}
// <polygon points="200,10 250,190 160,210" style="fill:lime;stroke:purple;stroke-width:1" />
$rect = new Rectangle(300, 200, 300, 100, 'red');
$circle = new circle (450, 200, 90, 'green');
$points = new polygon (new points(100, 300), new points(300, 100), new points(300, 300), 'lime' );
$points2 = new polygon (new points(600, 100), new points(800, 300), new points(600, 300), 'lime' );
$text = new text (415, 200, "black", 'Labas vakaras');

echo '<svg width="1000" height="300">';
echo $points -> draw();
echo $rect -> draw();
echo $points2 -> draw();
echo $circle -> draw();
echo $text -> draw();
echo '</svg>';
echo "<br><hr><br>";




//echo $trapecija->draw3();
$trapecija = new trapecija(300, 700, 600, 800, 300, 'yellow');

echo '<svg width="1000" height="300">';
echo $trapecija->draw2();
echo $trapecija->draw3();
echo $trapecija->draw4();
echo '</svg>';
