<?php

namespace controllers;

use helpers\View;

class VendaController
{
  public function index() {
    View::render("vendas/vendas.php");
  }
}