<?php


namespace Ling\Light_Database\EventHandler;

/**
 * The LightDatabaseEventHandlerInterface interface.
 */
interface LightDatabaseEventHandlerInterface
{


    /**
     * Reacts to the given event, which name and args are given.
     *
     * The eventName is one of:
     *
     * - insert
     * - replace
     * - update
     * - delete
     * - fetch
     * - fetchAll
     *
     * See the @page(LightDatabasePdoWrapper class) methods for more details about the args.
     *
     *
     * @param string $eventName
     * @param array ...$args
     * @return void
     * @throws \Exception
     */
    public function handle(string $eventName, ...$args);
}