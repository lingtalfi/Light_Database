<?php


namespace Ling\Light_Database\Service;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\CliTools\Formatter\BashtmlFormatter;
use Ling\Light\Events\LightEvent;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_Logger\LightLoggerService;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;

/**
 * The LightDatabaseService class.
 */
class LightDatabaseService extends LightDatabasePdoWrapper
{

    /**
     * This property holds the options for this instance.
     *
     *
     * See our @page(Light_Database conception notes options) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightDatabaseService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->options = [];
    }


    /**
     *
     * Sets the options.
     *
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Embellishes the error message in SimplePdoWrapperQueryException exceptions.
     * @param LightEvent $event
     *
     */
    public function onExceptionCaught(LightEvent $event): void
    {
        $e = $event->getVar("exception");
        if ($e instanceof SimplePdoWrapperQueryException) {
            $devMode = $this->options['devMode'] ?? false;
            if (true === $devMode) {
                $e->setMessage($e->getMessage() . " ||| query=" . $e->getQuery() . " ||| markers=" . ArrayToStringTool::toInlinePhpArray($e->getMarkers()));
            }
        }
    }


    /**
     * @overrides
     */
    protected function queryLog(string $type, ...$args)
    {
        /**
         * @var $lg LightLoggerService
         */
        $lg = $this->container->get("logger");

        $bashFmt = new BashtmlFormatter();
        $sType = $type;
        $fmt = $this->options["queryLogFormatting"] ?? null;
        if (null !== $fmt) {
            $sType = $bashFmt->format("<$fmt>$sType</$fmt>");
        }


        switch ($type) {
            case "insert":
            case "replace":
            case "update":
            case "delete":
                $query = trim($args[1]);
                $markers = $args[2];
                $msg = $sType . ":" . $query . PHP_EOL;
                $msg .= 'markers: ' . ArrayToStringTool::toPhpArray($markers);
                break;
            case "fetch":
            case "fetchAll":
                $query = trim($args[0]);
                $markers = $args[1];
                $msg = $sType . ":" . $query . PHP_EOL;
                $msg .= 'markers: ' . ArrayToStringTool::toPhpArray($markers);
                break;
            case "execute":
                $query = trim($args[0]);
                $msg = $sType . ":" . $query;
                break;
            default:
                $msg = $sType;
                break;
        }
        $lg->log($msg, "database");
    }


}