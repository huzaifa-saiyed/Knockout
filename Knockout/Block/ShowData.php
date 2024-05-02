<?php

namespace Kitchen\Knockout\Block;

class ShowData extends \Magento\Framework\View\Element\Template implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $galleryFactory;
    protected $urlBuilder;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Kitchen\News\Model\GalleryFactory $galleryFactory,
        \Magento\Framework\UrlInterface $urlBuilder
    ) {
        $this->galleryFactory = $galleryFactory;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function showData()
    {
        $varCreate = $this->galleryFactory->create();
        $varCollection = $varCreate->getCollection();

        foreach ($varCollection as $row) {
            echo "<tr>";
            echo "<td>" . $row->getNewsId() . "</td>";
            echo "<td>" . $row->getNewsTitle() . "</td>";
            echo "<td>" . $row->getNewsDesc() . "</td>";
            echo "<td>" . $row->getIsActive() . "</td>";
            echo "<td>" . $row->getCreationTime() . "</td>";
            echo "<td>" . $row->getUpdateTime() . "</td>";
            echo "<td><a href='" . $this->urlBuilder->getUrl('news/index/index', ['id' => $row->getNewsId()]) . "'>Edit</a></td>";
            echo "<td><a href='" . $this->urlBuilder->getUrl('news/index/delete', ['id' => $row->getNewsId()]) . "'>Delete</a></td>";
            echo "</tr>";
        }
    }
}
