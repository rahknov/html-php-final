<?php
class Controller
{
	public $model=null;

	function __construct()
	{		
		require_once('model/model.php');
		$this->model=new Model();
	}
	
	public function getPage()
	{		
		$command=null;

		
		if(isset($_REQUEST['command']))
			$command=$_REQUEST['command'];
		


		switch($command)	
		{
			case 0:
			{
				include_once('view/home.php');
				break;
			}
			case 1:
			{
				include_once('view/gallery.php');
				break;
			}
			case 2:
			{
				include_once('view/about-us.php');
				break;
			}
			case 'viewBooks':
				{
					$books=$this->model->getBookList();	
					include 'view/viewbooklist2.php';
					// include 'view/pagination.php';
					break;
				}
			case 'viewDogs':
				{	
				$breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : null;
				$dogs = $this->model->getDogsByBreed($breed);
				include 'view/viewdoglist.php';  
				break;		
				}
		}
	}
}
