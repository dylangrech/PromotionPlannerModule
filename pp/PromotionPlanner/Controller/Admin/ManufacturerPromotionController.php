<?php

namespace pp\PromotionPlanner\Controller\Admin;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;

class ManufacturerPromotionController extends AdminDetailsController
{
    protected $_sThisTemplate = "fc_manufacturer_promotion.tpl";

    /**
     * Executes parent method parent::render(),
     * and returns name of template file
     * "manufacturer_main.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $oManufacturer = oxNew(\OxidEsales\Eshop\Application\Model\Manufacturer::class);

        $soxId = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {
            // load object
            $oManufacturer->load($soxId);
        }
        $this->_aViewData["edit"] = $oManufacturer;

        return "fc_manufacturer_promotion.tpl";
    }

    /**
     * Saves selection list parameters changes.
     *
     *
     */
    public function save()
    {
        parent::save();
        $soxId = $this->getEditObjectId();
        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval");

        $oManufacturer = oxNew(\OxidEsales\Eshop\Application\Model\Manufacturer::class);
        $oManufacturer->load($soxId);
        $oManufacturer->assign($aParams);
        $oManufacturer = \OxidEsales\Eshop\Core\Registry::getUtilsFile()->processFiles($oManufacturer);
        $oManufacturer->save();
    }

}