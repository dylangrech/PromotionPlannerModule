<?php

namespace pp\PromotionPlanner\Controller\Admin;

class ArticlePromotionController extends PromotionPlannerController
{
    protected $_sThisTemplate = "fc_article_promotion.tpl";
    protected $oModel = \OxidEsales\Eshop\Application\Model\Article::class;

    /**
     * Loads article information - pictures, passes data to Smarty
     * engine, returns name of template file "article_pictures.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();
        $this->loadObjectAndTemplate($this->oModel);
        return $this->_sThisTemplate;
    }

    /**
     * Saves (uploads) pictures to server.
     *
     *
     */
    public function save()
    {
        parent::save();
        $this->savePromotionDetails($this->oModel);
    }

}