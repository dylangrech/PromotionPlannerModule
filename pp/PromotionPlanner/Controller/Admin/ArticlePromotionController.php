<?php

namespace pp\PromotionPlanner\Controller\Admin;

use Symfony\Component\DependencyInjection\Tests\Compiler\F;
use OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController;

class ArticlePromotionController extends AdminDetailsController
{
    protected $_sThisTemplate = "fc_article_promotion.tpl";

    /**
     * Loads article information - pictures, passes data to Smarty
     * engine, returns name of template file "article_pictures.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $this->_aViewData["edit"] = $oArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);

        $soxId = $this->getEditObjectId();
        if (isset($soxId) && $soxId != "-1") {
            // load object
            $oArticle->load($soxId);

            // variant handling
            if ($oArticle->oxarticles__oxparentid->value) {
                $oParentArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);
                $oParentArticle->load($oArticle->oxarticles__oxparentid->value);
                $this->_aViewData["parentarticle"] = $oParentArticle;
                $this->_aViewData["oxparentid"] = $oArticle->oxarticles__oxparentid->value;
            }
        }

        return "fc_article_promotion.tpl";
    }

    /**
     * Saves (uploads) pictures to server.
     *
     * @return mixed
     */
    public function save()
    {
        $myConfig = $this->getConfig();

        if ($myConfig->isDemoShop()) {
            // disabling uploading pictures if this is demo shop
            $oEx = oxNew(\OxidEsales\Eshop\Core\Exception\ExceptionToDisplay::class);
            $oEx->setMessage('ARTICLE_PICTURES_UPLOADISDISABLED');
            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay($oEx, false);

            return;
        }

        parent::save();

        $oArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);
        if ($oArticle->load($this->getEditObjectId())) {
            $oArticle->assign(\OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("editval"));
            \OxidEsales\Eshop\Core\Registry::getUtilsFile()->processFiles($oArticle);

            // Show that no new image added
            if (\OxidEsales\Eshop\Core\Registry::getUtilsFile()->getNewFilesCounter() == 0) {
                $oEx = oxNew(\OxidEsales\Eshop\Core\Exception\ExceptionToDisplay::class);
                $oEx->setMessage('NO_PICTURES_CHANGES');
                \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay($oEx, false);
            }

            $oArticle->save();
        }
    }

}