<?php

namespace Esky\Enum;

class Enum
{
    private $value;

    protected static $names = array();
    protected static $constants = array();

    /**
     * @param $value
     * @throws \Exception
     */
    public function __construct($value)
    {
        $this->validateValue($value);
        $this->value = $value;
    }

    public function isEqual($value)
    {
        if ($value instanceof self) {
            $value = $value->getValue();
        }

        return $value == $this->getValue();
    }

    /**
     * @param $name
     * @throws \Exception
     * @internal param mixed $value
     * @return \static
     */
    public static function createFromConstantName($name)
    {
        if (!defined('static::'.$name)) {
            throw new \InvalidArgumentException('Invalid constant name for enum '.get_called_class().': '.$name);
        }
        return new static(constant('static::'.$name));
    }

    /**
     * @param $value
     * @throws \Exception
     * @return void
     */
    private function validateValue($value)
    {
        if (is_null($value)) {
            return;
        }
        if (!array_key_exists($value, self::getNamesFromConstants())) {
            throw new \InvalidArgumentException('Invalid value for enum '.get_called_class().': '.$value);
        }
    }

    /**
     * @return int[string]
     */
    private static function loadClassConstants($className)
    {
        $reflector = new \ReflectionClass($className);

        $constants = $reflector->getConstants();
        self::validateConstants($className, $constants);

        return $constants;
    }

    /**
     * @return int[]
     */
    private static function getClassConstants($className)
    {
        if (!array_key_exists($className, self::$constants)) {
            self::$constants[$className] = self::loadClassConstants($className);
        }
        return self::$constants[$className];
    }

    /**
     * @param string $className
     * @param array $constants
     * @throws \Exception
     * @return void
     */
    private static function validateConstants($className, array $constants)
    {
        $values = array();
        foreach($constants as $value) {
            if (in_array($value, $values)) {
                throw new \RuntimeException('Duplicated constant value in enum class '.$className.': '.$value);
            }
            $values[] = $value;
        }
    }

    /**
     * @return string[]
     */
    private static function getNamesFromConstants()
    {
        $constants = self::getClassConstants(get_called_class());
        $names = array();

        foreach ($constants as $name => $value) {
            $names[$value] = $name;
        }

        return $names;
    }

    /**
     * @return string[]
     */
    private function filterNames(array $allNames, array $values)
    {
        $names = array();
        foreach ($values as $value) {
            self::validateValue($value);
            $names[$value] = $allNames[$value];
        }
        return $names;
    }

    /**
     * @return string[]
     */
    public static function getNames($values = null)
    {
        $names = static::$names + self::getNamesFromConstants();
        if (is_array($values)) {
            $names = self::filterNames($names, $values);
        }

        return $names;
    }

    /**
     * @return int[]
     */
    public static function getValues()
    {
        $constants = self::getClassConstants(get_called_class());

        return array_values($constants);
    }

    /**
     * @return Enum[]
     */
    public static function createArray($values = null)
    {
        if (is_null($values)) {
            $values = self::getValues();
        }
        $className = get_called_class();

        return array_map(function($value) use ($className) {
            return new $className($value);
        }, $values);
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        if (is_null($this->value)) {
            return null;
        }
        $names = self::getNames();

        return $names[$this->value];
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public static function isValidValue($value)
    {
        $names = self::getNamesFromConstants();
        $isValid = array_key_exists($value, $names);

        return $isValid;
    }
}
