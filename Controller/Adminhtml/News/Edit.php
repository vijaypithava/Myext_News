<?php
namespace Myext\News\Controller\Adminhtml\News;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Myext\News\Model\News::class);
        
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This news no longer exists.'));

                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('myext_news', $model);
        
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit News') : __('New News'),
            $id ? __('Edit News') : __('New News')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Newss'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit News %1', $model->getId()) : __('New News'));
        return $resultPage;
    }

    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Myext_News::myextnews')
            ->addBreadcrumb(__('Myext'), __('Myext'))
            ->addBreadcrumb(__('News'), __('News'));
        return $resultPage;
    }
}

