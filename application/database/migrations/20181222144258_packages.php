<?php

class Migration_packages extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            'cost' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => NULL
            ),
            'billing_cycle' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('packages', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('packages');
    }

}