<?php

/**
 * Hoooooooks!
 *
 * @author Kunal Mehta
 */

class CentralLoggingHooks {

	/**
	 * Add number of queued entries to Special:Statistics
	 * @param $extraStats
	 * @return bool
	 */
	public static function onSpecialStatsAddExtra( &$extraStats ) {
		// from runJobs.php --group
		$group = JobQueueGroup::singleton();
		$queue = $group->get( 'centrallogJob' );
		$pending = $queue->getSize();
		$claimed = $queue->getAcquiredCount();
		$abandoned = $queue->getAbandonedCount();
		$active = ( $claimed - $abandoned );

		$queued = $active + $pending;
		$extraStats['centrallogging-queued-count'] = $queued;

		return true;
	}
}
