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
 * Class PasswordPolicySetting
 * @package EikonaMedia\Contao\PasswordPolicy\Service
 */
class PasswordPolicySetting
{
    /**
     * password policy active scope user key
     */
    const ACTIVE_SCOPE_USER = 'eimed_pw_active_scope_user';

    /**
     * password policy active scope member key
     */
    const ACTIVE_SCOPE_MEMBER = 'eimed_pw_active_scope_member';

    /**
     * password minimum length key
     */
    const MIN_LENGTH = 'eimed_pw_min_length';

    /**
     * password maximum length key
     */
    const MAX_LENGTH = 'eimed_pw_max_length';

    /**
     * password uppercase characters length key
     */
    const UPPER_CASE = 'eimed_pw_upper_case';

    /**
     * password lowercase characters length key
     */
    const LOWER_CASE = 'eimed_pw_lower_case';

    /**
     * password special characters length key
     */
    const SPECIAL_CHARS = 'eimed_pw_special_chars';

    /**
     * password digits length key
     */
    const DIGITS = 'eimed_pw_digits';
}
