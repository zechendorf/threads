<?php
namespace ZECHENDORF\Threads\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Thread
 */
class Thread extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * bodytext
     *
     * @var string
     */
    protected $bodytext = '';
    
    /**
     * childThreads
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Threads\Domain\Model\Thread>
     * @cascade remove
     */
    protected $childThreads = null;
    
    /**
     * author
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     * @lazy
     */
    protected $author = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->childThreads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the author
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * Sets the author
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $author
     * @return void
     */
    public function setAuthor(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $author)
    {
        $this->author = $author;
    }
    
    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the bodytext
     *
     * @return string $bodytext
     */
    public function getBodytext()
    {
        return $this->bodytext;
    }
    
    /**
     * Sets the bodytext
     *
     * @param string $bodytext
     * @return void
     */
    public function setBodytext($bodytext)
    {
        $this->bodytext = $bodytext;
    }
    
    /**
     * Adds a
     *
     * @param \ZECHENDORF\Threads\Domain\Model\Thread $childThread
     * @return void
     */
    public function addChildThread($childThread)
    {
        $this->childThreads->attach($childThread);
    }
    
    /**
     * Removes a
     *
     * @param \ZECHENDORF\Threads\Domain\Model\Thread $childThreadToRemove The Thread to be removed
     * @return void
     */
    public function removeChildThread($childThreadToRemove)
    {
        $this->childThreads->detach($childThreadToRemove);
    }
    
    /**
     * Returns the childThreads
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Threads\Domain\Model\Thread> childThreads
     */
    public function getChildThreads()
    {
        return $this->childThreads;
    }
    
    /**
     * Sets the childThreads
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ZECHENDORF\Threads\Domain\Model\Thread> $childThreads
     * @return void
     */
    public function setChildThreads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $childThreads)
    {
        $this->childThreads = $childThreads;
    }

}