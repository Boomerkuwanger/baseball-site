<?php
require_once '/home/content/11/11521611/html/BaseballStatisticsProject/Database/MySQL_Controller.php';
require_once '/home/content/11/11521611/html/BaseballStatisticsProject/Database/IDatabase_Functions.php';

class MySQL_Functions implements IDatabase_Functions {
	private static $DatabaseController;
	
	private static function GetDatabase()
	{
		if(!isset(self::$DatabaseController))
		{
			self::$DatabaseController = new MySQL_Controller();
		}
		return self::$DatabaseController;	
	}
	
	public static function GetBaseballPlayers()
	{
		$sql = "SELECT * FROM master";
        $aParams = array();
        $aActivities = self::GetDatabase()->executeQuery($sql, $aParams);
        return $aActivities;
	}
	
	public static function GetBaseballPlayer($id)
	{
		$sql = "SELECT * FROM master WHERE lahmanID=?";
		$aParams = array();
		$aParams[] = $id;
        $aActivities = self::GetDatabase()->executeQuery($sql, $aParams);
        return $aActivities;
	}
}
