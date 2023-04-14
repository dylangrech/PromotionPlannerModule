<?php

namespace pp\PromotionPlanner\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;

class CategoryPromotionController extends AdminDetailsController
{
    protected $_sThisTemplate = "fc_category_promotion.tpl";

    /**
     * Loads category object data, pases it to Smarty engine and returns
     * name of template file "category_text.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $oCategory = oxNew(\OxidEsales\Eshop\Application\Model\Category::class);

        $soxId = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {
            // load object
            $oCategory->load($soxId);
        }
        $this->_aViewData['edit'] = $oCategory;

        return "fc_category_promotion.tpl";
    }

    /**
     * Saves category description text to DB.
     *
     *
     */
    public function save()
    {
        parent::save();
        $soxId = $this->getEditObjectId();
        $aParams = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval");

        $oCategory = oxNew(\OxidEsales\Eshop\Application\Model\Category::class);
        $oCategory->load($soxId);
        $oCategory->assign($aParams);
        $oCategory = \OxidEsales\Eshop\Core\Registry::getUtilsFile()->processFiles($oCategory);
        $oCategory->save();
    }
}