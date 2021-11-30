<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Session implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        
        //validar si existe la sesion
        
        if(!session('usuario')!=null){
            return redirect()->to(base_url('Login'));
        }
        
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}