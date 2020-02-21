<?php

namespace IPQualityScore\Exception;

/**
 * Class InvalidRequestException
 * @package IPQualityScore\Exception
 */
class InvalidRequestException extends \Exception
{
    /**
     * InvalidRequestException constructor.
     * @param string $message
     */
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}