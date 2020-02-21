<?php

namespace IPQualityScore;

use IPQualityScore\Client\IPQualityScoreClient;
use IPQualityScore\Model\EmailVerification;

/**
 * Class IPQualityScore
 * @package IPQualityScore
 */
class IPQualityScore
{
    /** @var string */
    public const VERSION = '1.0.0';

    /** @var string */
    public const API_URL = 'https://www.ipqualityscore.com/api';

    /** @var string $apiKey */
    public $apiKey;

    /** @var EmailVerification */
    public $emailVerification;

    /** @var IPQualityScoreClient */
    public $client;

    /**
     * IPQualityScore constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->emailVerification = new EmailVerification($this);
        $this->client = new IPQualityScoreClient();
    }
}