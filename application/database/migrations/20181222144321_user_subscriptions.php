<?php

class Migration_user_subscriptions extends CI_Migration {

    
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'service_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'package_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'start_time' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=> ""
            ),
            'end_time' => array(
               'type' => 'VARCHAR',
                'constraint' => 60,
               'default'=> ""
            ),
            'trans_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 225,
                'default'=> "",
            ),
            'amount_paid' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default'=> "",
            ),
            'reminder1' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=> "",
            ),
            'reminder2' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=> "",
            ),
            'reminder3' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'default'=> "",
            ),
            'is_active' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default'=> "0",
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_subscriptions', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('user_subscriptions');
    }

}