[{assign var="oManufacturer" value=$oView->getManufacturer()}]
[{if $oManufacturer->checkIfPromotionIsActive() !== false }]
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="card text-center">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive" src="[{$oManufacturer->getImageUrl()}]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    [{/if}]

[{$smarty.block.parent}]
