<?php

namespace Kitchen\Knockout\Block\Product;

class View extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function showData()
    {
        echo "This is ViewModel";
    }
}
