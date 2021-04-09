<?php

namespace IPQualityScore\Model;

use IPQualityScore\IPQualityScore;
use IPQualityScore\Response\IPAddressVerificationResponse;

/**
 * Class IPAddressVerification
 * @package IPQualityScore\Model
 */
class IPAddressVerification
{
    /** @var string */
    private const API_ENDPOINT = '/json/ip/%s/%s?%s';

    /** @var IPQualityScore */
    private $IPQualityScore;

    /** @var string */
    private $userAgent = '';

    /** @var string */
    private $userLanguage = '';

    /** @var int */
    private $strictness = 1;

    /** @var bool */
    private $allowPublicAccessPoints = true;

    /** @var bool */
    private $mobile = false;

    /** @var bool */
    private $lighterPenalties = false;

    /**
     * EmailVerification constructor.
     * @param IPQualityScore $IPQualityScore
     */
    public function __construct(IPQualityScore $IPQualityScore)
    {
        $this->IPQualityScore = $IPQualityScore;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     * @return IPAddressVerification
     */
    public function setUserAgent(string $userAgent): IPAddressVerification
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserLanguage(): string
    {
        return $this->userLanguage;
    }

    /**
     * @param string $userLanguage
     * @return IPAddressVerification
     */
    public function setUserLanguage(string $userLanguage): IPAddressVerification
    {
        $this->userLanguage = $userLanguage;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrictness(): int
    {
        return $this->strictness;
    }

    /**
     * @param int $strictness
     * @return IPAddressVerification
     */
    public function setStrictness(int $strictness): IPAddressVerification
    {
        $this->strictness = $strictness;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAllowPublicAccessPoints(): bool
    {
        return $this->allowPublicAccessPoints;
    }

    /**
     * @param bool $allowPublicAccessPoints
     * @return IPAddressVerification
     */
    public function setAllowPublicAccessPoints(bool $allowPublicAccessPoints): IPAddressVerification
    {
        $this->allowPublicAccessPoints = $allowPublicAccessPoints;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->mobile;
    }

    /**
     * @param bool $mobile
     * @return IPAddressVerification
     */
    public function setMobile(bool $mobile): IPAddressVerification
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLighterPenalties(): bool
    {
        return $this->lighterPenalties;
    }

    /**
     * @param bool $lighterPenalties
     * @return IPAddressVerification
     */
    public function setLighterPenalties(bool $lighterPenalties): IPAddressVerification
    {
        $this->lighterPenalties = $lighterPenalties;
        return $this;
    }

    /**
     * @param string $IPAddress
     * @return IPAddressVerificationResponse
     * @throws \IPQualityScore\Exception\AuthenticationException
     * @throws \IPQualityScore\Exception\InvalidIPAddressException
     * @throws \IPQualityScore\Exception\InvalidRequestException
     * @throws \IPQualityScore\Exception\UnknownApiErrorException
     */
    public function getResponse(string $IPAddress)
    {
        $parameters = http_build_query([
            'user_agent' => $this->userAgent,
            'user_language' => $this->userLanguage,
            'strictness' => $this->strictness,
            'allow_public_access_points' => $this->allowPublicAccessPoints === true ? 'true' : 'false',
            'mobile' => $this->mobile === true ? 'true' : 'false',
            'lighter_penalties' => $this->lighterPenalties === true ? 'true' : 'false'
        ]);

        $request = $this->IPQualityScore->client
            ->setEndpoint(sprintf(IPQualityScore::API_URL . self::API_ENDPOINT, $this->IPQualityScore->apiKey, $IPAddress, $parameters))
            ->setMethod('GET')
            ->performHttpRequest();

        return new IPAddressVerificationResponse($request);
    }
}
