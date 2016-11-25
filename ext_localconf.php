<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Newthread',
	array(
		'Thread' => 'new, create',
		
	),
	// non-cacheable actions
	array(
		'Thread' => 'create',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Threads',
	array(
		'Thread' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Thread' => 'create, update, delete',
		
	)
);
