<?php

namespace app\http;


class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        if(isset($_SESSION['userId']))
        {
            $this->redirect('profile.php');
        }else{
	        $this->render('index');
	    }
    }
}
