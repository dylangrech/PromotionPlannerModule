[{if $oDetailsProduct->oxarticles__oxid->value !== '' AND $oDetailsProduct->checkIfPromotionIsActive() !== false}]
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="card text-center">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive" src="[{$oDetailsProduct->getImageUrl()}]">
                    </div>
                </div>
            </div>
        </div>
    </div>
[{/if}]

[{$smarty.block.parent}]
