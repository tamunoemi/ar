<?php

class Migration_sub_packages extends CI_Migration {

    public function up() {
       
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'package_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'service_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 225
            ),
            'discount' => array(
                'type' => 'VARCHAR',
                'constraint' => 9,
                'dafault'=>'free'
            ),
            'other' => array(
                'type' => 'TEXT',
                'dafault'=>NULL
            ),
           
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('sub_packages', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('sub_packages');
    }

}