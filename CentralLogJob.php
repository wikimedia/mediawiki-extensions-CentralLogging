<?php

/**
 * Job class which submits jobs when run
 *
 * @author Kunal Mehta
 */

class CentralLogJob extends Job {

	/**
	 * @param Title $title
	 * @param array $params
	 * @param int $id
	 */
	public function __construct( $title, $params, $id = 0 ) {
		parent::__construct( 'centrallogJob', $title, $params, $id );
	}

	public function run() {
		/**
		 * @var $entry CentralLogEntry
		 */
		$entry = $this->params['data'];
		$logId = $entry->insert();
		if ( $entry->shouldWePublishEntry() ) {
			$entry->publish( $logId, $entry->publishEntryTo() );
		}

		return true;
	}
}



