<?php
namespace App;

class Vector
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    // 1. Определение длины вектора (теорема Пифагора)
    public function length()
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    // 2. Проверка на то, что вектор является нулевым
    public function isZero()
    {
        return $this->x == 0 && $this->y == 0;
    }

    // 3. Проверка на перпендикулярность другому вектору (скалярное произведение равно 0)
    public function isPerpendicular(Vector $other)
    {
        return ($this->x * $other->x + $this->y * $other->y) == 0;
    }
}
?>