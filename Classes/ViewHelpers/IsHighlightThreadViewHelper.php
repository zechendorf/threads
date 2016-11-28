<?php
namespace ZECHENDORF\Threads\ViewHelpers;
class IsHighlightThreadViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
		
	/**
	 * IsHighlightThread
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feUser
	 * @param string $highlightGroups
	 */
	public function render(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feUser, string $highlightGroups)
	{
		$isHighlight = false;
		$groups = explode(',',$highlightGroups);
		foreach($feUser->getUsergroup() as $usergroup){
			if(in_array($usergroup->getUid(),$groups)){
				$isHighlight = true;
			}
		}
		return $isHighlight;
	}
	
}
