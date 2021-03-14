<?php
namespace Myext\News\Ui\Component\Listing\Column;

class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $_storeManager;  

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $mediaUrl = $this->_storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'news/';
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$this->getData('name')])) {
                    $img = $mediaUrl.$item[$this->getData('name')];
                    $item[$this->getData('name')] = '<img src="'.$img.'" style="width: 100px;height: auto;" />';
                } else {
                    $item[$this->getData('name')] = $item[$this->getData('name')];
                }
            }
        }
        
        return $dataSource;
    }
}

