{modurl modname='Users' type='admin' func='modifyconfig' assign='usersurl'}
{include file="Avatar_admin_menu.tpl"}

<h2>{gt text="Modify configuration"}</h2>

{form cssClass="z-form"}
{formvalidationsummary}

<fieldset>
    <legend>{gt text="Upload settings"}</legend>

    <div class="z-formrow">
        {formlabel for="avatarpath" __text='Avatar Directory' html='1'}
        {pathinput removeSlash="1" writable="1" size="25" maxLength="50" id="avatarpath" text=$avatarpath}
    </div>

    {if $avatarpath_writable eq false}
    <p class="z-errormsg z-formnote">{gt text="Warning! The webserver cannot write to the avatar directory."}</p>
    {/if}

    {if $pnphpbb_installed eq true}
    <div class="z-formrow">
        {formlabel for="forumdir" __text='Avatar Directory (PNphpBB2)'}
        {pathinput size="25" removeSlash="1" writable="1" maxLength="50" id="forumdir" text=$coredata.Avatar.forumdir}
        {if $forumdir_writable eq false}
        <p class="z-errormsg z-formnote">{gt text="Warning! The webserver cannot write to the forums avatar direcory (this is fine when PNphpBB2 isn't installed)."}</p>
        {/if}
    </div>
    {/if}

    <div class="z-formrow">
        {formlabel for="allow_resize" __text='Resize the avatar automatically'}
        {formcheckbox id="allow_resize" checked=$coredata.Avatar.allow_resize}
    </div>

    <div class="z-formrow">
        {formlabel for="maxsize" __text='Max. avatar filesize in bytes' html='1'}
        {formintinput minValue="0" maxValue="100000" size="10" maxLength="10" id="maxsize" text=$coredata.Avatar.maxsize}
    </div>

    <div class="z-formrow">
        {formlabel for="maxheight" __text='Max. height in pixels' html='1'}
        {formintinput minValue="10" maxValue="400" size="10" maxLength="10" id="maxheight" text=$coredata.Avatar.maxheight}
    </div>

    <div class="z-formrow">
        {formlabel for="maxwidth" __text='Max. width in pixels' html='1'}
        {formintinput minValue="10" maxValue="400" size="10" maxLength="10" id="maxwidth" text=$coredata.Avatar.maxwidth}
    </div>

    <div class="z-formrow">
        {formlabel for="allowed_extensions" __text='Allowed extensions' html='1'}
        {formtextinput size="25" maxLength="40" id="allowed_extensions" text=$coredata.Avatar.allowed_extensions}
        <p class="z-formnote z-informationmsg">{gt text="A semicolon separated list of allowed file extensions, supported filetypes: gif, jpg, jpeg, png, wbm. When using PHP 5 or later you have to allow 'jpeg' instead of 'jpg'."}</p>
    </div>

    <div class="z-formrow">
        {formlabel for="allow_multiple" __text='Allow multiple avatars'}
        {formcheckbox id="allow_multiple" checked=$coredata.Avatar.allow_multiple}
        <em>{gt text="This allows the user to store one avatar per extension"}</em>
    </div>
</fieldset>

<div class="z-formbuttons">
    {formbutton id="submit" commandName="submit" __text="Submit"}
</div>
{/form}

{include file="Avatar_admin_footer.tpl"}
