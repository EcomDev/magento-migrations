<?php

namespace EcomDev\MagentoMigration\Api\SchemaAction;

use EcomDev\MagentoMigration\Api\SerializableInterface;

interface NameHistoryInterface extends SerializableInterface
{
    public function add($oldName, $newName);
}
