<?php

namespace App\Controllers;



class Home extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('templates/menu');
		echo view('forms/home/index_view');
		echo view('templates/footer');
		
	}
}
