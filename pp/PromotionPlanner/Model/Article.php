<?php

namespace pp\PromotionPlanner\Model;

class Article extends Article_parent
{
    //declare properties

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
            return $sBaseURL.'/out/pictures/master/product/promotionImages/'.$sPromotionImage;
        }
    }

    public function getActiveFrom()
    {
        $iActiveFrom = $this->oxarticles__fcpromotionplanneractivefrom->value;
        if ($iActiveFrom !== '') {
            return strtotime($iActiveFrom);
        }
        return false;
    }

    public function getActiveTill()
    {
        $iActiveTill = $this->oxarticles__fcpromotionplanneractivetill->value;
        if ($iActiveTill !== '') {
            return strtotime($iActiveTill);
        }
        return false;
    }

    public function getPromotionImageName()
    {
        $sPromotionImage = $this->oxarticles__fcpromotionplannerimage->value;
        if ($sPromotionImage !== '') {
            return $sPromotionImage;
        }
        return false;
    }

}