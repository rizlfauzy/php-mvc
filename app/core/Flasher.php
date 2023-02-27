<?php 

class Flasher{
  public static function setFlash($message, $color, $strong_text){
    $_SESSION['flash'] = [
      'message'=>$message,
      'color'=>$color,
      'strong_text'=>$strong_text
    ];
  }

  public static function flash(){
    if (isset($_SESSION['flash'])){
      echo '
      <div class="alert bg-'.$_SESSION['flash']['color'].'-100 rounded-lg lg:py-5 py-2 lg:px-6 px-3 mb-3 lg:text-md text-xs text-'.$_SESSION['flash']['color'].'-700 data-[te-alert-show]:inline-flex items-center w-full alert-dismissible fade show" role="alert" data-te-alert-init
      data-te-alert-show>
            <strong class="mr-1">'.$_SESSION['flash']['strong_text'].' </strong> '.$_SESSION['flash']['message'].'
            <button
              type="button"
              class="btn-close box-content p-1 ml-auto text-'.$_SESSION['flash']['color'].'-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-'.$_SESSION['flash']['color'].'-900 hover:opacity-75 hover:no-underline"
              data-te-alert-dismiss
              aria-label="Close"
            >
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
      ';
      unset($_SESSION['flash']);
    }
  }
}