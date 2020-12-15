<?php
namespace Rigo\Controller;

use Rigo\Types\Quote;
use \WP_REST_Request;

class QuoteController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    
    public function getSingleQuote(WP_REST_Request $request){
        $body = json_decode($request->get_body());
                // var_dump($body ->email) ;

        $email = $body->email;
        $quotes=[];
        $query = Quote::all();
        foreach($query->posts as $quote){
            $quoteEmail= get_field('useremail', $quote->ID);
            if ($quoteEmail == $email){
                $quotes[] = array (
                    "ID" => $quote->ID,
                    "post_title" => $quote->post_title,
                    "useremail" => get_field('useremail', $quote->ID),
                    "clength" => get_field('clength', $quote->ID),
                    "width" => get_field('width', $quote->ID),
                    "height" => get_field('height', $quote->ID),
                    "weight" => get_field('weight', $quote->ID),
                    "address" => get_field('address', $quote->ID),
                    "city" => get_field('city', $quote->ID),
                    "state" => get_field('state', $quote->ID),
                    "zipcode" => get_field('zipcode', $quote->ID)

                    );


            }
            
          
        }
       
        // $quote = Quote::get($id);
        // $quote = array (
        //       "ID" => $quote->ID,
        //         // "post_title" => $quote->post_title,
        //         "useremail" => get_field('useremail', $quote->ID),
        //         "clength" => get_field('clength', $quote->ID),
        //         "width" => get_field('width', $quote->ID),
        //         "height" => get_field('height', $quote->ID),
        //         "weight" => get_field('weight', $quote->ID),
        //         "address" => get_field('address', $quote->ID),
        //         "city" => get_field('city', $quote->ID),
        //         "state" => get_field('state', $quote->ID),
        //         "zipcode" => get_field('zipcode', $quote->ID)

        // );

        return $quotes;
    }

    public function getAllQuote(WP_REST_Request $request){
        // $id = (string) $request['id'];
        // $result = Quote::all();
        // return $result ->posts;
        $courses = [];
        $query = Quote::all([ 'status' => 'draft' ]);
        foreach($query->posts as $quote){
            $quotes[] = array(
                "ID" => $quote->ID,
                "post_title" => $quote->post_title,
                "useremail" => get_field('useremail', $quote->ID),
                "clength" => get_field('clength', $quote->ID),
                "width" => get_field('width', $quote->ID),
                "height" => get_field('height', $quote->ID),
                "weight" => get_field('weight', $quote->ID),
                "address" => get_field('address', $quote->ID),
                "city" => get_field('city', $quote->ID),
                "state" => get_field('state', $quote->ID),
                "zipcode" => get_field('zipcode', $quote->ID)
            );
        }
        return $quotes;
    }
    

   public function createQuote(WP_REST_Request $request){

        $body = json_decode($request->get_body());
        
        $id = Quote::create([
            'post_title'    => $body->title,
            
            ]);
            update_field('useremail', $body->useremail,$id);
            update_field('clength', $body->clength,$id);
            update_field('width', $body->width,$id);
            update_field('height', $body->height,$id);
            update_field('weight', $body->weight,$id);
            update_field('address', $body->address,$id);
            update_field('city', $body->city,$id);
            update_field('state', $body->state,$id);
            update_field('zipcode', $body->zipcode,$id);


            // 'clength'    => $body->clength,
            // 'width'    => $body->width,
            // 'height'    => $body->height,
            // 'weight'    => $body->weight,
            // 'address'    => $body->address,
            // 'city'    => $body->city,
            // 'state'    => $body->state,
            // 'zipcode'    => $body->zipcode,


            return $id;
    }
    public function deleteQuote(WP_REST_Request $request){
        $id = (string) $request['id'];
        // result is true on success, false on failure
        $result = Quote::delete($id);
        return $result;
    }
    
    }
?>