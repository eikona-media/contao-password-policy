<?php

use EikonaMedia\Contao\PasswordPolicy\Service\PasswordPolicySetting;

$tableName = 'tl_settings';

$integerTypeFields = [
    'minLength' => PasswordPolicySetting::MIN_LENGTH,
    'maxLength' => PasswordPolicySetting::MAX_LENGTH,
    'upperCase' => PasswordPolicySetting::UPPER_CASE,
    'lowerCase' => PasswordPolicySetting::LOWER_CASE,
    'specialCharacters' => PasswordPolicySetting::SPECIAL_CHARS,
    'digits' => PasswordPolicySetting::DIGITS,
];

$scopeFields = [
    'scopeUser' => PasswordPolicySetting::ACTIVE_SCOPE_USER,
    'scopeMember' => PasswordPolicySetting::ACTIVE_SCOPE_MEMBER,
];

$legendFields = array_merge($scopeFields, $integerTypeFields);

$GLOBALS['TL_DCA'][$tableName]['palettes']['default'] .= ';{eimed_pw_policy_settings_header},'.implode(',', array_values($legendFields)).';';

foreach ($scopeFields as $fieldKey => $fieldName) {
    $GLOBALS['TL_DCA'][$tableName]['list']['label']['fields'][] = $fieldName;

    $GLOBALS['TL_DCA'][$tableName]['fields'][$fieldName] = [
        'label' => &$GLOBALS['TL_LANG'][$tableName][$fieldName],
        'exclude' => true,
        'filter' => false,
        'inputType' => 'checkbox',
        'eval' => [
            'mandatory' => false,
            'tl_class' => 'clr w50',
        ],
        'sql' => 'int(1) unsigned not null default 0',
    ];
}

$icount = 0;
foreach ($integerTypeFields as $fieldKey => $fieldName) {
    $icount++;

    $GLOBALS['TL_DCA'][$tableName]['list']['label']['fields'][] = $fieldName;

    $GLOBALS['TL_DCA'][$tableName]['fields'][$fieldName] = [
        'label' => &$GLOBALS['TL_LANG'][$tableName][$fieldName],
        'exclude' => true,
        'filter' => false,
        'inputType' => 'text',
        'eval' => [
            'minval' => 0,
            'maxval' => 50,
            'rgxp' => 'natural',
            'mandatory' => false,
            'tl_class' => 'w50 '.($icount === 1 ? 'clr' : ''),
        ],
        'sql' => 'int(2) unsigned not null default 0',
    ];
}
