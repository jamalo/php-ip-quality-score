<?php

use IPQualityScore\Client\IPQualityScoreClient;
use IPQualityScore\IPQualityScore;
use PHPUnit\Framework\TestCase;

/**
 * Class IPAddressVerificationTest
 */
class IPAddressVerificationTest extends TestCase
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
            ->willReturn(['vpn' => false, 'overall_score' => 5, 'mobile' => false, 'operating_system' => 'Windows 10']);

        $response = $this->IPQualityScore->IPAddressVerification->getResponse('127.0.0.1');
        $this->assertFalse($response->isVpn());
        $this->assertFalse($response->isMobile());
        $this->assertEquals('Windows 10', $response->getOperatingSystem());
    }
}