<?php
namespace Kitchen\Knockout\Block;

use Kitchen\News\Model\GalleryFactory;

class ViewAbstract extends \Magento\Framework\View\Element\Template
{
    protected $configProvider;
    protected $galleryFactory;
    protected $_layoutProcessors;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\CompositeConfigProvider $configProvider,
        GalleryFactory $galleryFactory,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
        $this->galleryFactory = $galleryFactory;
        $this->_layoutProcessors = $layoutProcessors;
    }

    public function getJsLayout()
    {
        foreach ($this->_layoutProcessors as $processor) {  
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return parent::getJsLayout();
    }

    public function getValues()
    {
        $getGallery = $this->galleryFactory->create();
        $getData = $getGallery->getCollection();
        $getArr = [];
        foreach ($getData as $row) {
            $getArr[] = $row->getData();
        }
        return json_encode($getArr);
    }
}
