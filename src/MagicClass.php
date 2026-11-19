<?php
namespace App;

class MagicClass {
    public function __construct() {
        echo "__construct вызван<br>";
    }
    
    public function __destruct() {
        echo "__destruct вызван<br>";
    }
    
    public function __get($name) {
        echo "__get вызван для свойства '$name'<br>";
    }
    
    public function __set($name, $value) {
        echo "__set вызван: $name = $value<br>";
    }
    
    public function __isset($name) {
        echo "__isset вызван для '$name'<br>";
        return false;
    }
    
    public function __unset($name) {
        echo "__unset вызван для '$name'<br>";
    }
    
    public function __call($name, $arguments) {
        echo "__call вызван: метод '$name' с аргументами [" . implode(', ', $arguments) . "]<br>";
    }
    
    public static function __callStatic($name, $arguments) {
        echo "__callStatic вызван: метод '$name'<br>";
    }
    
    public function __toString() {
        return "__toString вызван<br>";
    }
    
    public function __invoke() {
        echo "__invoke вызван<br>";
    }
    
    public static function __set_state($array) {
        echo "__set_state вызван<br>";
        return new self();
    }
    
    public function __clone() {
        echo "__clone вызван<br>";
    }
    
    public function __debugInfo() {
        echo "__debugInfo вызван<br>";
        return ['info' => 'debug'];
    }
    
    public function __serialize() {
        echo "__serialize вызван<br>";
        return [];
    }
    
    public function __unserialize($data) {
        echo "__unserialize вызван<br>";
    }
}
?>