<?php

namespace  EcomDev\MagentoMigration\Api\Sql;

use EcomDev\MagentoMigration\Api;


/**
 * Modify table schema action
 *
 * It should be used to perform all modifications on a table
 */
interface ModifyTableInterface
    extends Api\TableInterface,
            Api\SqlInterface
{
    /**
     * Adds a new column to existing table
     *
     * @param string $name
     * @param string $type
     * @param int|int[]|null $length
     * @param array $options
     * @param string|null $comment
     * @return mixed
     */
    public function addColumn($name, $type, $length = null, array $options = [], $comment = null);

    /**
     * Drops a column
     *
     * @param string $name
     * @return $this
     */
    public function dropColumn($name);

    /**
     * Adds a new index on column(s)
     *
     * @param string[]|string $columns
     * @return $this
     */
    public function addIndex($columns);

    /**
     * Drops index from table on column(s)
     *
     * @param string[]|string $columns
     * @return $this
     */
    public function dropIndex($columns);

    /**
     * Drops unique key
     *
     * @param string|string[] $columns
     * @return $this
     */
    public function addUniqueKey($columns);

    /**
     * Drops unique key
     *
     * @param string|string[] $columns
     * @return $this
     */
    public function dropUniqueKey($columns);

    /**
     * Adds primary key on specified column(s)
     *
     * @param string|string[] $columns
     * @return $this
     */
    public function addPrimaryKey($columns);

    /**
     * Drops a primary key on column(s)
     *
     * @param string|string[] $columns
     * @return mixed
     */
    public function dropPrimaryKey($columns);

    /**
     * Drops a foreign key
     *
     * @param string $column
     * @param string $foreignTable
     * @param string $foreignColumn
     * @return $this
     */
    public function dropForeignKey($column, $foreignTable, $foreignColumn);

    /**
     * Adds a foreign key to existing table
     *
     * @param string $column
     * @param string $foreignTable
     * @param string $foreignColumn
     * @param null|string $actionDelete
     * @return $this
     */
    public function addForeignKey($column, $foreignTable, $foreignColumn, $actionDelete = null);

    /**
     * Sets table option
     *
     * @param string $option
     * @param string $value
     * @return $this
     */
    public function setOption($option, $value);

    /**
     * Sets comment for a table
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment);
}
