<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Tracker extends Model
{
    protected $table = "torrent_hub";

    public function getPublishedTorrent($orderBy)
    {
        $row = Tracker::where('created_at','<=', Carbon::Now())->where('active', '=', '1')->orderBy($orderBy['table'],$orderBy['sort'])->paginate('9');
        return $row;
    }
    
    public function getShowedHub($id) {
        $row = DB::table('torrent_hub')->where('torrent_id', $id)->first();
        return $row;
    }

    public function getShowedTorrent($id) {
        $row = DB::table('torrent')->where('hub_id', $id)->get();
        return $row;
    }
}
