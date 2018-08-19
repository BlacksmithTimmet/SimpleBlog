<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Pluswerk.' . $_EXTKEY,
    'Showcase',
	array(
		'Start' => 'list,index,show',
	),
	array(
		'Start' => 'list,index,show',
	)
);

?>