<?php

$tableName = 'tl_user';

$GLOBALS['TL_DCA'][$tableName]['fields']['password']['save_callback'][] = [
    'eikona_media.contao.password_policy.policy_service',
    'validateUserPassword',
];
