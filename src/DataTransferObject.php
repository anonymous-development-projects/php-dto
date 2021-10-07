<?php

declare(strict_types=1);

namespace ADP\DataTransferObject;

use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

use function is_array;
use function json_encode;

abstract class DataTransferObject implements JsonSerializable, DTOInterface
{
    /** @var array<string> */
    protected $attributes;

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {
            if ($reflectionProperty->isStatic()) {
                continue;
            }

            $property = $reflectionProperty->getName();
            $this->{$property} = $params[$property];

            // save properties to attributes
            $this->attributes[] = $property;
        }
    }

    /**
     * Convert the model instance to Array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->parseArray($this->getAllPropertiesWithValues());
    }

    /**
     * Convert the model instance to JSON.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Get all attributes as array
     *
     * @return array<string>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return array
     */
    protected function getAllPropertiesWithValues(): array
    {
        $data = [];

        foreach ($this->attributes as $property) {
            $data[$property] = $this->$property;
        }

        return $data;
    }

    /**
     * Recursive array representation of DTOs
     *
     * @param array $array
     *
     * @return array
     */
    protected function parseArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if ($value instanceof DTOInterface) {
                $array[$key] = $value->toArray();
                continue;
            }

            if (!is_array($value)) {
                continue;
            }

            $array[$key] = $this->parseArray($value);
        }

        return $array;
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
