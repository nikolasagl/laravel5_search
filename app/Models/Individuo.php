<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Individuo extends Model
{
  use SoftDeletes;

  protected $table = 'individuo';

  protected $fillable = array('nome', 'email', 'data_nascimento', 'cpf', 'created_at', 'updated_at', 'deleted_at', 'sexo_id');


}
