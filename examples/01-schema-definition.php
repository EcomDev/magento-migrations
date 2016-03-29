<?php

namespace Your\Module\Setup;

use EcomDev\MagentoMigration\Api\SchemaDefinitionInterface;
use EcomDev\MagentoMigration\Api\SchemaInstallInterface;
use Magento\Framework\DB\Ddl\Table;

class SchemaDefinition implements SchemaDefinitionInterface
{
    public function setup(SchemaInstallInterface $schemaInstall)
    {
        $schemaInstall->createTable('your_table_name')
            ->addColumn('primary_id', Table::TYPE_INTEGER, null, [
                'primary' => true,
                'unsigned' => true,
                'identity' => true
            ])
            ->addColumn('column1', Table::TYPE_TEXT, 255)
            ->addColumn('column2', Table::TYPE_INTEGER)
            ->addColumn('column3', Table::TYPE_DATETIME)
            ->addIndex('column1')
        ;
    }
}
