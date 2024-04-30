<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fornecedor extends Model
{
    use HasFactory;
 
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site', 'uf', 'email'];
    public function scopeSearch(Builder $query, $request) {
        return $query->when($request->nome, function (Builder $query, string $nome) {
            return $query->where('nome', 'like', '%'.$nome.'%');
        })->when($request->site, function (Builder $query, string $site) {
            return $query->where('site', 'like', '%'.$site.'%');
        })->when($request->uf, function (Builder $query, string $uf) {
            return $query->where('uf', 'like', '%'.$uf.'%');
        })->when($request->email, function (Builder $query, string $email) {
            return $query->where('email', 'like', '%'.$email.'%');
        });
    }
}
