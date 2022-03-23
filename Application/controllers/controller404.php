<?php
class controller404 extends controller {
  public function index() {
      helper::redirect(SITE_URL."/main/");
  }
}