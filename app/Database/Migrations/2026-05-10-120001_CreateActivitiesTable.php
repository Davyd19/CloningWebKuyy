<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'    => ['type' => 'TEXT', 'null' => true],
            'category_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'location_name'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'activity_date'  => ['type' => 'DATETIME'],
            'image_url'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'attendees_count'=> ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'max_attendees'  => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'author_name'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'author_avatar'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('activities');
    }

    public function down()
    {
        $this->forge->dropTable('activities');
    }
}
