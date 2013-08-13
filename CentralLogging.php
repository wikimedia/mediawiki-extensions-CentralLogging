<?php

/**
 * Extension to allow you to log to a central wiki rather than on that wiki.
 * Implemented through the job queue
 * See README for usage instructions
 *
 * @author Kunal Mehta <legoktm@gmail.com>
 */

/**
 * Database name of the wiki to log to
 * Individual extensions will be able to override this
 * but it will fallback to this setting
 */
$wgCentralWiki = 'metawiki';


$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'CentralLogging',
	'author' => 'Kunal Mehta',
	'url' => 'https://www.mediawiki.org/wiki/Extension:CentralLogging',
	'descriptionmsg' => 'centrallogging-desc',
	'version' => '1.0',
);

$wgAutoloadClasses['CentralLogEntry'] = __DIR__ . '/CentralLogEntry.php';
$wgAutoloadClasses['CentralLogFormatter'] = __DIR__ . '/CentralLogFormatter.php';
$wgAutoloadClasses['CentralLogJob'] = __DIR__ . '/CentralLogJob.php';
$wgJobClasses['centrallogJob'] = 'CentralLogJob';
$wgExtensionMessagesFiles['CentralLogging'] = __DIR__ . '/CentralLogging.i18n.php';
