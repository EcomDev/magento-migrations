<?php

namespace EcomDev\MagentoMigration\Api;

/**
 * Provides methods for saving object into array
 *
 */
interface SerializableInterface
{
    /**
     * Exports object properties into array
     *
     * @return array
     */
    public function toArray();

    /**
     * Imports array into object properties
     *
     * @param array $array
     * @return $this
     */
    public function fromArray(array $array);
}
