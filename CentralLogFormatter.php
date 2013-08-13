<?php

/**
 * Log formatter to account for foreign links
 *
 * @author Kunal Mehta
 */

class CentralLogFormatter extends LogFormatter {
	/**
	 * Uses WikiMap to make a foreign link based on the dbname
	 * If the entry was local, use the normal method
	 * @param Title $title
	 * @param array $parameters
	 * @return String
	 */
	protected function makePageLink( Title $title = null, $parameters = array() ) {
		global $wgDBname;
		$entry = $this->entry;
		$params = $entry->getParameters();
		$dbname = $params['dbname'];
		if ( $wgDBname == $dbname ) { // Viewing on the same wiki it was inserted in
			return parent::makePageLink( $title, $parameters );
		} else {
			return WikiMap::makeForeignLink( $dbname, $title->getPartialURL() );
		}
	}

	/**
	 * Uses WikiMap to make a foreign link based on the dbname
	 * If the entry was local, use the normal method
	 * @param User $user
	 * @return String
	 */
	function makeUserLink( User $user ) {
		global $wgDBname;
		$entry = $this->entry;
		$params = $entry->getParameters();
		$dbname = $params['dbname'];
		if ( $wgDBname == $dbname ) { // Viewing on the same wiki it was inserted in
			return parent::makeUserLink( $user );
		} else {
			return WikiMap::foreignUserLink( $dbname, $user->getName() );
		}
	}
}

