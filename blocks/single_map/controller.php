<?php
namespace Concrete\Package\SingleMap\Block\SingleMap;

use Concrete\Core\Block\BlockController;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Editor\LinkAbstractor;

class Controller extends BlockController
{
    protected $btTable = 'btSingleMap';
    protected $btInterfaceWidth = '800';
    protected $btInterfaceHeight = '600';
    protected $btWrapperClass = 'ccm-ui';
    protected $btDefaultSet = 'multimedia';

    public function getBlockTypeName()
    {
        return t('Single Map');
    }

    public function getBlockTypeDescription()
    {
        return t('Embed a single google map with options');
    }

    public function add()
    {
        $this->set('bf', null);
    }

    public function edit()
    {
        $bf = null;
        if ($this->getFileID() > 0) {
            $bf = $this->getFileObject();
        }
        $this->set('bf', $bf);
		$this->set('content', LinkAbstractor::translateFrom($this->content));
    }

    public function view()
    {
        // Check for a valid File in the view
        $f = File::getByID($this->fID);
        $this->set('f', $f);
        $this->set('c', Page::getCurrentPage());

        $linkToC = Page::getByID($this->internalLinkCID);
        if (is_object($linkToC) && !$linkToC->isError()) {
            $linkUrl = $linkToC->getCollectionLink();
		} else if ($this->customLink) {
			$linkUrl = $this->customLink;
		}
        $this->set('linkUrl', $linkUrl);
		$this->set('content', LinkAbstractor::translateFrom($this->content));
    }

    public function save($data)
    {
	    $data['content'] = LinkAbstractor::translateTo($data['content']);
        parent::save($data);
    }


    /**
     * @return int
     */
    public function getFileID()
    {
        return $this->fID;
    }

    /**
     * @return int
     */
    public function getFileObject()
    {
        return File::getByID($this->fID);
    }

}
