<?php 
require_once '/home/content/11/11521611/html/BaseballStatisticsProject/Database/MySQL_Functions.php';


function init(){
	$a = new MySQL_Functions();
	$BaseballPlayers = array();
	$BaseballPlayers = $a->GetBaseballPlayers();
	$BaseballPlayersJson = json_encode($BaseballPlayers);
	
	print('<table>');
	foreach($BaseballPlayers as $key => $value)
	{
		print('<tr>');
		print('<td>' . $key . '</td>' . '<td>' . "--------------------------------------" . '</td>');
		print('</tr><tr><td></td>');
		print('<td><table>');
		foreach($value as $k => $v)
		{
			print('<tr>');
			print('<td>' . $k . " ==> " . $v . '</td>');
			print('</tr>');
		}
		print('</table></td>');
		print('</tr>');
	}
	print('</table>');
}

init();