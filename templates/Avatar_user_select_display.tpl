<div class="z-clearfix">
    {foreach from=$avatars item="avatar"}
    <div class="avatarbox">
        <a href="{modurl modname="Avatar" type="user" func="setavatar" user_avatar=$avatar|safetext}">
            <strong class="avatarpic" style="width:{$coredata.Avatar.maxheight+20}px; height:{$coredata.Avatar.maxwidth+20}px; background: url({$baseurl}{$avatarpath|safetext}/{$avatar|safetext}) no-repeat scroll center; ">&nbsp;</strong>
        </a>
        <a class="z-sub" href="{modurl modname="Avatar" type="user" func="setavatar" user_avatar=$avatar|safetext}">{$avatar|safetext|truncate:15}</a>
    </div>
    {/foreach}
</div>
