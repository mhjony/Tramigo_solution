<?php
class Report{
	private $id;
	private $deviceId;
	private $location;
	private $dateCreated;

	function __construct($id, $deviceId, $location, $dateCreated) {
		$this->id = $id;
		$this->deviceId = $deviceId;
		$this->location = $location;
		$this->dateCreated = $dateCreated;
	}

	function reports_list($reports)
	{
		$arr = array();
		$dateCreated = new DateTime("2020-01-01");
		foreach ($reports as $report)
		{
            $originalDate = $report["dateCreated"];
			$formatted_date = date("Y-m-d", strtotime($originalDate));
            $report_date = new DateTime($formatted_date);
			if ($report_date >= $dateCreated)
			{
				array_push($arr, $report);
			}
		}
		return ($arr);
	}
    
    function maxdate_report($reports)
	{
		$arr = array();
		foreach ($reports as $report)
		{
			$originalDate = $report["dateCreated"];
            $formatted_date = date("Y-m-d", strtotime($originalDate));
			array_push($arr, $formatted_date);
		}
		$i = 0 ;
        $count = 0;
        $max = 0;
        while ($i < count($arr))
        {
        	$counts = array_count_values($arr);
			$count = $counts[$arr[$i]];
            if ($count > $max)
            {
            	$max = $count;
                $maxDate = $arr[$i];
            }
            $i++;
        }
        $max_arr = array();
        $date1 = new DateTime($maxDate);
        foreach($reports as $rep)
        {
        	$dateCreated = $rep["dateCreated"];
            $formatted_date = date("Y-m-d", strtotime($dateCreated));
            $date2 = new DateTime($formatted_date);
            if ($date1 == $date2)
			{
				array_push($max_arr, $rep);
			}
        }
		return ($max_arr);
	}
}

$reports = array (
  array("id"=>"1","deviceId"=>223,"location"=>"Helsinki","dateCreated"=>"2020-01-01"),
  array("id"=>"2","deviceId"=>223,"location"=>"Oulu","dateCreated"=>"2020-01-01"),
  array("id"=>"3","deviceId"=>223,"location"=>"Tampere","dateCreated"=>"2019-01-01"),
  array("id"=>"4","deviceId"=>223,"location"=>"Salo","dateCreated"=>"2019-12-01"),
  array("id"=>"5","deviceId"=>223,"location"=>"Turku","dateCreated"=>"2020-05-01"),
);

$Report = new Report(1, 223, "Helsinki", "567");
print_r($Report->reports_list($reports));
//print_r($Report->maxdate_report($reports));
?>

