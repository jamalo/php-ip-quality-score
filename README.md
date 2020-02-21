# php-ip-quality-score

[![Build Status](https://travis-ci.org/jamalo/php-ip-quality-score.svg?branch=master)](https://travis-ci.org/jamalo/php-ip-quality-score)

## Installation

- [Download composer](https://getcomposer.org)
- Run `composer require jamalo/php-ip-quality-score`
- Get API key https://www.ipqualityscore.com/create-account for 5,000 FREE api calls per month

## Example
```php
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->emailVerification->getResponse('test@example.com');

if ($result->getValid() || $result->getDeliverability() === 'high') {
    // do something...
} else {
    //show alert tot user
}
```