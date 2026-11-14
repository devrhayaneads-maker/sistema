<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

// Cria a tabela Conteudo (a mesma do arquivo banco.sql).
// Se a tabela já existir no banco, não faz nada e não apaga os dados.
class CriarTabelaConteudo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'Titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'Texto' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('Id', true);

        // true = só cria se ainda não existir
        $this->forge->createTable('Conteudo', true);
    }

    public function down()
    {
        // Não apaga a tabela para não perder os conteúdos já cadastrados
    }
}
