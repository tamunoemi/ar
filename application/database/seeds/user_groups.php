<?php

class user_groups extends Seeder {

    private $table = 'users_groups';

    public function run() {
        

        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 2; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'user_id' => $i,
                'group_id' => '2',
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
