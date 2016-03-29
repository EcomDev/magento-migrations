<?php

namespace EcomDev\MagentoMigration\Api;

interface SchemaVersionInterface
{
    /**
     * Configures particular version
     *
     * @param SchemaUpgradeInterface $upgrade
     * @return $this
     */
    public function setup(SchemaUpgradeInterface $upgrade);

    /**
     * Returns from version number that will be used for version upgrade
     *
     * In case if current scheme version is above this number,
     * it will execute this upgrade script
     *
     * @return string
     */
    public function getVersion();
}
