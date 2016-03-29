<?php

namespace EcomDev\MagentoMigration\Api;

/**
 * Name history container interface
 *
 *
 */
interface NameHistoryInterface extends SerializableInterface
{
    /**
     * Adds name history entry
     *
     * If namespace is specified it will use it as base
     *
     * @param string $oldName
     * @param string $newName
     * @param string|null $namespace
     * @return string
     */
    public function add($oldName, $newName, $namespace = null);

    /**
     * Resolves name history changes in container
     *
     * @param string $name
     * @param string|null $namespace
     * @return string
     */
    public function resolve($name, $namespace = null);
}
