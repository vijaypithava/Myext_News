<?php
namespace Myext\News\Model;
class SkipCsrfValidator
{   
    /**
     * @param \Magento\Framework\App\Request\CsrfValidator $subject
     * @param \Closure $proceed
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\App\ActionInterface $action
     */
    public function aroundValidate(
        $subject,
        \Closure $proceed,
        $request,
        $action
    ) {
        echo $request->getModuleName();
        if ($request->getModuleName() == 'myext_news') {
            return;
        }
        $proceed($request, $action);
    }
}