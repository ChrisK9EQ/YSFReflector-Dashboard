<?php
?>
  <div class="panel panel-default">
  <!-- Standard-Panel-Inhalt -->
  <div class="panel-heading">Connected YSFGateways</div>
  <!-- Tabelle -->
  <div class="table-responsive"> 
  <table id="gateways" class="table table-condensed compact">
  	<thead>
    <tr>
      <th>Reporting Time (<?php echo TIMEZONE;?>)</th>
      <th>Callsign</th>
    </tr>
    </thead>
    <tbody>
<?php
	//$gateways = getConnectedGateways($logLines);
	$gateways = getLinkedGateways($logLines);
	foreach ($gateways as $gateway) {
		$gateCall = $gateway['callsign'];
		echo "<tr>";
		echo "<td>".convertTimezone($gateway['timestamp'])."</td>";
		echo "<td nowrap><a target=\"_blank\" href=\"https://qrz.com/db/$gateCall\">$gateCall</a></td>";
#		if (defined("GDPR"))
#			echo"<td nowrap>".str_replace("0","&Oslash;",substr($gateway['callsign'],0,3)."***")."</td>";
#		else
#			echo"<td nowrap>".str_replace("0","&Oslash;",$gateway['callsign'])."</td>";
		echo "</tr>";
	}
?>
  </tbody>
  </table>
  </div>
  <script>
    $(document).ready(function(){
      $('#gateways').dataTable( {
        "aaSorting": [[1,'asc']]
      } );
    });
   </script>
</div>
