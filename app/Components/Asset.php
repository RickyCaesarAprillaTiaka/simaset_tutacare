<?php
namespace App\Components;
use App\Barang, App\User, App\Proyek, App\MaterialProyek, App\ScheduleProyek, App\ProgressProyek;
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

  public function proyekCount()
  {
    return Proyek::count();
  }

  public function materialProyekCount($id_proyek)
  {
    return MaterialProyek::where('id_proyek', $id_proyek)->count();
  }
  public function scheduleProyekCount($id_proyek)
  {
    return ScheduleProyek::where('id_proyek', $id_proyek)->count();
  }
  public function progressProyekCount($id_proyek)
  {
    return ProgressProyek::where('id_proyek', $id_proyek)->count();
  }
}
