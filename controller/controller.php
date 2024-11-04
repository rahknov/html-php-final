<?php
class Controller
{
    public $model = null;

    function __construct()
    {
        require_once('model/model.php');
        $this->model = new Model();
    }

    public function getPage()
    {
        $command = null;

        if (isset($_REQUEST['command']))
            $command = $_REQUEST['command'];

        switch ($command) {
            case 0:
                include_once('view/home.php');
                break;
            case 1:
                // Fetch the dog records for the gallery
                $dogs = $this->model->getDogList();
                include_once('view/gallery.php');  // Load the gallery view
                break;
            case 2:
                include_once('view/about-us.php');
                break;
            case 'viewBooks':
                {
                    $books = $this->model->getBookList();
                    include 'view/viewbooklist2.php';
                    break;
                }
            case 'viewDogs':
                {
                    $breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : null;
                    $dogs = $this->model->getDogsByBreed($breed);
                    include 'view/viewdoglist.php';
                    break;
                }
            case 'viewSpecific':
                {
                    // Get the dog name from the URL parameters
                    $dog_name = isset($_REQUEST['dog_name']) ? $_REQUEST['dog_name'] : null;

                    // Fetch the specific dog's details using the model
                    $dog = $this->model->fetchDogByName($dog_name);

                    // Load the specific view for displaying the dog's details
                    include 'view/viewdogdetails.php';
                    break;
                }
            case 'deleteRec':
                {
                    $isbn=$_REQUEST['ISBN'];	
        
                    $result=$this->model->deleteRecord($isbn);
                    // redirect your page to viewbook
                    echo "<script> alert ('".$result."')
                            window.location.href='index.php?command=viewBook'
                            </script>";						
                            break;
                }
                case 'deleteDog':
                    $dog_name = $_REQUEST['dog_name'];
                    $result = $this->model->deleteDog($dog_name);
                    $message = $result ? "Dog deleted successfully." : "Error deleting dog.";
                    echo "<script>alert('$message'); window.location.href='index.php?command=viewDogs';</script>";
                    break;
                
                case 'editDog':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $dog_name = $_POST['dog_name'];
                        $breed = $_POST['breed'];
                        $age = $_POST['age'];
                        $weight = $_POST['weight'];
                        $owner_name = $_POST['owner_name'];
                        $owner_phone = $_POST['owner_phone'];
                        $vaccination_status = $_POST['vaccination_status'];
                
                        $result = $this->model->updateDog($dog_name, $breed, $age, $weight, $owner_name, $owner_phone, $vaccination_status);
                        $message = $result ? "Dog details updated successfully." : "Error updating dog details.";
                        echo "<script>alert('$message'); window.location.href='index.php?command=viewSpecific&dog_name=" . urlencode($dog_name) . "';</script>";
                    } else {
                        $dog_name = $_REQUEST['dog_name'];
                        $dog = $this->model->fetchDogByName($dog_name);
                        include 'view/editdogdetails.php';
                    }
                    break;
        }
    }
}
?>
