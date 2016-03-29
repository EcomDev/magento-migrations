<?php

namespace EcomDev\MagentoMigration\Api;

interface SchemaInstallInterface extends SerializableInterface
{
    /**
     * Creates a new create table action
     *
     * Every next method call with the same table
     * and schema should return the same create table instance
     *
     * @param string $tableName
     * @param null|string $schemaName
     * @return SchemaInstall\CreateTableInterface
     */
    public function createTable($tableName, $schemaName = null);

    /**
     * Creates a new modify table action
     *
     * Every call, even with the same table will create a new action and record it
     * It is done to make possible sequential modifications
     *
     * @param string $tableName
     * @param null|string $schemaName
     * @return Sql\ModifyTableInterface
     */
    public function modifyTable($tableName, $schemaName = null);

    /**
     * Creates a new drop table sequence
     *
     * @param $tableName
     * @param null $schemaName
     * @return mixed
     */
    public function dropTable($tableName, $schemaName = null);

    /**
     * Renames table internally
     *
     * So in case if you change name of your table,
     * it will be renamed instead of dropped and then created again
     *
     * @param string $oldName
     * @param string $newName
     * @return $this
     */
    public function renameTable($oldName, $newName);
}
