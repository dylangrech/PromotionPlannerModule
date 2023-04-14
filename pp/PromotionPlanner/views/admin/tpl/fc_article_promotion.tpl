[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    function editThis( sID )
    {
        var oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
        oTransfer.oxid.value = sID;
        oTransfer.cl.value = top.basefrm.list.sDefClass;

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        var oSearch = top.basefrm.list.document.getElementById( "search" );
        oSearch.oxid.value = sID;
        oSearch.actedit.value = 0;
        oSearch.submit();
    }
    [{if !$oxparentid}]
    window.onload = function ()
    {
        [{if $updatelist == 1}]
        top.oxid.admin.updateList('[{$oxid}]');
        [{/if}]
        var oField = top.oxid.admin.getLockTarget();
        oField.onchange = oField.onkeyup = oField.onmouseout = top.oxid.admin.unlockSave;
    }
        [{/if}]
    //-->
</script>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="fc_article_promotion">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" enctype="multipart/form-data" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0px;margin: 0px;height:0px;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="fc_article_promotion">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">
    <input type="hidden" name="oxparentid" value="[{$oxparentid}]">
    <input type="hidden" name="editval[oxarticles__oxid]" value="[{$oxid}]">
    <input type="hidden" name="editval[oxarticles__oxlongdesc]" value="">
    <table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_FROM"}]
            </td>
            <td class="edittext">
                <input step="1" type="datetime-local" class="editinput" name="editval[oxarticles__fcpromotionplanneractivefrom]" value="[{$edit->oxarticles__fcpromotionplanneractivefrom->value}]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_FROM"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_TILL"}]
            </td>
            <td class="edittext">
                <input step="1" type="datetime-local" class="editinput" name="editval[oxarticles__fcpromotionplanneractivetill]" value="[{$edit->oxarticles__fcpromotionplanneractivetill->value}]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_TILL"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_IMAGE_NAME"}]
            </td>
            <td class="edittext">
                <input readonly type="text" class="editinput" size="25" value="[{$edit->oxarticles__fcpromotionplannerimage->value}]" >
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_IMAGE_NAME"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_IMAGE"}]
            </td>
            <td class="edittext">
                <input onchange="loadFile(event)" type="file" class="editinput" name="myfile[PROMO_ARTICLE@oxarticles__fcpromotionplannerimage]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_IMAGE"}]
            </td>
        </tr>
        <tr>
            <td class="edittext" colspan="2"><br><br>
                <input type="submit" class="edittext" id="oLockButton" name="saveArticle" value="[{oxmultilang ident="ARTICLE_MAIN_SAVE"}]" onClick="Javascript:document.myedit.fnc.value='save'" [{if !$edit->oxarticles__oxtitle->value && !$oxparentid}]disabled[{/if}] [{$readonly}]>
            </td>
        </tr>
    </table>
</form>
<img id="output"/>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]