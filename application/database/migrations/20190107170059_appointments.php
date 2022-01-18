<?php

class Migration_appointments extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'fullname' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'date' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
            'message' => array(
                'type' => 'TEXT',
            ),
            'created_at' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('appointments', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('appointments');
    }

}