<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aluno extends Authenticatable
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

    // Atributos que devem ser convertidos para tipos de dados nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacionamento muitos-para-muitos com a classe Curso.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'aluno_curso', 'aluno_id', 'curso_id');
    }
}
