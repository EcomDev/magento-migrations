<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25/03/16
 * Time: 10:15
 */

namespace EcomDev\MagentoMigration\Api\Sql;



/**
 * Creates a create table action
 *
 */
interface CreateTableInterface extends TableInterface
{
    /**
     * Adds a column into create table schema action
     *
     * @param string $name
     * @param string $type
     * @param int|int[]|null $length
     * @param array $options
     * @param null|string $comment
     * @return $this
     */
    public function column($name, $type, $length = null, array $options = [], $comment = null);

    /**
     * Adds indx key into create table schema action
     *
     * @param array|string $columns
     * @return $this
     */
    public function index($columns);

    /**
     * Adds index key
     *
     * @param array|string $columns
     * @return $this
     */
    public function uniqueKey($columns);

    /**
     * Adds a new foreign key
     *
     * @param $column
     * @param $foreignTable
     * @param $foreignColumn
     * @param null|string $actionDelete
     * @return $this
     */
    public function foreignKey($column, $foreignTable, $foreignColumn, $actionDelete = null);

    /**
     * Adds a new option for a table
     *
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function option($name, $value);
}
