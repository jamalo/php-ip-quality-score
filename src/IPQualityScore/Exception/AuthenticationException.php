<?php

namespace IPQualityScore\Exception;

/**
 * Class AuthenticationException
 * @package IPQualityScore\Exception
 */
class AuthenticationException extends \Exception
{
    /**
     * AuthenticationException constructor.
     * @param string $message
     */
    public function __construct($message = 'Invalid or unauthorized key. Please check the API key and try again.')
    {
        parent::__construct($message);
    }
}