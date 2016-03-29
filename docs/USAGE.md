# Magento Migrations

## Basic Usage
This module is going to provide you an easy way to track your changes on your database when you develop Magento modules.

You should setup only single SchemaDefinition class in your setup directory in order to create your tables:

```php
<?php

namespace Your\Module\Setup;

use EcomDev\MagentoMigration\Api\SchemaDefinitionInterface;
use EcomDev\MagentoMigration\Api\SchemaInstallInterface;
use Magento\Framework\DB\Ddl\Table;

class SchemaDefinition implements SchemaDefinitionInterface
{
    public function setup(SchemaInstallInterface $schemaInstall)
    {
        $table = $schemaInstall->createTable('your_table_name');
        $table
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
```

Then you execute a console command that will create a install script based on that and will create a current version mapping file.
The mapping file will be stored in your etc directory of module in JSON format. It will be used for tracking changes to your schema definition.

For example if you change your definition to such structure (add a foreign key):
```php
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
            ->addForeignKey('column1', 'some_core_table', 'column1', Table::ACTION_CASCADE)
        ;
    }
}
```

It will create a new version class in your Setup/Versions/ directory:

```php
<?php

namespace Your\Module\Setup\Versions;

use EcomDev\MagentoMigration\Api\SchemaUpgradeInterface;
use EcomDev\MagentoMigration\Api\SchemaVersionInterface;
use Magento\Framework\DB\Ddl\Table;

class Version201603291100 implements SchemaVersionInterface
{
    public function setup(SchemaUpgradeInterface $schemaUpgrade)
    {
        $schemaUpgrade->modifyTable('your_table_name')
            ->addForeignKey('column1', 'some_core_table', 'column1', Table::ACTION_CASCADE);
    }

    public function getVersion()
    {
        return '1.0.1';
    }
}
```

After script run, the schema mapping file will be updated, so on the next run it will not create a new version file.

Method `getVersion()` returns target version to which database should be upgraded.
This value is taken directly from etc/module.xml file. 

On the next run, if you do not update etc/module.xml file and you have changes in your schema, script also will rise an exception that same version exists.

You can modify this version script at any time, if you feel that generator didn't implement it in the right way.

## Merging Branches
When you work with other team members on particular module and you both modify schema definition, you will have multiple version files with the same target version.

After doing merge of branches you must run validate command in order to check if there is any version collisions. 

It must be in 99% of the collision cases be as easy as changing `getVersion()` number and updating etc/module.xml file.
But you must always review both version file to make sure you don't do the same thing.

## Auto-generation

It will be possible to create even empty version scripts in order to let perform operations that are in-directly related to schema changes.

For instance you create custom version schema script for changing format of the data in particular table.

## Delayed SQL

All the operations are delayed, so no real DB operation is happening when you call any of the methods in version script or scheme definition. 

They all are executed afterwards, so you would be able to validate database operations before they are executed if you need to.
