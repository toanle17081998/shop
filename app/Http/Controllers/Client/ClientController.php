<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Client\ClientSevice;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $clientSevice;

    public function __construct(ClientSevice $clientSevice){
        $this->clientSevice = $clientSevice;
    }
    public function index(){
        return view('Client.index',[
            'title' => 'Shop quần áo Văn Toàn',
            'listSliders'=> $this->clientSevice->slider(),
            'listMenuParents'=> $this->clientSevice->menuParent(),
            'listProducts' => $this->clientSevice->product(),
            'listAllMenus'=> $this->clientSevice->menuAll(),
        ]);
    }
}
