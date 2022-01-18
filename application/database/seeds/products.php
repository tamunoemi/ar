<?php

class products extends Seeder {

    private $table = 'products';

    public function run() {
        $this->db->truncate($this->table);


        //seed many records using faker
        $limit = 50;
        echo "seeding $limit user accounts";

        for ($i = 0; $i < $limit; $i++) {
            
            echo ".";

            $data = array(
                'name' => $this->faker->unique()->name,
                'description' => $this->faker->realText(190,2),
                'image'=>$this->faker->imageUrl(),
                'alixpress_price' => $this->faker->numberBetween(5,150),
                'alixpress_link' => $this->faker->url,
                'alixpress_link' => $this->faker->url,
                'agent_id'=>  json_encode($this->faker->shuffle(array(1,2,3))),
                'cost_via_agent'=>$this->faker->numberBetween(10,200),
                'facebook_ads_ids'=>$this->faker->numberBetween(1,50),
                'ad_interests'=>json_encode($this->faker->words(15,FALSE)),
                    
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
