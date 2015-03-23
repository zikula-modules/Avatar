{include file="Avatar_admin_menu.tpl"}
<h2>{gt text="Selected avatar"}</h2>

{if $uavatar eq '' || $uavatar eq 'blank.gif'}
<h3>{gt text="Users who don't use a avatar"}</h3>
{else}
<p><img class="avatarchoosen" src="{getbaseurl}{$avatarpath|safetext}/{$uavatar|safetext}" alt="Avatar" /></p>
<h3>{gt text="Users who use this avatar"}</h3>
{/if}

{if $users}
<form id="perpageform" class="z-form z-linear av_box" method="post" action="{modurl modname="Avatar" type="admin" func="listusers" avatar=$uavatar}">
    <fieldset>
        <input type="hidden" name="page" value="1" />
        <label for="perpage">{gt text="Select the number of avatars to be displayed per page"}:</label>&nbsp;
        <select id="perpage" name="perpage">
            <option value="10"  {if $perpage eq 10}selected="selected"{/if}>10</option>
            <option value="20"  {if $perpage eq 20}selected="selected"{/if}>20</option>
            <option value="50"  {if $perpage eq 50}selected="selected"{/if}>50</option>
            <option value="100" {if $perpage eq 100}selected="selected"{/if}>100</option>
            <option value="-1"  {if $perpage eq -1}selected="selected"{/if}>{gt text="All"}</option>
        </select>
        &nbsp;<input type="submit" name="submit" value="{gt text="Submit"}" />
    </fieldset>
</form>
{/if}

<form class="z-form av_box" action="{modurl modname="Avatar" type="admin" func="updateusers"}" method="post">
    <ul class="av_userlist">
        {foreach item=user from=$users key=uid}
        <li>
            <input type="checkbox" name="updateusers[]" value="{$uid}" /> {$user|userprofilelink}
            <a href="{modurl modname="Avatar" type="admin" func="searchusers" username=$user|safetext}">{img modname='core' set='icons/extrasmall' src="xedit.gif" __title="Select new avatar" __alt="Select new avatar"}</a>
        </li>
        {foreachelse}
        <li><strong>{gt text="No user is using this avatar."}</strong></li>
        {/foreach}
    </ul>

    {if $users}
    <h3>{gt text="Choose the avatar to update all selected users"}</h3>
    <div class="z-clearfix">
        {foreach from=$avatars item="avatar"}
        <div class="avatarbox">
            <button type="submit" name="avatar" value="{$avatar|safetext}">
                <strong class="avatarpic" style="width:{$core.Avatar.maxheight+20}px; height:{$core.Avatar.maxwidth+20}px; background:url({getbaseurl}{$avatarpath|safetext}/{$avatar|safetext}) no-repeat scroll center; ">&nbsp;</strong>
                <span class="z-sub">{$avatar|safetext|truncate:15}</span>
            </button>
        </div>
        {/foreach}
    </div>
    {pager rowcount=$allavatarscount limit=$perpage posvar="page" display="page" perpage=$perpage}
    {/if}
</form>

{include file="Avatar_admin_footer.tpl"}
