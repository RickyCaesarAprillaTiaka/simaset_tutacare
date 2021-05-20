<?php
namespace App\Components;
use App\Barang, App\User;
use DB;

class Asset {

  public function assetCount()
  {
    return Barang::count();
  }

  public function userCount()
  {
    return User::count();
  }

}
