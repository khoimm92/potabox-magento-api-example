<?php
/**
 * Copyright © PotaBox, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace PotaBox\ApiExample\Service;

interface GitApiInterface
{
    /**
     * @param string $repoName
     * @return string
     */
    public function execute(string $repoName): string;
}
