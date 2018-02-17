<h1 class="ui header center aligned">
	<p><l>Server</l>
	<br><i>{addres}</i></p>
</h1>

<div class="ui three column grid">
	<div class="column">
		<div class="ui segment">
			<div class="ui divided list">
				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">IP</a>
						<div class="description">{ip}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Name</a>
						<div class="description">{name}</div>
					</div>
					</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Map</a>
						<div class="description">{map}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Mod</a>
						<div class="description">{mod}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Descriptor</a>
						<div class="description">{descriptor}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Players</a>
						<div class="description">{players} / {max_players}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Type</a>
						<div class="description">{type}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">OS</a>
						<div class="description">{os}</div>
					</div>
				</div>

				<div class="item">
					<i class="icon tint"></i>
					<div class="content">
						<a class="header">Bots</a>
						<div class="description">{bots}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="column center aligned">
		<img class="map_image" src="{img_map}">
	</div>
	<div class="column">
		<table class="ui selectable celled table">
			<thead>
				<tr>
					<th><b><l>User</l></b></th>
					<th><b><l>Frags</l></b></th>
					<th><b><l>Time</l></b></th>
				</tr>
			</thead>
			<tbody>
				{players_list}
				<tr>
					<td>{plr_name}</td>
					<td>{plr_frag}</td>
					<td>{plr_time}</td>
				</tr>
				{/players_list}
			</tbody>
		</table>
	</div>
</div>