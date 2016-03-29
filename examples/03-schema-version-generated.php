<?php

namespace Your\Module\Setup\Versions;

use EcomDev\MagentoMigration\Api\SchemaUpgradeInterface;
use EcomDev\MagentoMigration\Api\SchemaVersionInterface;
use Magento\Framework\DB\Ddl\Table;

class Version201603291100 implements SchemaVersionInterface
{
    public function setup(SchemaUpgradeInterface $schemaUpgrade)
    {
        $table = $schemaUpgrade->modifyTable('your_table_name');
        $table->addForeignKey('column1', 'some_core_table', 'column1', Table::ACTION_CASCADE);
    }

    public function getVersion()
    {
        return '1.0.1';
    }
}
