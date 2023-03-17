<?php

/**
 * 
 * home is a controller
 * 
 */

class Home extends FrameWork {
  /**
   * 
   * It checks if login page is present in the views
   * folder and if it is present then the page is embedded.
   * 
   * @return void
   */

  public function index() {
    $this->view('login');
  }

}
