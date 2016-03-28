<?php

namespace EcomDev\MagentoMigration\Api;

/**
 * SQL statement interface
 *
 */
interface SqlInterface
{
    /**
     * Compiles itself into SQL strings, ready for execution
     *
     * @return string[]
     */
    public function compile();
}
