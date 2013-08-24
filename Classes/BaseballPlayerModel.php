<?php
    phpinfo();
	
	class BaseballPlayerModel
	{
		private $id;
		private $name_First;
		private $name_Last;
		private $team;
		private $number;
		private $Statistics;
		
		public function __construct($id, $name_First, $name_Last, $team, $number)
		{
			$this->id = $id;
			$this->name_First = $name_First;
			$this->name_Last = $name_Last;
			$this->team = $team;
			$this->number = $number;
		}	
		public function __destruct ()
		{
			print("Destroying Application object...\n");
		}	
		public function GetId()
		{
			return $this->id;
		}	
		public function GetName()
		{
			return $this->name;
		}	
		public function GetTeam()
		{
			return $this->team;
		}	
		public function GetNumber()
		{
			return $this->number;
		}
		public function SetName($name)
		{
			$this->name = $name;
		}
		public function SetTeam($team)
		{
			$this->team = $team;
		}
		public function SetNumber($number)
		{
			$this->number = $number;
		}
		public function PrintClass()
		{
			echo "*************************************\n
				  ********** Baseball Player **********\n";
			echo "* id : $this->id";
			echo "* Name : $this->name";
			echo "* Team : $this->team;";
			echo "* Number : $this->number";
			echo "*************************************\n
				  *************************************\n\n";
		}
	} 
?>