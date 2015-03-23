{pagesetvar name="title" value=$templatetitle}
<div id="avatar">
    <h2>{gt text="Avatar Management"}</h2>

    {modulelinks modname='Avatar' type='user'}

    {insert name="getstatusmsg"}

    <div class="z-center">
        <p>
            {if $current_avatar neq ''}
            <strong>{gt text="Your current avatar is:"}</strong><br />
            {useravatar uid=$coredata.user.uid class="avatarchoosen"}
            {else}
            <strong>{gt text="Currently no avatar selected"}</strong>
            {/if}
        </p>
    </div>