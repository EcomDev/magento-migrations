<?php

namespace EcomDev\MagentoMigration\Api;

use Magento\Framework\DB\Ddl\Table;

/**
 * Module will extend Magento connection adapter via DI
 *
 * It is required to make possible retrieval of compilation of create table database statement
 *
 */
interface AdapterInterface extends \Magento\Framework\DB\Adapter\AdapterInterface
{
    /**
     * Returns create table sql statement
     *
     * @param Table $table
     * @return string
     */
    public function getCreateTableSql(Table $table);
}
