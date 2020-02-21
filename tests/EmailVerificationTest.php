<?php

use IPQualityScore\Client\IPQualityScoreClient;
use IPQualityScore\IPQualityScore;
use PHPUnit\Framework\TestCase;

/**
 * Class EmailVerificationTest
 */
class EmailVerificationTest extends TestCase
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

    public function testGetResponse()
    {
        $this->client
            ->expects($this->any())
            ->method('performHttpRequest')
            ->willReturn(['valid' => true, 'overall_score' => 5]);

        $response = $this->IPQualityScore->emailVerification->getResponse('test@example.com');
        $this->assertTrue($response->getValid());
        $this->assertEquals(5, $response->getOverallScore());
    }
}