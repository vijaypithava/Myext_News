<?php
namespace Myext\News\Controller\Adminhtml\News;

class Delete extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {                
                $model = $this->_objectManager->create(\Myext\News\Model\News::class);
                $model->load($id);
                $model->delete();
                
                $this->messageManager->addSuccessMessage(__('You deleted the News.'));
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                
                $this->messageManager->addErrorMessage($e->getMessage());
                
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        
        $this->messageManager->addErrorMessage(__('We can\'t find a News to delete.'));
        
        return $resultRedirect->setPath('*/*/');
    }
}

