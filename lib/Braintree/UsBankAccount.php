<?php
namespace Braintree;

/**
 * Braintree UsBankAccount module
 *
 * @package    Braintree
 * @category   Resources
 * @copyright  2016 Braintree, a division of PayPal, Inc.
 */

/**
 * Manages Braintree UsBankAccounts
 *
 * <b>== More information ==</b>
 *
 *
 * @package    Braintree
 * @category   Resources
 * @copyright  2016 Braintree, a division of PayPal, Inc.
 *
 * @property-read string $customerId
 * @property-read string $email
 * @property-read string $token
 * @property-read string $imageUrl
 */
class UsBankAccount extends Base
{
    /**
     *  factory method: returns an instance of UsBankAccount
     *  to the requesting method, with populated properties
     *
     * @ignore
     * @return UsBankAccount
     */
    public static function factory($attributes)
    {
        $instance = new self();
        $instance->_initialize($attributes);
        return $instance;
    }

    /* instance methods */

    /**
     * sets instance properties from an array of values
     *
     * @access protected
     * @param array $usBankAccountAttribs array of usBankAccount data
     * @return void
     */
    protected function _initialize($usBankAccountAttribs)
    {
        // set the attributes
        $this->_attributes = $usBankAccountAttribs;
    }

    /**
     * create a printable representation of the object as:
     * ClassName[property=value, property=value]
     * @return string
     */
    public function  __toString()
    {
        return __CLASS__ . '[' .
                Util::attributesToString($this->_attributes) . ']';
    }


    // static methods redirecting to gateway

    public static function find($token)
    {
        return Configuration::gateway()->usBankAccount()->find($token);
    }

    public static function sale($token, $transactionAttribs)
    {
        $transactionAttribs['options'] = [
            'submitForSettlement' => true
        ];
        return Configuration::gateway()->usBankAccount()->sale($token, $transactionAttribs);
    }
}
class_alias('Braintree\UsBankAccount', 'Braintree_UsBankAccount');
