<?php

namespace EcomDev\MagentoMigration\Api;

interface TableInterface
{
    /**
     * Returns name of the table
     *
     * @return string
     */
    public function getName();

    /**
     * Returns schema
     *
     * @return string
     */
    public function getSchema();
}
