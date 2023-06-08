<?php

namespace SmileyThane\OxidSiteMap\Query;

use SmileyThane\OxidSiteMap\Entity\Config;
use SmileyThane\OxidSiteMap\Entity\Page;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

abstract class AbstractQuery implements QueryInterface
{
    protected $queryBuilderFactory;
    protected $hierarchy;
    protected $changefreq;
    protected $config;


    /**
     * AbstractQuery constructor.
     * @param QueryBuilderFactoryInterface $queryBuilderFactory
     * @param Config $config
     * @param string $hierarchy
     * @param string $changefreq
     */
    public function __construct(
        QueryBuilderFactoryInterface $queryBuilderFactory,
        Config $config,
        string $hierarchy,
        string $changefreq
    ) {
        $this->queryBuilderFactory = $queryBuilderFactory;
        $this->config              = $config;
        $this->hierarchy           = $hierarchy;
        $this->changefreq          = $changefreq;
    }

    /**
     * @return array
     */
    public function getPages()
    {
        $pages  = [];
        $query  = $this->getQuery($this->queryBuilderFactory->create());
        $result = $query->execute()->fetchAll();
        if ($result !== false) {
            foreach ($result as $item) {
                $pages[] = $this->createPage($item);
            }
        }

        return $pages;
    }

    /**
     * @param $result
     * @return Page
     */
    protected function createPage($result)
    {
        $url = $result['oxseourl'];
        if (empty($url)) {
            $url = $result['oxstdurl'];
        }

        $image = null;
        $imgUrl = $result['oxpic'] ?? $result['oxthumb'];
        if ($imgUrl) {
            $image['url'] = $this->getConfig()->getImageUrl($this->isAdmin(), true, null, $imgUrl);
            $image['caption'] = $result['oxtitle'];
        }


        return new Page(
            $this->config->getShopUrl() . $url,
            $this->hierarchy,
            (new \DateTime())->format(\DateTime::ATOM),
            $this->changefreq,
            $this->getImageData($result)
        );
    }

    protected function getImageData($result) {
        $image = null;
        $imgUrl = $result['oxpic'] ?? $result['oxthumb'];
        if ($imgUrl) {
            $image['url'] = $this->getConfig()->getImageUrl($this->isAdmin(), true, null, $imgUrl);
            $image['caption'] = $result['oxtitle'];
        }

        return $image;
    }
}
