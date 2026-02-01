<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDosenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nidn' => [ // Nomor Induk Dosen Nasional
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gelar' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'mata_kuliah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        $this->forge->dropTable('dosen');
    }
}