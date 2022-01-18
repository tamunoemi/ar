<?php

class ads extends Seeder {

    private $table = 'ads';

    public function run() {
        $this->db->truncate($this->table);
        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'product_id' => $this->faker->numberBetween(1,50),
                'headline' => $this->faker->sentence(10,FALSE),
                'body' => $this->faker->text,
                'image' => $this->faker->imageUrl,
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
