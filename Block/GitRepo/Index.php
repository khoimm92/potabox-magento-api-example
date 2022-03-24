<?php
/**
 * Copyright © PotaBox, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace PotaBox\ApiExample\Block\GitRepo;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Template;
use PotaBox\ApiExample\Service\GitApi;

/**
 * Class Index
 */
class Index extends Template
{
    const DEFAULT_REPO = "magento/magento2";

    /**
     * @var GitApi
     */
    private $gitApi;

    /**
     * @param Context $context
     * @param GitApi $gitApi
     * @param array $data
     */
    public function __construct(
        Context $context,
        GitApi  $gitApi,
        array   $data = []
    ) {
        parent::__construct($context, $data);
        $this->gitApi = $gitApi;
    }

    /**
     * @return string
     */
    public function getRepoInfo()
    {
        $inputRepo = $this->getRequestString();
        $inputRepo = $inputRepo ?? self::DEFAULT_REPO;
        return $this->gitApi->execute($inputRepo);
    }

    /**
     * @return string
     */
    public function getRequestString()
    {
        return $this->_request->getParam('repo');
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('*/*/');
    }
}
