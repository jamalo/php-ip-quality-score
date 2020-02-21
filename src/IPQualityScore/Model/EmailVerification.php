<?php

namespace IPQualityScore\Model;

use IPQualityScore\IPQualityScore;
use IPQualityScore\Response\EmailVerificationResponse;

/**
 * Class EmailVerification
 * @package IPQualityScore\Model
 */
class EmailVerification
{
    /** @var string */
    private const API_ENDPOINT = '/json/email/%s/%s?%s';

    /** @var IPQualityScore */
    private $IPQualityScore;

    /** @var bool */
    private $fastResponse = false;

    /** @var int */
    private $replyTimeout = 7;

    /** @var int */
    private $abuseStrictness = 0;

    /**
     * EmailVerification constructor.
     * @param IPQualityScore $IPQualityScore
     */
    public function __construct(IPQualityScore $IPQualityScore)
    {
        $this->IPQualityScore = $IPQualityScore;
    }

    /**
     * @param bool $fastResponse
     * @return EmailVerification
     */
    public function setFastResponse(bool $fastResponse): EmailVerification
    {
        $this->fastResponse = $fastResponse;
        return $this;
    }

    /**
     * @param int $replyTimeout
     * @return EmailVerification
     */
    public function setReplyTimeout(int $replyTimeout): EmailVerification
    {
        $this->replyTimeout = $replyTimeout;
        return $this;
    }

    /**
     * @param int $abuseStrictness
     * @return EmailVerification
     */
    public function setAbuseStrictness(int $abuseStrictness): EmailVerification
    {
        $this->abuseStrictness = $abuseStrictness;
        return $this;
    }

    /**
     * @param string $email
     * @return EmailVerificationResponse
     * @throws \IPQualityScore\Exception\AuthenticationException
     * @throws \IPQualityScore\Exception\InvalidRequestException
     * @throws \IPQualityScore\Exception\UnknownApiErrorException
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function getResponse(string $email)
    {
        $parameters = http_build_query([
            'timeout' => $this->replyTimeout,
            'fast' => $this->fastResponse,
            'abuse_strictness' => $this->abuseStrictness
        ]);

        $request = $this->IPQualityScore->client
            ->setEndpoint(sprintf(IPQualityScore::API_URL . self::API_ENDPOINT, $this->IPQualityScore->apiKey, $email, $parameters))
            ->setMethod('GET')
            ->performHttpRequest();

        return new EmailVerificationResponse($request);
    }
}