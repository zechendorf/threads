<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Newthread',
	'New Thread'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ZECHENDORF.' . $_EXTKEY,
	'Threads',
	'Threads'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Threads');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_threads_domain_model_thread', 'EXT:threads/Resources/Private/Language/locallang_csh_tx_threads_domain_model_thread.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_threads_domain_model_thread');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_threads_domain_model_thread'
);
