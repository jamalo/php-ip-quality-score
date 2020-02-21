<?php

namespace IPQualityScore\Response;

/**
 * Class IPAddressVerificationResponse
 * @package IPQualityScore\Response
 */
class IPAddressVerificationResponse
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
     * Is this IP address suspected to be a proxy? (SOCKS, Elite, Anonymous, VPN, Tor, etc.)
     *
     * @return bool|null
     */
    public function isProxy(): ?bool
    {
        return $this->data['proxy'] ?? null;
    }

    /**
     * Hostname of the IP address if one is available.
     *
     * @return string|null
     */
    public function getHost(): ?string
    {
        return $this->data['host'] ?? null;
    }

    /**
     * ISP if one is known. Otherwise "N/A".
     *
     * @return string|null
     */
    public function getIsp(): ?string
    {
        return $this->data['ISP'] ?? null;
    }

    /**
     * Organization if one is known. Can be parent company or sub company of the listed ISP. Otherwise "N/A".
     *
     * @return string|null
     */
    public function getOrganization(): ?string
    {
        return $this->data['organization'] ?? null;
    }

    /**
     * Autonomous System Number if one is known. Otherwise "N/A".
     *
     * @return string|null
     */
    public function getAsn(): ?string
    {
        return $this->data['ASN'] ?? null;
    }

    /**
     * Two character country code of IP address or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->data['country_code'] ?? null;
    }

    /**
     * City of IP address if available or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->data['city'] ?? null;
    }

    /**
     * Region (state) of IP address if available or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->data['region'] ?? null;
    }

    /**
     * Timezone of IP address if available or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->data['timezone'] ?? null;
    }

    /**
     * Latitude of IP address if available or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->data['latitude'] ?? null;
    }

    /**
     * Longitude of IP address if available or "N/A" if unknown.
     *
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->data['longitude'] ?? null;
    }

    /**
     * Is this IP associated with being a confirmed crawler from a mainstream search engine such as Googlebot, Bingbot, Yandex, etc. based on hostname or IP address verification.
     *
     * @return bool|null
     */
    public function isCrawler(): ?bool
    {
        return $this->data['is_crawler'] ?? null;
    }

    /**
     * Classification of the IP address connection type as "Residential", "Corporate", "Education", "Mobile", or "Data Center".
     *
     * @return string|null
     */
    public function getConnectionType(): ?string
    {
        return $this->data['connection_type'] ?? null;
    }

    /**
     * This value will indicate if there has been any recently verified abuse across our network for this IP address.
     * Abuse could be a confirmed chargeback, compromised device, fake app install, or similar malicious behavior within the past few days.
     *
     * @return bool|null
     */
    public function isRecentAbuse(): ?bool
    {
        return $this->data['recent_abuse'] ?? null;
    }

    /**
     * Indicates if bots or non-human traffic has recently used this IP address to engage in automated fraudulent behavior.
     * Provides stronger confidence that the IP address is suspicious.
     *
     * @return bool|null
     */
    public function isBotStatus(): ?bool
    {
        return $this->data['bot_status'] ?? null;
    }

    /**
     * Is this IP suspected of being a VPN connection? (proxy will always be true if this is true)
     *
     * @return bool|null
     */
    public function isVpn(): ?bool
    {
        return $this->data['vpn'] ?? null;
    }

    /**
     * Is this IP suspected of being a Tor connection? (proxy will always be true if this is true)
     *
     * @return bool|null
     */
    public function isTor(): ?bool
    {
        return $this->data['tor'] ?? null;
    }

    /**
     * Is this user agent a mobile browser? (will always be false if the user agent is not passed in the API request)
     *
     * @return bool|null
     */
    public function isMobile(): ?bool
    {
        return $this->data['mobile'] ?? null;
    }

    /**
     * The overall fraud score of the user based on the IP, user agent, language, and any other optionally passed variables.
     * Fraud Scores >= 75 are suspicious, but not necessarily fraudulent.
     * We recommend flagging or blocking traffic with Fraud Scores >= 85, but you may find it beneficial to use a higher or lower threshold.
     *
     * @return float|null
     */
    public function getFraudScore(): ?float
    {
        return $this->data['fraud_score'] ?? null;
    }

    /**
     * Operating system name and version or "N/A" if unknown.
     * Requires the "user_agent" variable in the API Request.
     *
     * @return string|null
     */
    public function getOperatingSystem(): ?string
    {
        return $this->data['operating_system'] ?? null;
    }

    /**
     * Browser name and version or "N/A" if unknown.
     * Requires the "user_agent" variable in the API Request.
     *
     * @return string|null
     */
    public function getBrowser(): ?string
    {
        return $this->data['browser'] ?? null;
    }

    /**
     * Brand name of the device or "N/A" if unknown.
     * Requires the "user_agent" variable in the API Request.
     *
     * @return string|null
     */
    public function getDeviceBrand(): ?string
    {
        return $this->data['device_brand'] ?? null;
    }

    /**
     * Model name of the device or "N/A" if unknown.
     * Requires the "user_agent" variable in the API Request.
     *
     * @return string|null
     */
    public function getDeviceModel(): ?string
    {
        return $this->data['device_model'] ?? null;
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
}