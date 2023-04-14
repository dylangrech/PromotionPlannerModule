[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="fc_category_promotion">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" enctype="multipart/form-data" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0px;margin: 0px;height:0px;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="fc_category_promotion">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[oxcategories__oxid]" value="[{$oxid}]">
    <table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_FROM"}]
            </td>
            <td class="edittext">
                <input step="1" type="datetime-local" class="editinput" name="editval[oxcategories__fcpromotionplanneractivefrom]" value="[{$edit->oxcategories__fcpromotionplanneractivefrom->value}]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_FROM"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_TILL"}]
            </td>
            <td class="edittext">
                <input step="1" type="datetime-local" class="editinput" name="editval[oxcategories__fcpromotionplanneractivetill]" value="[{$edit->oxcategories__fcpromotionplanneractivetill->value}]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_TILL"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_IMAGE_NAME"}]
            </td>
            <td class="edittext">
                <input readonly type="text" class="editinput" size="25" value="[{$edit->oxcategories__fcpromotionplannerimage->value}]" >
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_IMAGE_NAME"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
                [{oxmultilang ident="FC_PROMOTION_PLANER_IMAGE"}]
            </td>
            <td class="edittext">
                <input type="file" class="editinput" name="myfile[PROMO_CATEGORY@oxcategories__fcpromotionplannerimage]" [{$readonly}]>
                [{oxinputhelp ident="HELP_FC_PROMOTION_PLANER_IMAGE"}]
            </td>
        </tr>
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext" colspan="2"><br>
                <input type="submit" class="edittext" name="save" value="[{oxmultilang ident="CATEGORY_MAIN_SAVE"}]" onClick="Javascript:document.myedit.fnc.value='save'" [{$readonly}]><br>
            </td>
        </tr>
    </table>
</form>

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]