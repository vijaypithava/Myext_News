<?php
namespace Myext\News\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
 	protected function _construct()
	{
		$this->_init('Myext\News\Model\ResourceModel\News');
	}
}