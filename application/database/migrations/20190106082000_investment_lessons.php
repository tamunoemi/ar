<?php

class Migration_investment_lessons extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 225
            ),
            'youtubeid' => array(
                'type' => 'VARCHAR',
                'constraint' => 60
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('investment_lessons', TRUE);
    }

    public function down() {
        $this->dbforge->drop_table('investment_lessons');
    }

}