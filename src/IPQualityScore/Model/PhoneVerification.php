<?php

namespace IPQualityScore\Model;

use IPQualityScore\IPQualityScore;
use IPQualityScore\Response\PhoneVerificationResponse;

/**
 * Class PhoneVerification
 * @package IPQualityScore\Model
 */
class PhoneVerification
{
    /** @var string */
    private const API_ENDPOINT = '/json/phone/%s/%s?%s';

    /** @var IPQualityScore */
    private $IPQualityScore;

    /** @var array */
    private $countries = [];

    /** @var int */
    private $strictness = 0;

    /**
     * PhoneVerification constructor.
     * @param IPQualityScore $IPQualityScore
     */
    public function __construct(IPQualityScore $IPQualityScore)
    {
        $this->IPQualityScore = $IPQualityScore;
    }

    /**
     * @param array $countries
     * @return PhoneVerification
     */
    public function setCountries(array $countries): PhoneVerification
    {
        $this->countries = $countries;
        return $this;
    }

    /**
     * @param int $strictness
     * @return PhoneVerification
     */
    public function setStrictness(int $strictness): PhoneVerification
    {
        $this->strictness = $strictness;
        return $this;
    }

    /**
     * @param string $phone
     * @return PhoneVerificationResponse
     * @throws \IPQualityScore\Exception\AuthenticationException
     * @throws \IPQualityScore\Exception\InvalidRequestException
     * @throws \IPQualityScore\Exception\UnknownApiErrorException
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function getResponse(string $phone)
    {
        $parameters = http_build_query([
            'countries' => $this->countries,
            'strictness' => $this->strictness
        ]);

        $request = $this->IPQualityScore->client
            ->setEndpoint(sprintf(IPQualityScore::API_URL . self::API_ENDPOINT, $this->IPQualityScore->apiKey, $phone, $parameters))
            ->setMethod('GET')
            ->performHttpRequest();

        return new PhoneVerificationResponse($request);
    }
}