<?php

class Migration_investor_form extends CI_Migration {

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
            'client_category' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
           
            'purpose' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default' => NULL
            ),
            
            'location' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
            'investment_time' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'default' => NULL
            ),
            'challenges' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'default' => NULL
            ),
            'budgets' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
            
            'created_at' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default' => NULL
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('investor_form', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('investor_form');
    }

}