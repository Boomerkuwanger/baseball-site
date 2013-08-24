<?php
define("MAXROWS", 1000);
class MySQL_Controller
{ 
    private $dsn;
    private $user;
    private $password;
    private $handler;
    
	public function __construct()
	{
		$a_iniConfig = parse_ini_file("/home/content/11/11521611/html/BaseballStatisticsProject/config.ini", true);
        $this->dsn = $a_iniConfig['Database']['__DSN__'];
        $this->user = $a_iniConfig['Database']['__USER_NAME__'];
        $this->password = $a_iniConfig['Database']['__PASSWORD__'];
        $this->handler = new PDO($this->dsn, $this->user, $this->password);   
    }
    
    public function executeAction($sql, $aParams=null) 
    {
        $query = $this->handler->prepare($sql);
        if(isset($aParams))
        {
            foreach($aParams as $key => &$value) 
            {
                $query->bindParam($key + 1, $value);
            }
        }
        $query->execute();
    }
    /*
    public function executeQuery($sql, $aParams=null) 
    {
        $query = $this->handler->prepare($sql);
        if(isset($aParams)) 
        {
            foreach($aParams as $key => &$value) 
            {
                $query->bindParam($key + 1, $value);
            }
        }

        $query->execute();
        $aResult = $this->convertKeys($query->fetchAll());
        return $aResult;
    }
	 */
	
    public function executeQuery($sql, $aParams=null) 
    {
        $query = $this->handler->prepare($sql);
        if(isset($aParams)) 
        {
            foreach($aParams as $key => &$value) 
            {
                $query->bindParam($key + 1, $value);
            }
        }

        $query->execute();
		print('<p>' . "The row count = " . $query->rowCount()."\n");
		if($query->rowCount() >= MAXROWS)
		{
			$aResult = array();
			print('<p>' . "Executing Query forloop\n");
			print('<p>' . "Memory Usage : " . memory_get_usage(true) . " Bytes\n");
			for($i = 0; $i < MAXROWS; $i++)
			{
				$aResult[] = $this->convertKeys($query->fetchObject());
			}
		} else {
			$aResult = $this->convertKeys($query->fetchAll());
		}
        return $aResult;
    }
	
    private function convertKeys($aResult) {
        $aFinalResult = array();
		if(is_array($aResult))
		{
	        foreach($aResult as $rows) 
	        {
	            $finalResult = array();
	            foreach($rows as $key => $value) 
	            {
	                $newKey = str_replace("_", "", $key);
	                $newKey = strtolower($newKey);
	                $finalResult[$newKey] = $value;
	            }
	            $aFinalResult[] = $finalResult;
	        }
			return $aFinalResult;
		} else {
			$finalResult = array();
            foreach($aResult as $key => $value) 
            {
                $newKey = str_replace("_", "", $key);
                $newKey = strtolower($newKey);
                $finalResult[$newKey] = $value;
            }
			return $finalResult;
		}
    }  
}
?>