<?php


namespace Ling\Light_Database\Aware;


use Ling\Light_Database\LightDatabasePdoWrapper;

/**
 * The LightDatabasePdoWrapperAwareInterface interface.
 */
interface LightDatabasePdoWrapperAwareInterface
{


    /**
     * Sets the pdo wrapper instance.
     *
     * @param LightDatabasePdoWrapper $pdoWrapper
     */
    public function setPdoWrapper(LightDatabasePdoWrapper $pdoWrapper);
}