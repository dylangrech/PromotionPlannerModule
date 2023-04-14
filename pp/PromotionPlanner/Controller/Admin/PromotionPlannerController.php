<?php

namespace pp\PromotionPlanner\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;

class PromotionPlannerController extends AdminDetailsController
{
    public function render()
    {
        parent::render();
    }

    public function save()
    {
        parent::save();
    }

    public function loadObjectAndTemplate($className)
    {
        $oModel = oxNew($className);
        $soxId = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {
            $oModel->load($soxId);
        }
        $this->_aViewData["edit"] = $oModel;
    }

    public function savePromotionDetails($className)
    {
        $soxId = $this->getEditObjectId();
        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval");

        $oModel = oxNew($className);
        $oModel->load($soxId);
        $oModel->assign($aParams);
        $oModel = \OxidEsales\Eshop\Core\Registry::getUtilsFile()->processFiles($oModel);
        $oModel->save();
    }
}