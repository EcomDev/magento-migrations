<?php

namespace EcomDev\MagentoMigration\Api;

interface SchemaUpgradeInterface
{
    /**
     * Creates a new create table action
     *
     * Every next method call with the same table
     * and schema should return the same create table instance
     *
     * @param string $tableName
     * @param null|string $schemaName
     * @return Sql\CreateTableInterface
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
     * @return Sql\DropTableInterface
     */
    public function dropTable($tableName, $schemaName = null);

    /**
     * Add SQL statement
     *
     * @param SqlInterface $sql
     * @return string
     */
    public function addSql(SqlInterface $sql);

    /**
     * Returns list of statements
     *
     * @return SqlInterface[]
     */
    public function getSql();
}
