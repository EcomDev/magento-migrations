<?php

namespace EcomDev\MagentoMigration\Api;

/**
 * Module schema interface
 *
 * Allows to specify a single schema definition in your module
 *
 */
interface SchemaDefinitionInterface
{
    /**
     * Configures schema for a module
     *
     *
     * @param SchemaInstallInterface $schemaInstall
     * @return $this
     */
    public function setup(SchemaInstallInterface $schemaInstall);
}
