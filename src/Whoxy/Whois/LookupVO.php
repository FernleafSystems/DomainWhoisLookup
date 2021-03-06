<?php

namespace FernleafSystems\ApiWrappers\Whois\Whoxy\Whois;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class LookupVO
 * @package FernleafSystems\ApiWrappers\Whois\Whoxy\Whois
 */
class LookupVO {

	use StdClassAdapter;

	/**
	 * @param bool $bAsUnixTimestamp
	 * @return int|string
	 */
	public function getDateCreated( $bAsUnixTimestamp = true ) {
		$sDate = $this->getStringParam( 'create_date' );
		return $bAsUnixTimestamp ? strtotime( $sDate ) : $sDate;
	}

	/**
	 * @param bool $bAsUnixTimestamp
	 * @return int|string
	 */
	public function getDateExpiry( $bAsUnixTimestamp = true ) {
		$sDate = $this->getStringParam( 'expiry_date' );
		return $bAsUnixTimestamp ? strtotime( $sDate ) : $sDate;
	}

	/**
	 * May not be available.
	 * @param bool $bAsUnixTimestamp
	 * @return int|string
	 */
	public function getDateUpdated( $bAsUnixTimestamp = true ) {
		$sDate = $this->getStringParam( 'update_date' );
		return $bAsUnixTimestamp ? strtotime( $sDate ) : $sDate;
	}

	/**
	 * @return string
	 */
	public function getDomainName() {
		return $this->getStringParam( 'domain_name' );
	}

	/**
	 * @return string[]
	 */
	public function getDomainRegistrar() {
		return $this->getParam( 'domain_registrar' );
	}

	/**
	 * @return string|array
	 */
	public function getDomainStatus() {
		return $this->getParam( 'domain_status' );
	}

	/**
	 * May not be available.
	 * @return string[]
	 */
	public function getNameServers() {
		return $this->getArrayParam( 'name_servers' );
	}

	/**
	 * @param bool $bAsUnixTimestamp
	 * @return int|string
	 */
	public function getQueryTime( $bAsUnixTimestamp = true ) {
		$sDate = $this->getStringParam( 'query_time' );
		return $bAsUnixTimestamp ? strtotime( $sDate ) : $sDate;
	}

	/**
	 * @return string
	 */
	public function getWhoisServer() {
		return $this->getStringParam( 'whois_server' );
	}

	/**
	 * @return bool
	 */
	public function isDomainRegistered() {
		return strtolower( $this->getStringParam( 'domain_registered' ) ) == 'yes';
	}

	/**
	 * @return bool
	 */
	public function isValid() {
		$sDomainName = $this->getDomainName();
		return ( $this->getParam( 'status' ) == 1 ) && !empty( $sDomainName );
	}
}