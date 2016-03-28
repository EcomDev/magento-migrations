<?php

namespace EcomDev\MagentoMigration\Api;

use EcomDev\MagentoMigration\Api\SchemaAction\NameHistoryInterface;

interface NameHistoryAwareInterface
{
    /**
     * Returns name history object for your instance
     *
     * In case if you change table or column, it is better to specify mapping via name history object
     * If name history entry is present, then migrations will create a new instance
     *
     * @return NameHistoryInterface
     */
    public function getNameHistory();
}
