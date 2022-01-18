<?php

class adcreative extends Seeder {

    private $table = 'adcreative';

    public function run() {
        $this->db->truncate($this->table);

       

        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'product_id' => $this->faker->numberBetween(1,50),
                'headline' => $this->faker->sentence(8,true),
                'body' => $this->faker->text(200),
                'image' => $this->faker->imageUrl(),
                'keywords' => json_encode($this->faker->words(8,false)),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
