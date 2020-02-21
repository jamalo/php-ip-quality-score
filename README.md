# php-ip-quality-score

[![Build Status](https://travis-ci.org/jamalo/php-ip-quality-score.svg?branch=master)](https://travis-ci.org/jamalo/php-ip-quality-score)
[![Latest Stable Version](https://poser.pugx.org/jamalo/php-ip-quality-score/v/stable)](https://packagist.org/packages/jamalo/php-ip-quality-score)
## Installation

- [Download composer](https://getcomposer.org)
- Run `composer require jamalo/php-ip-quality-score`
- Get API key https://www.ipqualityscore.com/create-account for 5,000 FREE api calls per month

## Email Validation Example
IPQualityScore's Email Validation API allows you to detect invalid mailboxes as well as disposable and fraudulent email addresses, spamtraps, and honeypots.

```php
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->emailVerification->getResponse('test@example.com');

if ($result->isSuccess() && $result->isValid() && $result->getDeliverability() === 'high') {
    // do something...
} else {
    //show alert tot user
}
```

## Proxy & VPN Detection Example
IPQualityScore's Proxy Detection API allows you to Proactively Prevent Fraud™ via a simple API that provides over 25 data points for risk analysis, geo location, and IP intelligence.

```php
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->IPAddressVerification
    ->setUserLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '')
    ->setUserAgent($_SERVER['HTTP_USER_AGENT'] ?? '')
    ->getResponse($_SERVER['REMOTE_ADDR']);

if ($result->isSuccess() && ($result->isTor() || $result->isProxy())) {
    // block tor network request or send to /blocked page..
}

if ($result->isSuccess() && ($result->isProxy() || $result->isVpn())) {
    // block proxy/vpn request or send to /blocked page..
}
```