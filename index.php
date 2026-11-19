<?php
require 'vendor/autoload.php';

use App\MagicClass;

echo "<h1>Демонстрация магических методов</h1>";

// 1. __construct - вызывается при создании объекта
echo "<h2>1. __construct</h2>";
$obj = new MagicClass();

// 2. __get - вызывается при обращении к несуществующему свойству
echo "<h2>2. __get</h2>";
$value = $obj->nonexistentProperty;

// 3. __set - вызывается при присваивании несуществующему свойству
echo "<h2>3. __set</h2>";
$obj->newProperty = "test value";

// 4. __isset - вызывается при проверке isset() на несуществующем свойстве
echo "<h2>4. __isset</h2>";
isset($obj->anotherProperty);

// 5. __unset - вызывается при unset() на несуществующем свойстве
echo "<h2>5. __unset</h2>";
unset($obj->someProperty);

// 6. __call - вызывается при вызове несуществующего метода
echo "<h2>6. __call</h2>";
$obj->nonexistentMethod("arg1", "arg2");

// 7. __callStatic - вызывается при вызове несуществующего статического метода
echo "<h2>7. __callStatic</h2>";
MagicClass::staticNonexistentMethod();

// 8. __toString - вызывается при попытке вывести объект как строку
echo "<h2>8. __toString</h2>";
echo $obj;

// 9. __invoke - вызывается при попытке вызвать объект как функцию
echo "<h2>9. __invoke</h2>";
$obj();

// 10. __clone - вызывается при клонировании объекта
echo "<h2>10. __clone</h2>";
$clone = clone $obj;

// 11. __debugInfo - вызывается при var_dump()
echo "<h2>11. __debugInfo</h2>";
var_dump($obj);

// 12. __serialize и __unserialize - вызывается при serialize/unserialize
echo "<h2>12. __serialize и __unserialize</h2>";
$serialized = serialize($obj);
unserialize($serialized);

// 13. __destruct - вызывается при уничтожении объекта
echo "<h2>13. __destruct</h2>";
echo "Объект будет уничтожен в конце скрипта<br>";

echo "Автозагрузка Composer работает!\n";


echo "<h1>Реализация геометрии в ООП</h1>";

use App\Point;
use App\Vector;

// 3.a. Точка с произвольными координатами T1
$t1 = new Point(5, 5);
echo "<p>Исходная точка T1: ({$t1->x}, {$t1->y})</p>";

// 3.b. Произвольный вектор V1 (например, 3 по X и 4 по Y)
$v1 = new Vector(3, 4);

// 3.c. Нулевой вектор V2
$v2 = new Vector(0, 0);

// 3.d. Вектор V3, перпендикулярный V1. 
// Если V1 = (3, 4), то перпендикулярный ему V3 = (-4, 3) или (4, -3), 
// так как их скалярное произведение (3*-4 + 4*3) = -12 + 12 = 0.
$v3 = new Vector(-4, 3);

// 4. Находим и печатаем длину каждого вектора
echo "<h3>Длины векторов:</h3>";
echo "<p>Длина V1: " . $v1->length() . "</p>"; // Должно быть 5 (3-4-5 треугольник)
echo "<p>Длина V2: " . $v2->length() . "</p>"; // Должно быть 0
echo "<p>Длина V3: " . $v3->length() . "</p>"; // Должно быть 5

// 5. Убеждаемся, что вектор V3 и V1 перпендикулярны друг другу
$isPerp = $v1->isPerpendicular($v3) ? "Да, перпендикулярны" : "Нет, не перпендикулярны";
echo "<p>V1 и V3 перпендикулярны? <b>$isPerp</b></p>";

// Проверка V2 на нулевой
$isZero = $v2->isZero() ? "Да, является" : "Нет, не является";
echo "<p>V2 является нулевым вектором? <b>$isZero</b></p>";

// 6. Переносим точку T1 на вектор V1
echo "<h3>Перенос точки:</h3>";
echo "<p>Переносим T1 на вектор V1 (dx={$v1->x}, dy={$v1->y})...</p>";
$t1->move($v1->x, $v1->y);
echo "<p>Новые координаты точки T1: ({$t1->x}, {$t1->y})</p>"; // Должно быть (8, 9)
?>