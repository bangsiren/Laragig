<?php 
  namespace App\Models;

use Illuminate\Database\Console\Migrations\StatusCommand;

  class Listing {
      public static function all() {
         return  [
            [
                'id'=> 1,
                'title'=> 'Listing One',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Accusamus officiis alias magnam, dignissimos, delectus, in dolorem sint 
                                voluptates perspiciatis odio nemo ullam saepe laborum aspernatur soluta 
                                blanditiis tempora incidunt rerum!'
            ],
            [
                'id'=> 2,
                'title'=> 'Listing Two',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Accusamus officiis alias magnam, dignissimos, delectus, in dolorem sint 
                                voluptates perspiciatis odio nemo ullam saepe laborum aspernatur soluta 
                                blanditiis tempora incidunt rerum!'
            ]
            ];
      }
      public static function find($id) {
        $listings = self::all();
        foreach($listings as $listing) {
          if($listing['id'] == $id) {
            return $listing;
          }
        }
      }
  }
?>