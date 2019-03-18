<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Individuo;

/**
 *
 */
class HomeController extends Controller
{

  function index()
  {
    $data = array(
      'individuos' => Individuo::withTrashed()->paginate(20)
    );

    // return get_class_methods($data['individuos']);

    return view('welcome', array('data'=>$data['individuos']));
  }
}
