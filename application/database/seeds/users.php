<?php

class users extends Seeder {

    private $table = 'users';

    public function run() {



        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 2; $i < $limit; $i++) {
            echo ".";

            $data = array(
            'id'=> $i,
            'ip_address' => $this->faker->ipv4,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'salt' => $this->faker->md5,
            'email' => $this->faker->email,
            'activation_code' => $this->faker->ean8,
            'forgotten_password_code' => $this->faker->ean8,
            'created_on' => time(),
            'last_login' => time(),
            'active' => '1',
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
        );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
