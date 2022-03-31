<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desejo extends Model
{
    use HasFactory;

    protected $fillable = [
        'desejo',
        'descricao',
        'dataPretendida',
        'usuario_id'
    ];

    protected $dates = ['dataPretendida'];

    public function usuario(){
        return $this->BelongsTo(Usuario::class);
    }
}
