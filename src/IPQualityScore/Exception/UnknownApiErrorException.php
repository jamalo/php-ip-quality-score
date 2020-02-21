<?php

namespace IPQualityScore\Exception;

/**
 * Class UnknownApiErrorException
 * @package IPQualityScore\Exception
 */
class UnknownApiErrorException extends \Exception
{
    /**
     * UnknownApiErrorException constructor.
     * @param string $message
     */
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}