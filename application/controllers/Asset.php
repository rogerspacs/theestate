<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * DEALS WITH FORMULATING /FORMATING ASSET
 * TO ALL DESIRED FORMATS TO BE DESPLAYED BY THE VIEWS
 */
class Asset extends CI_Controller
{


    public function process_collected_asset_data(){

        if ($this->input->is_ajax_request()) {
            /**
             * GET ASSET DATA SENT THROW AJAX
             */
            $general_det   = $this->input->post('general_det');

            // WITH THE ASSET ID SAVE ASSET FEATURES AND IMAGES
            $asset_det   = $this->input->post('asset_det');

            // WITH THE ASSET ID SAVE ASSET FEATURES AND IMAGES
            $selected_images   = $this->input->post('asset_images');
            $selected_images_arr = explode(',', $selected_images);

            // SAVE GENERAL ASSET DETAILS
            $asset_id = $this->save_asset_general_det($general_det, $asset_det, $selected_images_arr);

            // $data = array('general_det' => $general_det, 'asset_det' => $asset_det, 'selected_images' => $selected_images);


            echo json_encode($asset_id);
        }
    }


    public function save_asset_general_det($general_det, $asset_det, $selected_images_arr)
    {

        // // MAKE AN ARAY FROM THE SENT DATA
        // $general_det_arr = explode(',', $general_det);

        // // GET THE CATEGORY ID BASED ON THE CATEGORY TYPE SENT;
        // $category_details = check_field_exists('category_tb', 'category_name', $general_det_arr[0]);
        // $data = array(           
        //             'category_id'            => $category_details[0]->category_id,
        //             'transaction_type_id'    => $general_det_arr[1],
        //             'location'               => $general_det_arr[2],
        //             'price'                  => $general_det_arr[3],
        //             'description'            => $general_det_arr[4],
        //             'status_id'              => 7,
        //             'created_at'             => time(),
        //             'modified_at'            => time()
        //         );
        // $inserted_id = save_details('general_asset_details_tb', $data);
        // $asset_id= $inserted_id;


        // // BASED ON TRANSACTION ID SAVE ASSET ON LEASE IN LEASE ASSETS
        // if ($data['transaction_type_id'] == 2) {
        //     $lease_asset_data = array(           
        //             'asset_id'              => $inserted_id,
        //             'lease_duration'        => $general_det_arr[5],
        //             'created_at'            => time(),
        //             'modified_at'           => time()
        //         );
        //     $transaction_inserted_id = save_details('asset_on_lease_tb', $lease_asset_data);

        // }


        // // SAVE ASSET FEATURE
        // $asset_detr = $this->save_asset_features($asset_det, $inserted_id, $category_details[0]->category_id);


        // // SAVE ASSET IMAGES
        // // $selected_images_arr = $this->save_selected_images($selected_images, $asset_id);

        // SAVE ASSET IMAGES

        foreach ($selected_images_arr as $selected_image) {
            $asset_image_data = array(
                'image_name'            => $selected_image,
                'asset_id'              => 1
            );
            $saved_id = save_details('asset_images_tb', $asset_image_data);

        }

        return $selected_images_arr;
    }

    public function save_asset_features($asset_det, $asset_id, $asset_category)
    {
        // MAKE AN ARAY FROM THE SENT DATA
        $asset_det_arr = explode(',', $asset_det);

        $inserted_id = 0;
        if ($asset_category==1) {
            $land_data = array(           
                    'asset_id'            => $asset_id,
                    'size'                => $asset_det_arr[0]
                );

            $asset_features = $asset_det_arr[1];
            $inserted_id = save_details('land_details_tb', $land_data);
        }
        if ($asset_category==2) {
            $house_data = array(           
                    'asset_id'            => $asset_id,
                    'size_of_land'        => $asset_det_arr[0],
                    'bedrooms'            => $asset_det_arr[1],
                    'birthdrooms'         => $asset_det_arr[2],
                );

            $asset_features = $asset_det_arr[3];
            $inserted_id = save_details('house_details_tb', $house_data);
        }
        if ($asset_category==3) {
            $rental_data = array(           
                    'asset_id'            => $asset_id,
                    'rooms'               => $asset_det_arr[0],
                    'size'                => $asset_det_arr[1]
                );

            $asset_features = $asset_det_arr[2];
            $inserted_id = save_details('rental_details_tb', $rental_data);
        }

        // TURN ASSET FEATURES INTO ARRAY OF ASSET FEATURES
        $asset_features_arr = explode('| ', $asset_features);

        // GET CATEGORY PROPERTIES
        $category_properties = get_details('category_properties_tb');
        $category_property_names = '';
        // $fea__ = '';
        foreach ($category_properties as $category_property) {
            $category_property_names .= $category_property->property_name. '|';
        }
        $category_property_names_arr = explode('|', $category_property_names);

        foreach ($asset_features_arr as $asset_feature) {
            if(in_array($asset_feature, $category_property_names_arr)){

                // $fea__ .= $asset_feature;
                // GET FEATURRE ID
                $feature = check_field_exists('category_properties_tb', 'property_name', $asset_feature);

                $asset_feature_data = array(
                    'property_id'            => $feature[0]->property_id,
                    'asset_id'               => $asset_id
                );
                $saved_id = save_details('asset_features_tb', $asset_feature_data);

            }
        }

        return $asset_feature_data;
    }

    // public function save_selected_images($selected_images, $asset_id)
    // {
    //    // MAKE AN ARAY FROM THE SENT DATA
    //     $selected_images_arr = explode(',', $selected_images);

    //     // foreach ($selected_images_arr as $selected_image) {
    //     //     $asset_image_data = array(
    //     //         'image_name'            => $selected_image,
    //     //         'asset_id'              => $asset_id
    //     //     );
    //     //     // $saved_id = save_details('asset_images_tb', $asset_image_data);

    //     // }

    //     return $selected_images_arr; 
    // }
}
?>