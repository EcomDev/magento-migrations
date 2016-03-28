<?php

namespace EcomDev\MagentoMigration\Api\Sql;

use EcomDev\MagentoMigration\Api\NameHistoryAwareInterface;
use EcomDev\MagentoMigration\Api\SerializableInterface;

interface DropTableInterface extends NameHistoryAwareInterface, SerializableInterface
{
    /**
     * Returns name of the table
     *
     * @return string
     */
    public function getName();

    /**
     * Returns specific schema, if it was specified
     *
     * @return string|null
     */
    public function getSchema();
}
