{include file="Avatar_admin_menu.tpl"}
<h2>{gt text="Confirm deletion"}</h2>

<form class="z-form" action="{modurl modname="Avatar" type="admin" func="delete"}" method="post">
    <fieldset>
        <legend>{gt text="Confirm deletion"}</legend>
        <p><strong class="z-formnote">{gt text="Selected avatar"}</strong></p>
        <p><img class="z-formnote avatarchoosen" src="{getbaseurl}{$avatarpath|safetext}/{$avatar|safetext}" alt="Avatar" /></p>
    </fieldset>
    <div class="z-formbuttons">
        <input type="hidden" name="avatar" value="{$avatar|safetext}" />
        <input type="submit" name="submit" value="{gt text="Delete"}" />
    </div>
</form>

{include file="Avatar_admin_footer.tpl"}

