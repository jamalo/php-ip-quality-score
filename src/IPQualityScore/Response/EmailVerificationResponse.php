<?php

namespace IPQualityScore\Response;

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
     * Did the connection to the mail service provider timeout during the verification?
     * If so, we recommend increasing the "timeout" variable above the default 7 second value.
     * Lookups that timeout with a "valid" result as false are most likely false and should be not be trusted.
     *
     * @return bool|null
     */
    public function isTimedOut(): ?bool
    {
        return $this->data['timed_out'] ?? null;
    }

    /**
     * Is this email suspected of belonging to a temporary or disposable mail service?
     * Usually associated with fraudsters and scammers.
     *
     * @return bool|null
     */
    public function isDisposable(): ?bool
    {
        return $this->data['disposable'] ?? null;
    }

    /**
     * Suspected first name based on email. Returns "CORPORATE" if the email is suspected of being a generic company email.
     * Returns "UNKNOWN" if the first name was not determinable.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->data['first_name'] ?? null;
    }

    /**
     * How likely is this email to be delivered to the user and land in their mailbox.
     * Values can be "high", "medium", or "low".
     *
     * @return string|null
     */
    public function getDeliverability(): ?string
    {
        return $this->data['deliverability'] ?? null;
    }

    /**
     * Validity score of email server's SMTP setup. Range: "-1" - "3". Scores above "-1" can be associated with a valid email.
     * -1 = invalid email address
     * 0 = mail server exists, but is rejecting all mail
     * 1 = mail server exists, but is showing a temporary error
     * 2 = mail server exists, but accepts all email
     * 3 = mail server exists and has verified the email address
     *
     * @return int|null
     */
    public function getSmtpScore(): ?int
    {
        return $this->data['smtp_score'] ?? null;
    }

    /**
     * Overall email validity score. Range: "0" - "4". Scores above "1" can be associated with a valid email.
     * 0 = invalid email address
     * 1 = dns valid, unreachable mail server
     * 2 = dns valid, temporary mail rejection error
     * 3 = dns valid, accepts all mail
     * 4 = dns valid, verified email exists
     *
     * @return int|null
     */
    public function getOverallScore(): ?int
    {
        return $this->data['overall_score'] ?? null;
    }

    /**
     * Is this email likely to be a "catch all" where the mail server verifies all emails tested against it as valid?
     * It is difficult to determine if the address is truly valid in these scenarios, since the email's server will not confirm the account's status.
     *
     * @return bool|null
     */
    public function isCatchAll(): ?bool
    {
        return $this->data['catch_all'] ?? null;
    }

    /**
     * Is this email suspected as being a catch all or shared email for a domain? ("admin@", "webmaster@", "newsletter@", "sales@", "contact@", etc.)
     *
     * @return bool|null
     */
    public function isGeneric(): ?bool
    {
        return $this->data['generic'] ?? null;
    }

    /**
     * Is this email from a common email provider? ("gmail.com", "yahoo.com", "hotmail.com", etc.)
     *
     * @return bool|null
     */
    public function isCommon(): ?bool
    {
        return $this->data['common'] ?? null;
    }

    /**
     * Does the email's hostname have valid DNS entries? Partial indication of a valid email.
     *
     * @return bool|null
     */
    public function isDnsValid(): ?bool
    {
        return $this->data['dns_valid'] ?? null;
    }

    /**
     * Is this email believed to be a "honeypot" or "SPAM trap"?
     * Bulk mail sent to these emails increases your risk of being blacklisted by large ISPs & ending up in the spam folder.
     *
     * @return bool|null
     */
    public function isHoneypot(): ?bool
    {
        return $this->data['honeypot'] ?? null;
    }

    /**
     * Indicates if this email frequently unsubscribes from marketing lists or reports email as SPAM.
     *
     * @return bool|null
     */
    public function isFrequentComplainer(): ?bool
    {
        return $this->data['frequent_complainer'] ?? null;
    }

    /**
     * This value indicates if the mail server is currently replying with a temporary error and unable to verify the email address.
     * This status will also be true for "catch all" email addresses as defined below.
     * If this value is true, then we suspect the "valid" result may be tainted and there is not a guarantee that the email address is truly valid.
     *
     * @return bool|null
     */
    public function isSuspect(): ?bool
    {
        return $this->data['suspect'] ?? null;
    }

    /**
     * This value will indicate if there has been any recently verified abuse across our network for this email address.
     * Abuse could be a confirmed chargeback, fake signup, compromised device, fake app install, or similar malicious behavior within the past few days.
     *
     * @return bool|null
     */
    public function isRecentAbuse(): ?bool
    {
        return $this->data['recent_abuse'] ?? null;
    }

    /**
     * Was this email address associated with a recent database leak from a third party?
     * Leaked accounts pose a risk as they may have become compromised during a database breach.
     *
     * @return bool|null
     */
    public function isLeaked(): ?bool
    {
        return $this->data['leaked'] ?? null;
    }

    /**
     * Default value is "N/A". Indicates if this email's domain should in fact be corrected to a popular mail service.
     * This field is useful for catching user typos. For example, an email address with "gmai.com", would display a suggested domain of "gmail.com".
     * This feature supports all major mail service providers.
     *
     * @return string|null
     */
    public function getSuggestedDomain(): ?string
    {
        return $this->data['suggested_domain'] ?? null;
    }

    /**
     * Does this email address appear valid?
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
     * Confidence level of the email address being an active SPAM trap. Values can be "high", "medium", "low", or "none".
     * We recommend scrubbing emails with "high" or "medium" statuses. Avoid "low" emails whenever possible for any promotional mailings.
     *
     * @return bool|null
     */
    public function isSpamTrapScore(): ?bool
    {
        return $this->data['spam_trap_score'] ?? null;
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
     * human	    A human description of when this domain was registered. (Ex: 3 months ago)	            string or null
     * timestamp	The unix time since epoch when this domain was first registered. (Ex: 1568061634)	    integer
     * iso	        The time this domain was registered in ISO8601 format (Ex: 2019-09-09T16:40:34-04:00)	string
     *
     * @return array|null
     */
    public function getDomainAge(): ?array
    {
        return $this->data['domain_age'] ?? null;
    }

    /**
     * human    	A human description of how long it's been since IPQS first analyzed this email address. (Ex: 3 months ago)	string or null
     * timestamp	The unix time since epoch when this email was first analyzed by IPQS. (Ex: 1568061634)	                    integer
     * iso	        The time this email was first analyzed by IPQS in ISO8601 format (Ex: 2019-09-09T16:40:34-04:00)	        string
     *
     * @return array|null
     */
    public function getFirstSeen(): ?array
    {
        return $this->data['first_seen'] ?? null;
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