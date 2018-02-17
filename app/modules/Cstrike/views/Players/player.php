<h1 class="ui header center aligned">
	<p><l>Player</l></p>
</h1>

<div class="ui centered card">
	<div class="image">
		<img src="{img_player}">
	</div>
	<div class="content">
		<a class="header">{name}</a>
		<div class="meta">
		<span class="date">
			<i class="flag {country_code}"></i> {country_name}
		</span>
		</div>
		<div class="description">
			<p><l>Steam ID</l>:
				<a href="http://steamcommunity.com/profiles/{steam_id_64}" target="_blank">{steam_id}</a>
			<p><l>ICQ</l>: {icq}
			<p><l>Our Last Time</l>: {lastTime}
			<p><l>Shared Online</l>: {onlineTimes}
		</div>
	</div>
	<div class="extra content">
		<p>
			<a href="{url_achievs_player}" title="<l>View</l>">
				Fulfilled achievements: {achievCompleted}
			</a>
		</p>
		<p>
			<a href="{url_kreedz_player}" title="<l>View</l>">
				Went KZ maps: {mapCompleted}
			</a>
		</p>
	</div>
</div>