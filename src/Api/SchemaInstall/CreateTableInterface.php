<?php

namespace EcomDev\MagentoMigration\Api\SchemaInstall;

use EcomDev\MagentoMigration\Api;

interface CreateTableInterface
    extends Api\SerializableInterface, // Should be possible to store to external file
            Api\Sql\CreateTableInterface // Should be possible to execute as statement
{
    /**
     * Makes it possible to create SQL table modification based on changes in table
     *
     * Returns false if no modification has been done
     *
     * @param CreateTableInterface $createTable
     * @return Api\SqlInterface|false
     */
    public function calculateDifference(CreateTableInterface $createTable);

    /**
     * Rename column for feature reference
     *
     * It will let system know that column should not be dropped and then created,
     * but being renamed instead
     *
     * @param string $oldColumnName
     * @param string $newColumnName
     * @return $this
     */
    public function renameColumn($oldColumnName, $newColumnName);
}
