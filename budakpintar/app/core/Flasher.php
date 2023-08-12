<?php

class Flasher{
    public static function setFlash($flash_awal,$flash_strong,$flash_akhir,$type){
        $_SESSION['flash'] = ['flash_awal'=>$flash_awal,'flash_strong'=>$flash_strong,'flash_akhir'=>$flash_akhir,'type'=>$type];
    }
    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">'
                . $_SESSION['flash']['flash_awal'] . '<strong> ' . $_SESSION['flash']['flash_strong'] . '</strong> ' . $_SESSION['flash']['flash_akhir'] 
                . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"></span>
            </button>
          </div>';
        unset($_SESSION['flash']);
        }
    }
}