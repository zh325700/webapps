<table>
  <tr>
    <th>Time</th>
    <th>Event</th>
    <th>Description</th>
    <th>Participate or no</th>
  </tr>
<?php
foreach($events as $event)
{
	echo '<tr>';
		echo '<td>';
			echo $event['Time'];
		echo '</td>';
		echo '<td>';
			echo $event['Title'];
		echo '</td>';
		echo '<td>';
			echo $event['Description'];
		echo '</td>';
		echo '<td>';
			echo $event['ID_Activity'];
		echo '</td>';
	echo '</tr>';
}
?>
</table>
