<?php

namespace IPQualityScore\Response;

/**
 * Class PhoneVerificationResponse
 * @package IPQualityScore\Model
 */
class PhoneVerificationResponse
{
    /** @var array */
    public $data;

    /**
     * PhoneVerificationResponse constructor.
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
     * This value will indicate if there has been any recently verified abuse across our network for this phone number.
     * Abuse could be a confirmed chargeback, fake signup, compromised device, fake app install, or similar malicious behavior within the past few days.
     *
     * @return bool|null
     */
    public function isRecentAbuse(): ?bool
    {
        return $this->data['recent_abuse'] ?? null;
    }

    /**
     * This value will indicate the formatted value for this phone number.
     * This will be a concatenation of +, the country code and the phone number
     *
     * @return string|null
     */
    public function getFormatted(): ?string
    {
        return $this->data['formatted'] ?? null;
    }

    /**
     * This value will indicate the local formatted value for this phone number.
     * This will have parenthesis and spaces and does not include the country code
     *
     * @return string|null
     */
    public function getLocalFormat(): ?string
    {
        return $this->data['local_format'] ?? null;
    }

    /**
     * This value will indicate if the phone number is voice over IP.
     *
     * @return bool|null
     */
    public function isVoip(): ?bool
    {
        return $this->data['VOIP'] ?? null;
    }

    /**
     * This value will indicate if the phone number is prepaid.
     *
     * @return bool|null
     */
    public function isPrepaid(): ?bool
    {
        return $this->data['prepaid'] ?? null;
    }

    /**
     * This value will indicate if the phone number is risky.
     *
     * @return bool|null
     */
    public function isRisky(): ?bool
    {
        return $this->data['risky'] ?? null;
    }

    /**
     * This value will indicate if the phone number is active.
     *
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->data['active'] ?? null;
    }

    /**
     * Name of the phone holder
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->data['name'] ?? null;
    }

    /**
     * Carrier of the phone plan
     *
     * @return string|null
     */
    public function getCarrier(): ?string
    {
        return $this->data['carrier'] ?? null;
    }

    /**
     * Line type of the phone
     *
     * @return string|null
     */
    public function getLineType(): ?string
    {
        return $this->data['line_type'] ?? null;
    }

    /**
     * Country of the phone
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->data['country'] ?? null;
    }

    /**
     * Region of the phone
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->data['region'] ?? null;
    }

    /**
     * Associated email addresses of the phone
     *
     * @return array|null
     */
    public function getAssociatedEmailAddresses(): ?array
    {
        return $this->data['associated_email_addresses'] ?? null;
    }

    /**
     * Was this phone number associated with a recent database leak from a third party?
     * Leaked accounts pose a risk as they may have become compromised during a database breach.
     *
     * @return bool|null
     */
    public function isLeaked(): ?bool
    {
        return $this->data['leaked'] ?? null;
    }

    /**
     * Does this phone number appear valid?
     *
     * @return bool|null
     */
    public function isValid(): ?bool
    {
        return $this->data['valid'] ?? null;
    }

    /**
     * Was the request successful?
     *
     * @return bool|null
     */
    public function isSuccess(): ?bool
    {
        return $this->data['success'] ?? null;
    }

    /**
     * A unique identifier for this request that can be used to lookup the request details or send a postback conversion notice.
     *
     * @return string|null
     */
    public function getRequestId(): ?string
    {
        return $this->data['request_id'] ?? null;
    }

    /**
     * A generic status message, either success or some form of an error notice.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->data['message'] ?? null;
    }
}