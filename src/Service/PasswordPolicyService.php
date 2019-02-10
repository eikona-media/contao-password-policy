<?php

/*
 * This file is part of Password Policy Bundle for Contao Open Source CMS.
 *
 * (c) eikona-media.de
 *
 * @license MIT
 */

namespace EikonaMedia\Contao\PasswordPolicy\Service;

use Contao\Config;
use Contao\Input;
use Contao\System;

/**
 * Class PasswordPolicyService
 * @package EikonaMedia\Contao\PasswordPolicy\Service
 */
class PasswordPolicyService
{
    /**
     * @param PasswordPolicy $passwordPolicy
     * @return string
     */
    private function buildPolicyMessage(PasswordPolicy $passwordPolicy): string
    {
        System::loadLanguageFile('eimed_messages');
        $lang = $GLOBALS['TL_LANG']['eimed'];

        $message = $lang['pw_policy_missmatch_message'];
        $minLengthMessage = $lang['pw_min_length_message'];
        $maxLengthMessage = $lang['pw_max_length_message'];
        $upperCaseMessage = $lang['pw_upper_case_message'];
        $lowerCaseMessage = $lang['pw_lower_case_message'];
        $specialCharsMessage = $lang['pw_special_chars_message'];
        $digitsMessage = $lang['pw_digits_message'];

        $policyParts = [];
        if ($passwordPolicy->getMinLength() > 0) {
            $policyParts[] = vsprintf($minLengthMessage, [$passwordPolicy->getMinLength()]);
        }
        if ($passwordPolicy->getMaxLength() > 0) {
            $policyParts[] = vsprintf($maxLengthMessage, [$passwordPolicy->getMaxLength()]);
        }
        if ($passwordPolicy->getUpperCase() > 0) {
            $policyParts[] = vsprintf($upperCaseMessage, [$passwordPolicy->getUpperCase()]);
        }
        if ($passwordPolicy->getLowerCase() > 0) {
            $policyParts[] = vsprintf($lowerCaseMessage, [$passwordPolicy->getLowerCase()]);
        }
        if ($passwordPolicy->getSpecialChars() > 0) {
            $policyParts[] = vsprintf($specialCharsMessage, [$passwordPolicy->getSpecialChars()]);
        }
        if ($passwordPolicy->getDigits() > 0) {
            $policyParts[] = vsprintf($digitsMessage, [$passwordPolicy->getDigits()]);
        }

        return $message . ' ' . implode(', ', $policyParts);
    }

    /**
     * @param string $password
     * @return bool
     * @throws \Exception
     */
    private function validate(string $password): bool
    {
        $minLength = Config::get(PasswordPolicySetting::MIN_LENGTH) ?? 0;
        $maxLength = Config::get(PasswordPolicySetting::MAX_LENGTH) ?? 0;
        $upperCase = Config::get(PasswordPolicySetting::UPPER_CASE) ?? 0;
        $lowerCase = Config::get(PasswordPolicySetting::LOWER_CASE) ?? 0;
        $specialChars = Config::get(PasswordPolicySetting::SPECIAL_CHARS) ?? 0;
        $digits = Config::get(PasswordPolicySetting::DIGITS) ?? 0;

        // build password policy from settings
        $passwordPolicy = new PasswordPolicy();
        $passwordPolicy
            ->setMinLength((int)$minLength)
            ->setMaxLength((int)$maxLength)
            ->setUpperCase((int)$upperCase)
            ->setLowerCase((int)$lowerCase)
            ->setSpecialChars((int)$specialChars)
            ->setDigits((int)$digits)
        ;

        $passwordValidator = new PasswordPolicyValidator($passwordPolicy);

        if (!$passwordValidator->validate($password)) {
            throw new \Exception($this->buildPolicyMessage($passwordPolicy));
        }

        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function validateMemberPassword(): bool
    {
        if ((int)Config::get(PasswordPolicySetting::ACTIVE_SCOPE_MEMBER) !== 1) {
            return true;
        }

        $pw = Input::post('password');

        return $this->validate($pw);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function validateUserPassword(): bool
    {
        if ((int)Config::get(PasswordPolicySetting::ACTIVE_SCOPE_USER) !== 1) {
            return true;
        }

        $pw = Input::post('password');

        return $this->validate($pw);
    }
}
