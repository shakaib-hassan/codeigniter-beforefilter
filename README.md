The basic idea behind creating this was there are many frameworks which provide before filter on controller class to perform logic like is user logged in then do this otherwise do some other stuff.

I have extended the CI controller to MY_Controller class which CI provides itself. The usage is very simple just place the <strong>MY_Controller.php</strong> and extend your controller by 'MY_Controller'. 

In the constructor of your controller if you want to apply filter to a particular methods simply pass an array to constructor.e.g

<code>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct() {
        parent::__construct(array("dashboard,home"));
    }

	public function index()
	{
		// list all users
	}
	
	public function dashboard()
	{
	  // show dashboard to a logged in user
	}
	
	public function home(){
	  $this->load->view("home");
	} 
}
</code>

If you dont pass array in the constructor it will assume you want to apply filter on all the methods of a controller. I have used show_error() method in the MY_Controller.php just to give an idea its working, you can comment it out and build your own logic there. 
