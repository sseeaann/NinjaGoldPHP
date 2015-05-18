<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NinjaGold extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->session->userdata('gold'))
		{
			$this->session->set_userdata('gold', 0);
		}
		if(!$this->session->userdata('message'))
		{
			$this->session->set_userdata('message');
		}


		$data['YourGold'] = $this->session->userdata('gold');
		$data['YourMessage'] = $this->session->userdata('message');
		$this->load->view('ninja_gold',$data);
	}

	public function addGold()
	{
		$totalGold = $this->session->userdata('gold');
		if($this->input->post('action') == 'farm'){$foundGold = rand(10,20);}
		else if($this->input->post('action') == 'cave'){$foundGold = rand(5,10);}
		else if($this->input->post('action') == 'house'){$foundGold = rand(2,5);}
		else if($this->input->post('action') == 'casino')
			{
				if(rand(0,100) < 70)
					{$foundGold = rand(-$totalGold,0);}
				else
					{$foundGold = rand(0,$totalGold);}
			}
		else {$foundGold = 0;}

		$newGold = $totalGold + $foundGold;
		$this->session->set_userdata('gold', $newGold);
		
		if($foundGold >= 0)
		{
			$goldMessage = "<p>You entered the " . $this->input->post('action') . " and gained " . $foundGold . " gold!</p>" . $this->session->message;
		}
		else
		{
			$goldMessage = "<p id='lost'>You entered the " . $this->input->post('action') . " and lost " . abs($foundGold) . " gold!</p>". $this->session->message;
		}
		$this->session->set_userdata('message', $goldMessage);

		redirect('/');
	}

// if(isset($_POST['action']) && $_POST['action'] != 'casino')
// 	{
// 		if($_POST['action'] == 'farm'){ $gold = rand(10,20);}
// 		else if($_POST['action'] == 'cave'){ $gold = rand(5,10);}
// 		else if($_POST['action'] == 'house'){ $gold = rand(2,5);}
// 		else { $gold = 0;}
// 		$_SESSION['totalGold'] = $_SESSION['totalGold'] + $gold;
// 		$_SESSION['messages'] = "<p>You entered the " . $_POST['action'] . " and gained " . $gold . "!</p>" . $_SESSION['messages'];
// 	}
}
