<?php

class agents extends Seeder {

    private $table = 'agents';

    public function run() {
        $this->db->truncate($this->table);

        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'name' => $this->faker->unique()->name,
                'email' => $this->faker->email,
                'phone' => $this->faker->phoneNumber,
                'skype_id' => $this->faker->userName,
                'whatsapp_id' => $this->faker->userName,
                'wechat_number' => $this->faker->e164PhoneNumber,
                'image' => $this->faker->imageUrl(),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
