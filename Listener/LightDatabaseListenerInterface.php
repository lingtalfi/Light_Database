<?php


namespace Ling\Light_Database\Listener;


/**
 * The LightDatabaseListenerInterface interface.
 */
interface LightDatabaseListenerInterface
{

    /**
     * Reacts to the dispatched event which name and args are given.
     *
     * @param string $eventName
     * @param array ...$args
     * @return void
     * @throws \Exception
     */
    public function execute(string $eventName, array ...$args);
}