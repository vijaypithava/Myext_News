<?php
namespace Myext\News\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    public function toOptionArray()
    {
        $result = [];
        foreach ($this->getOptions() as $value => $label) {
            $result[] = [
                 'value' => $value,
                 'label' => $label,
             ];
        }
        return $result;
    }

    public function getOptions()
    {
        return [
            '1' => __('Active'),
            '0' => __('Inactive')
        ];
    }
}