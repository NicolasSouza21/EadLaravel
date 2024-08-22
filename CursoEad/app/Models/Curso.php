<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Define a tabela associada ao modelo
    protected $table = 'cursos';

    // Defina os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio',
        'data_fim',
        'preco',
        'professor_id', // Inclua o campo professor_id
    ];

    // Relacionamento: Um curso pode ter muitos alunos.
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_curso');
    }

    // Relacionamento: Um curso pertence a um professor.
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }
    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
    ];

}
