<?php

namespace IPQualityScore\Exception;

/**
 * Class InvalidIPAddressException
 * @package IPQualityScore\Exception
 */
class InvalidIPAddressException extends \Exception
{
    /**
     * AuthenticationException constructor.
     * @param string $message
     */
    public function __construct($message = 'Invalid IPv4 or IPv6 address. Please check the IP and try again.')
    {
        parent::__construct($message);
    }
}