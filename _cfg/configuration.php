<?php
$cfg = new \diCore\Data\Configuration();
$cfg->setTabsAr([
	'general' => 'General',
	'pics' => 'Pics',
	'counts' => 'Counts',
])->setInitialData([
	'auto_save_timeout' => [
		'title' => 'Auto-save timeout, sec',
		'type' => 'int',
		'value' => 0,
		'notes' => [
			'Auto-save works in every Admin form. If 0 then auto-save feature is off',
		],
	],

    'open_graph_default_pic' => [
        'title' => 'Open graph default pic',
        'type' => 'pic',
        'value' => '',
        'tab' => 'pics',
    ],

    'sample_width' => [
        'title' => ' pic width',
        'type' => 'int',
        'value' => 1920,
        'tab' => 'pics',
    ],

    'sample_height' => [
        'title' => ' pic height',
        'type' => 'int',
        'value' => 1080,
        'tab' => 'pics',
    ],

    'sample_tn_width' => [
        'title' => ' pic preview width',
        'type' => 'int',
        'value' => 400,
        'tab' => 'pics',
    ],

    'sample_tn_height' => [
        'title' => ' pic preview height',
        'type' => 'int',
        'value' => 200,
        'tab' => 'pics',
    ],

	'admin_per_page[admins]' => [
		'title' => 'Admins per page (in Admin)',
		'type' => 'int',
		'value' => 30,
		'tab' => 'counts',
	],

	'admin_per_page[mail_queue]' => [
		'title' => 'Mail queue records per page (in Admin)',
		'type' => 'int',
		'value' => 30,
		'tab' => 'counts',
	],

	'sender_email' => [
		'title' => 'E-mail for outgoing mail',
		'type' => 'string',
		'value' => 'noreply@' . \diCore\Data\Config::getMainDomain(),
		'tab' => 'general',
	],
])->loadCache();
