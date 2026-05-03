<?php

return [
    'max_per_user' => 6,

    'platforms' => [
        'facebook' => [
            'label' => 'Facebook',
            'pattern' => '~^(https?://)?(www\.)?facebook\.com/.+~i',
        ],
        'twitter' => [
            'label' => 'Twitter / X',
            'pattern' => '~^(https?://)?(www\.)?(twitter\.com|x\.com)/.+~i',
        ],
        'linkedin' => [
            'label' => 'LinkedIn',
            'pattern' => '~^(https?://)?(www\.)?linkedin\.com/.+~i',
        ],
        'instagram' => [
            'label' => 'Instagram',
            'pattern' => '~^(https?://)?(www\.)?instagram\.com/.+~i',
        ],
        'youtube' => [
            'label' => 'YouTube',
            'pattern' => '~^(https?://)?(www\.)?(youtube\.com|youtu\.be)/.+~i',
        ],
        'github' => [
            'label' => 'GitHub',
            'pattern' => '~^(https?://)?(www\.)?github\.com/.+~i',
        ],
        'pinterest' => [
            'label' => 'Pinterest',
            'pattern' => '~^(https?://)?(www\.)?pinterest\.com/.+~i',
        ],
        'snapchat' => [
            'label' => 'Snapchat',
            'pattern' => '~^(https?://)?(www\.)?snapchat\.com/.+~i',
        ],
        'telegram' => [
            'label' => 'Telegram',
            'pattern' => '~^(https?://)?(www\.)?(t\.me|telegram\.me)/.+~i',
        ],
        'reddit' => [
            'label' => 'Reddit',
            'pattern' => '~^(https?://)?(www\.)?reddit\.com/.+~i',
        ],
        'tiktok' => [
            'label' => 'TikTok',
            'pattern' => '~^(https?://)?(www\.)?tiktok\.com/.+~i',
        ],
        'whatsapp' => [
            'label' => 'WhatsApp',
            'pattern' => '~^(https?://)?(www\.)?wa\.me/.+~i',
        ],
        'vimeo' => [
            'label' => 'Vimeo',
            'pattern' => '~^(https?://)?(www\.)?vimeo\.com/.+~i',
        ],
        'flickr' => [
            'label' => 'Flickr',
            'pattern' => '~^(https?://)?(www\.)?flickr\.com/.+~i',
        ],
    ],
];
