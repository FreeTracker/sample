<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tracker;

class TrackerController extends Controller
{
    /**
     * Главная страница треккера
     */
    public function index(Tracker $trackerModel)
    {
        $row = $trackerModel->getPublishedTorrent(['table' =>'created_at','sort' => 'desc']);
        return view('tracker.index', ['torrents' => $row]);
    }
    /**
     * Популярные публикации треккера
     */
    public function popular(Tracker $trackerModel)
    {
        $row = $trackerModel->getPublishedTorrent(['table' =>'view','sort' => 'desc']);
        return view('tracker.popular', ['torrents' => $row]);
    }
    /**
     * Создание побликации
     *
     * @return Response
     */
    public function create()
    {
        return view('tracker.create');
    }
    /**
     * Создание побликации
     *
     * @return Response
     */
    public function show($id, Tracker $trackerModel)
    {
        $show = $trackerModel->getShowedHub($id);
        $torrent = $trackerModel->getShowedTorrent($id);
        return view('tracker.show', ['show' => $show, 'torrent' => $torrent]);
    }
}


