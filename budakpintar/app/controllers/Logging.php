<?php

class Logging extends Controller{
    public function index(){
        $data['judul'] = 'SIGN IN';

        $this->view('templates/log-header',$data);
        $this->view('logging/index',$data);
        $this->view('templates/log-footer');
    }
    public function signUp(){
        $data['judul'] = 'SIGN UP';

        $this->view('templates/log-header',$data);
        $this->view('logging/signup',$data);
        $this->view('templates/log-footer');
    }
}

?>