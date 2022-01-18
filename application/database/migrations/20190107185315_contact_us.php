<?php

class Migration_contact_us extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'contact_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'contact_email' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'contact_subject' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'message' => array(
                'type' => 'TEXT',
                'constraint' => 60,
                'default' => NULL
            ),
            'created_at' => array(
                'type' => 'TEXT',
                'constraint' => 60,
                'default' => NULL
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('contact_us', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('contact_us');
    }

}