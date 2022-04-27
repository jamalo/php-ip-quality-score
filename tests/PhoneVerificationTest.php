<?php

use IPQualityScore\Client\IPQualityScoreClient;
use IPQualityScore\IPQualityScore;
use PHPUnit\Framework\TestCase;

/**
 * Class PhoneVerificationTest
 */
class PhoneVerificationTest extends TestCase
{
    /** @var \PHPUnit\Framework\MockObject\MockObject|IPQualityScoreClient */
    private $client;

    /** @var \PHPUnit\Framework\MockObject\MockObject|IPQualityScore */
    private $IPQualityScore;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this
            ->getMockBuilder(IPQualityScoreClient::class)
            ->onlyMethods(['performHttpRequest'])
            ->getMock();

        $this->IPQualityScore = $this
            ->getMockBuilder(IPQualityScore::class)
            ->setConstructorArgs(array('api-key'))
            ->getMock();

        $this->IPQualityScore->client = $this->client;
    }

    public function testGetResponse(): void
    {
        $this->client
            ->expects($this->any())
            ->method('performHttpRequest')
            ->willReturn(['valid' => true, 'recent_abuse' => true, 'VOIP' => false, 'risky' => true]);

        $response = $this->IPQualityScore->phoneVerification->getResponse('18001234567');
        
        $this->assertTrue($response->isValid());
        $this->assertTrue($response->isRecentAbuse());
        $this->assertTrue($response->isRisky());
        $this->assertFalse($response->isVoip());

    }
}