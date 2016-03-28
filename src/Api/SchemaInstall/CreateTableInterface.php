<?php

namespace EcomDev\MagentoMigration\Api\SchemaInstall;

use EcomDev\MagentoMigration\Api\NameHistoryAwareInterface;
use EcomDev\MagentoMigration\Api\SerializableInterface;

interface CreateTableInterface
    extends NameHistoryAwareInterface, SerializableInterface
{
    /**
     * @param CreateTableInterface $createTable
     * @return mixed
     */
    public function diff(CreateTableInterface $createTable);
}
