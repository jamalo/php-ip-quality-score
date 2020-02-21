<?php

namespace IPQualityScore\Model;

/**
 * Class EmailVerificationResponse
 * @package IPQualityScore\Model
 */
class EmailVerificationResponse
{
    /** @var array */
    public $data;

    /**
     * EmailVerificationResponse constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return bool|null
     */
    public function getTimedOut(): ?bool
    {
        return $this->data['timed_out'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getDisposable(): ?bool
    {
        return $this->data['disposable'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->data['first_name'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getDeliverability(): ?string
    {
        return $this->data['deliverability'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getSmtpScore(): ?string
    {
        return $this->data['smtp_score'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getOverallScore(): ?int
    {
        return $this->data['overall_score'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getCatchAll(): ?bool
    {
        return $this->data['catch_all'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getGeneric(): ?bool
    {
        return $this->data['generic'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getCommon(): ?bool
    {
        return $this->data['common'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getDnsValid(): ?bool
    {
        return $this->data['dns_valid'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getHoneypot(): ?bool
    {
        return $this->data['honeypot'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getFrequentComplainer(): ?bool
    {
        return $this->data['frequent_complainer'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getSuspect(): ?bool
    {
        return $this->data['suspect'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getRecentAbuse(): ?bool
    {
        return $this->data['recent_abuse'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getLeaked(): ?bool
    {
        return $this->data['leaked'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getSuggestedDomain(): ?bool
    {
        return $this->data['suggested_domain'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getValid(): ?bool
    {
        return $this->data['valid'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->data['success'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getSpamTrapScore(): ?bool
    {
        return $this->data['spam_trap_score'] ?? null;
    }

    /**
     * @return bool|null
     */
    public function getRequestId(): ?bool
    {
        return $this->data['request_id'] ?? null;
    }

    /**
     * @return array|null
     */
    public function getDomainAge(): ?array
    {
        return $this->data['domain_age'] ?? null;
    }

    /**
     * @return array|null
     */
    public function getFirstSeen(): ?array
    {
        return $this->data['first_seen'] ?? null;
    }
}