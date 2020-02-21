<?php

namespace IPQualityScore\Exception;

/**
 * Class ApiException
 * @package IPQualityScore\Exception
 */
class ApiException extends \Exception
{
    /**
     * ApiException constructor.
     * @param string $message
     */
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}