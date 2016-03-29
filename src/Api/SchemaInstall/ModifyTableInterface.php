<?php

namespace EcomDev\MagentoMigration\Api\SchemaInstall;

use EcomDev\MagentoMigration\Api;

interface ModifyTableInterface
    extends Api\SerializableInterface,
        Api\Sql\ModifyTableInterface
{
    /**
     * Makes it possible to create SQL table modification based on changes in statement
     *
     * Returns false if no modification has been done
     *
     * @param ModifyTableInterface $modifyTable
     * @return Api\SqlInterface|false
     */
    public function calculateDifference(ModifyTableInterface $modifyTable);

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
