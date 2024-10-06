<?php
class Model
{
	public $db=null;
	function __construct()
	{
		try
		{
			$this->db = new mysqli('localhost', 'root', '', 'dogs');
		}
		catch(mysqli_sql_exception $e)
		{
			exit('Database connection could not be established.');
		}
	}

		public function getBookList() 
	    {
	        $data = array();

			$queryGetBooks = mysqli_query($this->db,"SELECT * from tblbooks");

			while($getRow=mysqli_fetch_object($queryGetBooks))    		
			{    			
			  $data[] = $getRow; // add the row in to the results (data) array
			}
			return $data;     
	    }

		public function getDogList()
	{
		$data = array();

		$queryGetDogs = mysqli_query($this->db,"SELECT * from dog_records");

		while($getRow = mysqli_fetch_object($queryGetDogs))    		
		{    			
			$data[] = $getRow;  // add the row to the results (data) array
		}
		return $data;     
	}

	public function getDogsByBreed($breed = null)
	{
		$data = array();

		if($breed) {
			$queryGetDogs = mysqli_query($this->db, "SELECT * FROM dog_records WHERE dog_breed = '$breed'");
		} else {
			$queryGetDogs = mysqli_query($this->db, "SELECT * FROM dog_records");
		}

		while($getRow = mysqli_fetch_object($queryGetDogs)) {
			$data[] = $getRow; // Add the row to the results (data) array
		}
		return $data;
	}
}
