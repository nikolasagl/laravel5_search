<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Individuo;
use Illuminate\Support\Facades\Request;

/**
 *
 */
class HomeController extends Controller
{

  public function index()
  {
    $data = array(
      'individuos' => Individuo::withTrashed()->paginate(20)
    );

    return view('welcome', array('data'=>$data['individuos']));
  }

  public function search()
  {
    $data = Request::all();

    try {
      if (array_key_exists('nome', $data) && !empty($data['nome'])) {
        $result = Individuo::withTrashed()->where('nome', 'LIKE', '%'.$data['nome'].'%')->paginate(20);

        return view('table', array('data' => $result));
      }

      if (array_key_exists('data_inicio', $data) && !empty($data['data_inicio'])) {
        $result = Individuo::withTrashed()->where('data_nascimento', '>=', Self::dateToMySQL($data['data_inicio']))->paginate(20);

        return view('table', array('data' => $result));
      }

      if (array_key_exists('data_fim', $data) && !empty($data['data_fim'])) {
        $result = Individuo::withTrashed()->where('data_nascimento', '<=', Self::dateToMySQL($data['data_fim']))->paginate(20);

        return view('table', array('data' => $result));
      }
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }

  public static function dateToMySQL($date) {
    $result = date("Y-m-d",strtotime(str_replace('/','-', $date)));

    return $result;
  }
}
