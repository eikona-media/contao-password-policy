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
 * Class PasswordPolicy.
 */
class PasswordPolicy
{
    /**
     * @var int
     */
    private $minLength = 0;

    /**
     * @var int
     */
    private $maxLength = 0;

    /**
     * @var int
     */
    private $upperCase = 0;

    /**
     * @var int
     */
    private $lowerCase = 0;

    /**
     * @var int
     */
    private $specialChars = 0;

    /**
     * @var int
     */
    private $digits = 0;

    public function getMinLength(): int
    {
        return $this->minLength;
    }

    public function setMinLength(int $minLength): self
    {
        $this->minLength = $minLength;

        return $this;
    }

    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    public function setMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    public function getUpperCase(): int
    {
        return $this->upperCase;
    }

    public function setUpperCase(int $upperCase): self
    {
        $this->upperCase = $upperCase;

        return $this;
    }

    public function getLowerCase(): int
    {
        return $this->lowerCase;
    }

    public function setLowerCase(int $lowerCase): self
    {
        $this->lowerCase = $lowerCase;

        return $this;
    }

    public function getSpecialChars(): int
    {
        return $this->specialChars;
    }

    public function setSpecialChars(int $specialChars): self
    {
        $this->specialChars = $specialChars;

        return $this;
    }

    public function getDigits(): int
    {
        return $this->digits;
    }

    public function setDigits(int $digits): self
    {
        $this->digits = $digits;

        return $this;
    }
}
