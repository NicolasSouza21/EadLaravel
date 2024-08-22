<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Authenticatable
{
    use HasFactory, Notifiable;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Atributos que devem ser ocultados para arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Especifique o nome da tabela
    protected $table = 'professores';

    // Atributos que devem ser convertidos para tipos de dados nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacionamento um-para-muitos com a classe Curso.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class, 'professor_id', 'id');
    }
}
