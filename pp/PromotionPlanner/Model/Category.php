<?php

namespace pp\PromotionPlanner\Model;

class Category extends Category_parent
{
    public function checkIfPromotionIsActive()
    {
        $iActiveFrom = $this->getActiveFrom();
        $iActiveTill = $this->getActiveTill();
        $iCurrentTime = strtotime('now');
        if ($iActiveFrom <= $iCurrentTime && $iCurrentTime <= $iActiveTill) {
            return true;
        }
        return false;
    }

    public function getImageUrl()
    {
        $sPromotionImage = $this->getPromotionImageName();
        if ($sPromotionImage !== '') {
            $sBaseURL = (new \OxidEsales\Eshop\Core\ViewConfig)->getBaseDir();
            return $sBaseURL.'/out/pictures/master/category/promotionImages/'.$sPromotionImage;
        }
    }

    public function getActiveFrom()
    {
        $iActiveFrom = $this->oxcategories__fcpromotionplanneractivefrom->value;
        if ($iActiveFrom !== '') {
            return strtotime($iActiveFrom);
        }
        return false;
    }

    public function getActiveTill()
    {
        $iActiveTill = $this->oxcategories__fcpromotionplanneractivetill->value;
        if ($iActiveTill !== '') {
            return strtotime($iActiveTill);
        }
        return false;
    }

    public function getPromotionImageName()
    {
        $sPromotionImage = $this->oxcategories__fcpromotionplannerimage->value;
        if ($sPromotionImage !== '') {
            return $sPromotionImage;
        }
        return false;
    }
}