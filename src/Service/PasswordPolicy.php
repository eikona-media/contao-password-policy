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
 * Class PasswordPolicy
 * @package EikonaMedia\Contao\PasswordPolicy\Service
 */
class PasswordPolicy
{
    /**
     * @var int $minLength
     */
    private $minLength = 0;

    /**
     * @var int $maxLength
     */
    private $maxLength = 0;

    /**
     * @var int $upperCase
     */
    private $upperCase = 0;

    /**
     * @var int $lowerCase
     */
    private $lowerCase = 0;

    /**
     * @var int $specialChars
     */
    private $specialChars = 0;

    /**
     * @var int $digits
     */
    private $digits = 0;

    /**
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * @param int $minLength
     * @return PasswordPolicy
     */
    public function setMinLength(int $minLength): PasswordPolicy
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     * @return PasswordPolicy
     */
    public function setMaxLength(int $maxLength): PasswordPolicy
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpperCase(): int
    {
        return $this->upperCase;
    }

    /**
     * @param int $upperCase
     * @return PasswordPolicy
     */
    public function setUpperCase(int $upperCase): PasswordPolicy
    {
        $this->upperCase = $upperCase;

        return $this;
    }

    /**
     * @return int
     */
    public function getLowerCase(): int
    {
        return $this->lowerCase;
    }

    /**
     * @param int $lowerCase
     * @return PasswordPolicy
     */
    public function setLowerCase(int $lowerCase): PasswordPolicy
    {
        $this->lowerCase = $lowerCase;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpecialChars(): int
    {
        return $this->specialChars;
    }

    /**
     * @param int $specialChars
     * @return PasswordPolicy
     */
    public function setSpecialChars(int $specialChars): PasswordPolicy
    {
        $this->specialChars = $specialChars;

        return $this;
    }

    /**
     * @return int
     */
    public function getDigits(): int
    {
        return $this->digits;
    }

    /**
     * @param int $digits
     * @return PasswordPolicy
     */
    public function setDigits(int $digits): PasswordPolicy
    {
        $this->digits = $digits;

        return $this;
    }
}
