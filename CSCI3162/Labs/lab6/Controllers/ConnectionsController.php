<?php

namespace RESTQL\Http\Controllers;

use Validator;
use Config;

use Illuminate\Http\Request;

use RESTQL\Models\Connection;

class ConnectionsController extends Controller {

  public function list() {
    $conns = Connection::all();
    return view('dataconnect', ['connections' => $conns]);
  }

  public function add_page() {
    return view('connections.add');
  }

  public function add(Request $request) {
    $drivers = ['postgresql', 'sqlite', 'mysql'];
    $drivers = implode(',', $drivers);

    $validator = Validator::make($request->all(),[
      'name' => 'required|unique:connections',
      'hostname' => 'required',
      'port' => 'integer|required',
      'database' => 'required',
      'driver' => "required|in:$drivers",
      'username' => 'required',
    ]);
    if ($validator->fails()) {
      return redirect('connections/add')
                        ->withErrors($validator)
                        ->withInput();
    }

    $i = $request->all();
    $conn = new Connection;
    unset($i['_token']);
    foreach ($i as $k => $v) {
      if ($k == 'password') {
        $conn->$k = encrypt($v);
        continue;
      }
      $conn->$k = $v;
    }
    $conn->save();

    return redirect('connections');
  }

}
