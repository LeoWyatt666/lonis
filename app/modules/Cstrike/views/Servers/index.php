<h1 class="ui header center aligned">
	<p><l>Monitoring</l> {if {total}}<span class="ui label">{total}</span>{/if} </p>
</h1>

<table class="ui selectable celled table">
	<thead>
		<tr>
			<th><l>Name</l></th>
			<th><l>Type</l></th>
			<th><l>IP</l></th>
			<th><l>Map</l></th>
			<th><l>users</l></th>
			<th><l>Time</l></th>
		</tr>
	</thead>
	<tbody class="pagination-feed">
		{servers}
		<tr class="pagination-item">
			<td>{if {vip}}<i class="icon star" style="color: gold;" title="VIP" /></i>{/if}
				{name}</td>
			<td>{modname}</td>
			<td><a href="{url_addres}"><b>{addres}</b></a></td>
			<td>{map}</td>
			<td>{if {max_players}} {players} / {max_players} {/if}</td>
			<td><i>{update}</i></td>
		</tr>
		{/servers}
	</tbody>
</table>

{PAGINATION_LINKS}