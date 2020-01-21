

<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Pullout_approval extends  CI_Controller {

	public function loadMain(){
		$this->load->view("a_pages/pullout_approval/pullout_approval_main");	
	}

// for Approval
	public function loadApprovedSetlist(){
		$this->load->view("a_pages/pullout_approval/pullout_approved_setlist");	
	}

	public function loadApprovedView(){
		$this->load->view("a_pages/pullout_approval/pullout_approved_view");	
	}

	public function loadApprovalSave(){
		$this->load->view("a_pages/pullout_approval/pullout_approval_process_save");	
	}


// Pending
	public function loadPendingSetlist(){
		$this->load->view("a_pages/pullout_approval/pullout_request_pending_setlist");	
	}

	public function loadPendingTbl(){
		$this->load->view("a_pages/pullout_approval/pullout_request_pending_tbl");	
	}

	public function loadPendingView(){
		$this->load->view("a_pages/pullout_approval/pullout_request_pending_view");	
	}

	
// Disapproved
	public function loadDisapprovalSave(){
		$this->load->view("a_pages/pullout_approval/pullout_disapproval_process_save");	
	}
	public function loadDisapprovedSetlist(){
		$this->load->view("a_pages/pullout_approval/pullout_disapproved_setlist");	
	}

	public function loadDisapprovedView(){
		$this->load->view("a_pages/pullout_approval/pullout_disapproved_view");	
	}



}

