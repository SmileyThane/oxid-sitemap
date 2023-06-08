<?php

namespace SmileyThane\OxidSiteMap\Query;

use SmileyThane\OxidSiteMap\Entity\Config;
use SmileyThane\OxidSiteMap\Entity\Page;

class HomePage implements QueryInterface
{
    protected $hierarchy;
    protected $changefreq;
    protected $config;

    /**
     * HomePage constructor.
     * @param Config $config
     * @param $hierarchy
     * @param $changefreq
     */
    public function __construct(Config $config, $hierarchy, $changefreq)
    {
        $this->config = $config;
        $this->hierarchy = $hierarchy;
        $this->changefreq = $changefreq;
    }

    /**
     * @inheritdoc
     */
    public function getPages()
    {
        return [
            new Page(
                $this->config->getShopUrl(),
                $this->hierarchy,
                (new \DateTime())->format(\DateTime::ATOM),
                $this->changefreq,
                null
            )
        ];
    }
}
