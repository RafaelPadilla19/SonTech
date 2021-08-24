<?php

namespace App\Controllers;



class Home extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('contenido');
		echo view('templates/footer');
		
	}
}
