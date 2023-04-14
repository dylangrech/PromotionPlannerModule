<?php

namespace pp\PromotionPlanner\Model;

class Manufacturer extends Manufacturer_parent
{
    //declare properties
    //change to string

    public function checkIfPromotionIsActive()
    {
        $iActiveFrom = $this->getFcPromotionPlannerActiveFrom();
        $iActiveTill = $this->getFcPromotionPlannerActiveTill();
        $iCurrentTime = strtotime('now');
        if ($iActiveFrom <= $iCurrentTime && $iCurrentTime <= $iActiveTill) {
            return true;
        }
        return false;
    }

    public function getImageUrl()
    {
        $sPromotionImage = $this->getFcPromotionPlannerImageName();
        if ($sPromotionImage !== '') {
            $sBaseURL = (new \OxidEsales\Eshop\Core\ViewConfig)->getBaseDir();
            return $sBaseURL.'/out/pictures/master/manufacturer/promotionImages/'.$sPromotionImage;
        }
    }

    public function getFcPromotionPlannerActiveFrom()
    {
        $sActiveFrom = $this->oxmanufacturers__fcpromotionplanneractivefrom->value;
        if ($sActiveFrom !== '') {
            return strtotime($sActiveFrom);
        }
        return false;
    }

    public function getFcPromotionPlannerActiveTill()
    {
        $iActiveTill = $this->oxmanufacturers__fcpromotionplanneractivetill->value;
        if ($iActiveTill !== '') {
            return strtotime($iActiveTill);
        }
        return false;
    }

    public function getFcPromotionPlannerImageName()
    {
        $sPromotionImage = $this->oxmanufacturers__fcpromotionplannerimage->value;
        if ($sPromotionImage !== '') {
            return $sPromotionImage;
        }
        return false;
    }
}