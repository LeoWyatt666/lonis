<h1 class="ui header">
	<l>Players</l> {if {total}}<span class="ui label">{total}</span>{/if}
</h1>

<div class="ui container right aligned">
	{form_open(,'class="ui form" method="get"')}
	<div class="ui search">
		<div class="ui left icon input">
			<i class="search icon"></i>
			<input type="search" class="prompt" placeholder="Search..." 
				name="q" value="{set_value(q)}" autocomplete="off">
		</div>
	</div>
	{form_close()}
</div>

<div class="ui divider"></div>

<div class="ui link five doubling cards pagination-feed">
	{players}
	<a class="card pagination-item" href="{url_player}">
		<div class="image">
			<img class="" src="{url_avatar}" title="{name}" oncontextmenu="return false;">
		</div>
		<div class="content">
			<span class="description">{name}</span>
			<p><i class="flag {country_code}" title="{country_name}" alt=""></i>
				{country_name}
		</div>
	</a>
	{/players}
</div>

{PAGINATION_LINKS}