<?php

/*
 * This file is part of Password Policy Bundle for Contao Open Source CMS.
 *
 * (c) eikona-media.de
 *
 * @license MIT
 */

namespace EikonaMedia\Contao\PasswordPolicy\Service;

/**
 * Class PasswordPolicyValidator
 * @package EikonaMedia\Contao\PasswordPolicy\Service
 */
class PasswordPolicyValidator
{
    /**
     * @var PasswordPolicy $policy
     */
    private $passwordPolicy;

    /**
     * @var string $password
     */
    private $password;

    /**
     * PasswordPolicyValidator constructor.
     * @param PasswordPolicy $passwordPolicy
     */
    public function __construct(PasswordPolicy $passwordPolicy)
    {
        $this->setPasswordPolicy($passwordPolicy);
    }

    /**
     * @return string
     */
    private function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    private function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    private function validateMinLength(): bool
    {
        $pw = $this->getPassword();
        $pwMinLength = $this->getPasswordPolicy()->getMinLength();

        if ($pwMinLength === 0) {
            return true;
        }

        $result = strlen($pw) >= $pwMinLength;

        return $result;
    }

    /**
     * @return bool
     */
    private function validateMaxLength(): bool
    {
        $pw = $this->getPassword();
        $pwMaxLength = $this->getPasswordPolicy()->getMaxLength();

        if ($pwMaxLength === 0) {
            return true;
        }

        $result = strlen($pw) <= $pwMaxLength;

        return $result;
    }

    /**
     * @return bool
     */
    private function validateUpperCase(): bool
    {
        $pw = $this->getPassword();
        $pwUpperCase = $this->getPasswordPolicy()->getUpperCase();

        if ($pwUpperCase === 0) {
            return true;
        }

        $result = strlen(preg_replace('/[^A-Z]+/', '', $pw)) >= $pwUpperCase;

        return $result;
    }

    /**
     * @return bool
     */
    private function validateLowerCase(): bool
    {
        $pw = $this->getPassword();
        $pwLowerCase = $this->getPasswordPolicy()->getLowerCase();

        if ($pwLowerCase === 0) {
            return true;
        }

        $result = strlen(preg_replace('/[^a-z]+/', '', $pw)) >= $pwLowerCase;

        return $result;
    }

    /**
     * @return bool
     */
    private function validateSpecialChars(): bool
    {
        $pw = $this->getPassword();
        $pwSpecialChars = $this->getPasswordPolicy()->getSpecialChars();

        if ($pwSpecialChars === 0) {
            return true;
        }

        $result = strlen(preg_replace('/[^\W]+/', '', $pw)) >= $pwSpecialChars;

        return $result;
    }

    /**
     * @return bool
     */
    private function validateDigits(): bool
    {
        $pw = $this->getPassword();
        $pwDigits = $this->getPasswordPolicy()->getDigits();

        if ($pwDigits === 0) {
            return true;
        }

        $result = strlen(preg_replace('/[^\d]+/', '', $pw)) >= $pwDigits;

        return $result;
    }

    /**
     * @return PasswordPolicy
     */
    public function getPasswordPolicy(): PasswordPolicy
    {
        return $this->passwordPolicy;
    }

    /**
     * @param PasswordPolicy $passwordPolicy
     */
    public function setPasswordPolicy(PasswordPolicy $passwordPolicy): void
    {
        $this->passwordPolicy = $passwordPolicy;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validate(string $password): bool
    {
        $this->setPassword($password);

        return
            $this->validateMinLength()
            && $this->validateMaxLength()
            && $this->validateUpperCase()
            && $this->validateLowerCase()
            && $this->validateSpecialChars()
            && $this->validateDigits();
    }
}
