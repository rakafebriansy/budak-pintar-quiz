<?php

class Create extends Controller{
    public function index(){
        $data['judul'] = 'CREATE';
        $data['folder'] = 'create';
        $this->view('templates/header',$data);
        $this->view('create/index');
        $this->view('templates/footer',$data);
    }
    public function createQuiz(){
        var_dump($_POST);die;
    }
}

?>