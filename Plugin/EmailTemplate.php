<?php

namespace Elgentos\LegacyEmailEnable\Plugin;

/**
 * Class EmailTemplate
 * @package Elgentos\LegacyEmailEnable\Plugin
 *
 * Set the is_legacy to 1 for newly created email templates in backend.
 */
class EmailTemplate
{
    /**
     * @param \Magento\Email\Model\Template $subject
     *
     * @return array
     */
    public function beforeSave(\Magento\Email\Model\Template $subject) {
        $subject->setData('is_legacy', 1);
        return [];
    }
}
