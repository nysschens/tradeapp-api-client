<?php

namespace TradeApp\Responses;

use TradeApp\ApiClient;
use TradeApp\Exception;
use TradeApp\Payload;
use TradeApp\Response;

class UserInfo extends Response
{
    const FIELD_USER_ID = 'userID';

    const FIELD_DATE_OF_BIRTH = 'dob';

    const FIELD_CONFIRMED = 'confirmed';

    const FIELD_VALIDATED = 'validated';

    const FIELD_FROZEN = 'frozen';

    const FIELD_BLOCKED = 'blocked';

    const FIELD_AFFILIATE_ID = 'affiliateID';

    const FIELD_USER_CURRENCY = 'userCurrency';

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @return bool
     */
    public function isValidated()
    {
        return $this->validated;
    }

    /**
     * @return bool
     */
    public function isFrozen()
    {
        return $this->frozen;
    }

    /**
     * @return bool
     */
    public function isBlocked()
    {
        return $this->blocked;
    }

    /**
     * @return int
     */
    public function getAffiliateId()
    {
        return $this->affiliateId;
    }

    /**
     * ISO 3 symbols code of user's account currency.
     * Example: 'USD'.
     *
     * @return string
     */
    public function getUserCurrency()
    {
        return $this->userCurrency;
    }

    /**
     * @var int
     */
    protected $userId;

    /**
     * Date of birth.
     * Example: '1982-02-14'.
     *
     * @var string
     */
    protected $dateOfBirth;

    /**
     * @var bool
     */
    protected $confirmed;

    /**
     * @var bool
     */
    protected $validated;

    /**
     * @var bool
     */
    protected $frozen;

    /**
     * @var bool
     */
    protected $blocked;

    /**
     * @var int
     */
    protected $affiliateId;

    /**
     * @var string
     */
    protected $userCurrency;

    public function __construct(Payload $payload)
    {
        parent::__construct($payload);
        if ($this->isSuccess()) {
            $currenciesDictionary = ApiClient::getCurrenciesDictionary();
            $this->userId = $this->data[static::FIELD_USER_ID];
            $this->dateOfBirth = $this->data[static::FIELD_DATE_OF_BIRTH];
            $this->confirmed = $this->data[static::FIELD_CONFIRMED];
            $this->validated = $this->data[static::FIELD_VALIDATED];
            $this->frozen = $this->data[static::FIELD_FROZEN];
            $this->blocked = $this->data[static::FIELD_BLOCKED];
            $this->affiliateId = $this->data[static::FIELD_AFFILIATE_ID];
            $this->userCurrency = isset($currenciesDictionary[$this->data[static::FIELD_USER_CURRENCY]]) ? $currenciesDictionary[$this->data[static::FIELD_USER_CURRENCY]] : null;
        } else {
            switch ($this->getErrorCode()) {
                default: {
                    throw new Exception($payload, 'Trade platform error');
                }
            }
        }
    }
}
