<?php

class Migration_commission extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'trans_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default'=>NULL
            ),
            'payable' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=>NULL
            ),
            'total_amt_earned' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=>NULL
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('commission', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('commission');
    }

}