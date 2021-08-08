<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = "Home | theestate";
		$data['view_page'] = 'owner_dashboard';
		$this->load->view('site', $data);
	}

	public function owner_create()
	{
		$data['title'] = "Create | theestate";
		$data['view_page'] = 'owner_create';
		$this->load->view('site', $data);
	}
	
	public function owner_listing()
	{
		$data['title'] = "Listings | theestate";
		$data['view_page'] = 'owner_listing';
		$this->load->view('site', $data);
	}

	public function owner_rentals()
	{
		$data['title'] = "Rentals | theestate";
		$data['view_page'] = 'owner_rentals';
		$this->load->view('site', $data);
	}

	public function owner_settings()
	{
		$data['title'] = "Settings | theestate";
		$data['view_page'] = 'owner_settings';
		$this->load->view('site', $data);
	}
}
