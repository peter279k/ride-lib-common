<?php

namespace ride\library\decorator;

/**
 * Decorator to get a default value if the provided value is not of a specified
 * type
 */
class TypeOrDecorator implements Decorator {

    /**
     * Type to match
     * @var string
     */
    protected $type;

    /**
     * Default value when the provided value is not of the set type
     * @var mixed
     */
    protected $default;

    /**
     * Flag to see if objects should be translated into their class name
     * @var boolean
     */
    protected $resolveObject;

    /**
     * Constructs a new type or decorator
     * @param string $type Type of the variable to pass
     * @param mixed $default Default value when the variable is not of the
     * provided type
     * @param boolean $resolveObject Set to true to translate the object type
     * into it's class name
     */
    public function __construct($type, $default = null, $resolveObject = false) {
        $this->type = $type;
        $this->default = $default;
        $this->resolveObject = $resolveObject;
    }

    /**
     * Decorates the provided value to default if it's not of the provided type
     * @param mixed $value Value to decorate
     * @return mixed Default if the provided value was not of the set type, the
     * provided value otherwise
     */
    public function decorate($value) {
        $type = gettype($value);

        if ($type === 'object' && $this->resolveObject) {
            $type = get_class($value);
        }

        if ($type != $this->type) {
            return $this->default;
        }

        return $value;
    }

}
