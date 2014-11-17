PHP Enum implementation
=======================

[![Build Status](https://travis-ci.org/eskypl/enum.svg?branch=master)](https://travis-ci.org/eskypl/enum)

##Documentation

### construct

```php
$type = new Type(Type::BASIC);
$type = Type::createFromConstantName('BASIC');
$type = Type::BASIC();

new Type(5); // InvalidArgumentException
```

### instance methods

```php
$type->getValue(); // 1
$type->getName(); // BASIC
$type->isEqual($type); // true
$type->isEqual(Type::Basic); // true
```

### static methods

```php
Type::getValues(); // [1, 2]
Type::getNames(); // [1 => 'BASIC', 2 => 'COMPLEX']
Type::getNames([2]); // [2 => 'COMPLEX']

Type::isValidValue(1); // true
Type::isValidValue(3); // false
```

### handle null value

```php
$nullType = new Type(null);

$nullType->getName(); // null
$nullType->getValue(); // null
```