<?php

namespace IPQualityScore\Client;

use IPQualityScore\Exception\AuthenticationException;
use IPQualityScore\Exception\InvalidIPAddressException;
use IPQualityScore\Exception\InvalidRequestException;
use IPQualityScore\Exception\UnknownApiErrorException;
use IPQualityScore\IPQualityScore;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class IPQualityScoreClient
 * @package IPQualityScore\Client
 */
class IPQualityScoreClient
{
    /** @var string */
    private $endpoint;

    /** @var string */
    private $method;

    /** @var int */
    private $timeout;

    /** @var int */
    private $connectionTimeout;

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return IPQualityScoreClient
     */
    public function setEndpoint(string $endpoint): IPQualityScoreClient
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return IPQualityScoreClient
     */
    public function setMethod(string $method): IPQualityScoreClient
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return IPQualityScoreClient
     */
    public function setTimeout(int $timeout): IPQualityScoreClient
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return int
     */
    public function getConnectionTimeout(): int
    {
        return $this->connectionTimeout;
    }

    /**
     * @param int $connectionTimeout
     * @return IPQualityScoreClient
     */
    public function setConnectionTimeout(int $connectionTimeout): IPQualityScoreClient
    {
        $this->connectionTimeout = $connectionTimeout;
        return $this;
    }

    /**
     * @return array
     * @throws AuthenticationException
     * @throws InvalidIPAddressException
     * @throws InvalidRequestException
     * @throws UnknownApiErrorException
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function performHttpRequest(): array
    {
        $client = HttpClient::create([
            'headers' => [
                'User-Agent' => sprintf('php-ip-quality-score/%s', IPQualityScore::VERSION),
            ]
        ]);

        try {
            $result = $client->request($this->method, $this->endpoint, ['timeout' => $this->timeout])->toArray();
        } catch (\Exception $exception) {
            throw new InvalidRequestException($exception->getMessage());
        }

        if (isset($result['success']) && $result['success'] === false) {
            throw $this->specificError($result['message']);
        }

        return $result;
    }

    /**
     * @param string $body
     * @return AuthenticationException|InvalidIPAddressException|UnknownApiErrorException
     */
    private function specificError(string $body)
    {
        switch ($body) {
            case 'Invalid or unauthorized key. Please check the API key and try again.':
                return new AuthenticationException('Invalid or unauthorized key. Please check the API key and try again.');
                break;
            case 'Invalid IPv4 address, IPv6 address or hostname. Please check the IP/Hostname and try again.':
            case 'Invalid IPv4 or IPv6 address. Please check the IP and try again.':
                return new InvalidIPAddressException('Invalid IPv4 or IPv6 address. Please check the IP and try again.');
                break;
            default:
                return new UnknownApiErrorException($body);
        }
    }
}