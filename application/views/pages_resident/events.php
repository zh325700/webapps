<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

<table>
  <tr>
    <th>Time</th>
    <th>Event</th>
    <th>Description</th>
    <th>Participate or no</th>
    <th>already participates?</th>
  </tr>
<?php
foreach($events as $event)
{
	if (htmlentities($event['participates']) == '1'){
		echo '<tr bgcolor="lightgreen">';
	} else {
		echo '<tr bgcolor="red">';
	}
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
			$link = '<a href="';
			$link = $link . base_url();
			$link = $link . "index.php/CaregiverOperateActivity/ActivityList/";
			$link = $link . $event['ID_Activity'];
			$link = $link . '">Participate</a>';
			echo $link;
		echo '</td>';
		echo '<td>';
			echo $event['participates'];
		echo '</td>';
	echo '</tr>';
}
?>
</table>


<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
