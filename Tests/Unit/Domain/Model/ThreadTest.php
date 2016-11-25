<?php

namespace ZECHENDORF\Threads\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Christopher Zechendorf <christopher@zechendorf.com>, ZECHENDORF
 *
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

/**
 * Test case for class \ZECHENDORF\Threads\Domain\Model\Thread.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christopher Zechendorf <christopher@zechendorf.com>
 */
class ThreadTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ZECHENDORF\Threads\Domain\Model\Thread
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ZECHENDORF\Threads\Domain\Model\Thread();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBodytextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBodytext()
		);
	}

	/**
	 * @test
	 */
	public function setBodytextForStringSetsBodytext()
	{
		$this->subject->setBodytext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'bodytext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getChildThreadsReturnsInitialValueForThread()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getChildThreads()
		);
	}

	/**
	 * @test
	 */
	public function setChildThreadsForObjectStorageContainingThreadSetsChildThreads()
	{
		$childThread = new \ZECHENDORF\Threads\Domain\Model\Thread();
		$objectStorageHoldingExactlyOneChildThreads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneChildThreads->attach($childThread);
		$this->subject->setChildThreads($objectStorageHoldingExactlyOneChildThreads);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneChildThreads,
			'childThreads',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addChildThreadToObjectStorageHoldingChildThreads()
	{
		$childThread = new \ZECHENDORF\Threads\Domain\Model\Thread();
		$childThreadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$childThreadsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($childThread));
		$this->inject($this->subject, 'childThreads', $childThreadsObjectStorageMock);

		$this->subject->addChildThread($childThread);
	}

	/**
	 * @test
	 */
	public function removeChildThreadFromObjectStorageHoldingChildThreads()
	{
		$childThread = new \ZECHENDORF\Threads\Domain\Model\Thread();
		$childThreadsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$childThreadsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($childThread));
		$this->inject($this->subject, 'childThreads', $childThreadsObjectStorageMock);

		$this->subject->removeChildThread($childThread);

	}

	/**
	 * @test
	 */
	public function getAuthorReturnsInitialValueForFrontendUser()
	{	}

	/**
	 * @test
	 */
	public function setAuthorForFrontendUserSetsAuthor()
	{	}
}
