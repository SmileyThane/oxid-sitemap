<?php

namespace SmileyThane\OxidSiteMap\Filter;

use SmileyThane\OxidSiteMap\Entity\Page;

interface FilterInterface
{
    public function filter(Page $page);
}
