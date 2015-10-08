<?php
namespace ApacheSolrForTypo3\Tika\Tests\Unit\Service\Tika;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Ingo Renner <ingo@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use ApacheSolrForTypo3\Tika\Service\Tika\SolrCellService;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;


/**
 * Class AppServiceTest
 *
 */
class SolrCellServiceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * Creates Solr Server connection configuration pointing to
	 * http://localhost:8080/solr/
	 *
	 * @return array
	 */
	protected function getSolrConfiguration() {
		return array(
			'solrScheme' => 'http',
			'solrHost' => 'localhost',
			'solrPort' => '8080',
			'solrPath' => '/solr/',
		);
	}

	/**
	 * @test
	 */
	public function newInstancesAreInitializedWithASolrConnection() {
		if (!ExtensionManagementUtility::isLoaded('solr')) {
			$this->markTestSkipped('EXT:solr is required for this test, but is not loaded.');
		}

		$service = new SolrCellService($this->getSolrConfiguration());
		$this->assertAttributeInstanceOf('ApacheSolrForTypo3\\Solr\\SolrService', 'solr', $service);
	}

}
