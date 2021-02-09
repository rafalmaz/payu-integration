<?php


namespace App\Model\PaymentOrder;


class Buyer
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $language;

    /**
     * Buyer constructor.
     * @param string $email
     * @param string $phone
     * @param string $firstName
     * @param string $lastName
     * @param string $language
     */
    public function __construct(string $email, string $phone, string $firstName, string $lastName, string $language = 'pl') {
        $this->email = $email;
        $this->phone = $phone;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): string {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }
}