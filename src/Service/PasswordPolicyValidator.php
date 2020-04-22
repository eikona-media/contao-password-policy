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
 * Class PasswordPolicyValidator.
 */
class PasswordPolicyValidator
{
    /**
     * @var PasswordPolicy
     */
    private $passwordPolicy;

    /**
     * @var string
     */
    private $password;

    /**
     * PasswordPolicyValidator constructor.
     */
    public function __construct(PasswordPolicy $passwordPolicy)
    {
        $this->setPasswordPolicy($passwordPolicy);
    }

    public function getPasswordPolicy(): PasswordPolicy
    {
        return $this->passwordPolicy;
    }

    public function setPasswordPolicy(PasswordPolicy $passwordPolicy): void
    {
        $this->passwordPolicy = $passwordPolicy;
    }

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

    private function getPassword(): string
    {
        return $this->password;
    }

    private function setPassword(string $password): void
    {
        $this->password = $password;
    }

    private function validateMinLength(): bool
    {
        $pw = $this->getPassword();
        $pwMinLength = $this->getPasswordPolicy()->getMinLength();

        if (0 === $pwMinLength) {
            return true;
        }

        $result = \strlen($pw) >= $pwMinLength;

        return $result;
    }

    private function validateMaxLength(): bool
    {
        $pw = $this->getPassword();
        $pwMaxLength = $this->getPasswordPolicy()->getMaxLength();

        if (0 === $pwMaxLength) {
            return true;
        }

        $result = \strlen($pw) <= $pwMaxLength;

        return $result;
    }

    private function validateUpperCase(): bool
    {
        $pw = $this->getPassword();
        $pwUpperCase = $this->getPasswordPolicy()->getUpperCase();

        if (0 === $pwUpperCase) {
            return true;
        }

        $result = \strlen(preg_replace('/[^A-Z]+/', '', $pw)) >= $pwUpperCase;

        return $result;
    }

    private function validateLowerCase(): bool
    {
        $pw = $this->getPassword();
        $pwLowerCase = $this->getPasswordPolicy()->getLowerCase();

        if (0 === $pwLowerCase) {
            return true;
        }

        $result = \strlen(preg_replace('/[^a-z]+/', '', $pw)) >= $pwLowerCase;

        return $result;
    }

    private function validateSpecialChars(): bool
    {
        $pw = $this->getPassword();
        $pwSpecialChars = $this->getPasswordPolicy()->getSpecialChars();

        if (0 === $pwSpecialChars) {
            return true;
        }

        $result = \strlen(preg_replace('/[^\W]+/', '', $pw)) >= $pwSpecialChars;

        return $result;
    }

    private function validateDigits(): bool
    {
        $pw = $this->getPassword();
        $pwDigits = $this->getPasswordPolicy()->getDigits();

        if (0 === $pwDigits) {
            return true;
        }

        $result = \strlen(preg_replace('/[^\d]+/', '', $pw)) >= $pwDigits;

        return $result;
    }
}
