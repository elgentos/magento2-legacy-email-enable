<?php

namespace Elgentos\LegacyEmailEnable\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class IsLegacyEmailTemplatesEnabled
 * @package Elgentos\LegacyEmailEnable\Setup\Patch\Data
 *
 * Patch to fix the current is_legacy values in email_templates table.
 */
class IsLegacyEmailTemplatesEnabled implements DataPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * IsLegacyEmailTemplatesEnabled constructor.
     *
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Change the current is_legacy values to 1 from 0.
     * @return IsLegacyEmailTemplatesEnabled|void
     */
    public function apply()
    {
        if($this->moduleDataSetup->tableExists('email_template')) {
            $this->moduleDataSetup->startSetup();
            $this->moduleDataSetup->getConnection()->update(
                $this->moduleDataSetup->getTable('email_template'),
                ['is_legacy' => 1],
                ['is_legacy = ?' => 0]
            );
            $this->moduleDataSetup->endSetup();
        }
    }

    /**
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return [];
    }
}
