<?php
namespace Myext\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';

	protected function _construct()
	{
		$this->_init('Myext\News\Model\News', 'Myext\News\Model\ResourceModel\News');
	}
}