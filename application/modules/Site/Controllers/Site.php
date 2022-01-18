<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Site extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));

		$this->load->helper(array('url', 'language'));
		$this->load->model('brand_model');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

    public function index(){
        //$this->load->view("site/common/header");
        $this->load->view("site/index");
    }

    public function new_brand(){
        $this->load->view("site/new-brand");
    }

    public function create_brand(){
        $id = $this->brand_model->new_brand();
        if($id != null)
        {
            $config['upload_path'] = '././uploads/logos';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $config['file_name'] = $id;
            $this->load->library('upload', $config);
			//Upload brand logo
			//Create /logos/ directory in /uploads/ if it doesn't exist
			if(!file_exists("../../uploads/logos")) 
			{
				//Create /csvs/ directory
				if(!mkdir("../../uploads/logos", 0777))
				{
					//Could not create directory '/logos/'. 
					//Please make sure permissions in /uploads/ folder is set to 777. 
					header("Location: ".get_app_info('path').'/index.php/site/edit-brand?i='.$id.'&e=1');
					exit;
				}
				else
				{
					//chmod uploaded file
					chmod("../../uploads/logos",0777);
				}
			}

            if ( !$this->upload->do_upload('logo'))
            {
                $error = array('error' => $this->upload->display_errors());
                header("Location: ".get_app_info('path').'/edit-brand?i='.$id.'&e=3');
                //$this->load->view('upload_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                //Update brand_logo_filename in database
                $logo_column = array("brand_logo_filename" => $id . $this->upload->data('file_ext'));
                $where_id = array("key" => "id", "value" => (int)$id);
                $this->brand_model->update_brand($logo_column, $where_id, "apps");
            }
			
			//Upload logo
			$file = $_FILES['logo']['tmp_name'];
			$file_name = $_FILES['logo']['name'];
            var_dump($file);
			if($file_name!='') //if an image file was uploaded, upload the image
			{
				$extension_explode = explode('.', $file_name);
				$extension = $extension_explode[count($extension_explode)-1];
				$time = time();
				chmod("../../uploads",0777);
				
				//Check filetype
				$allowed = array("jpeg", "jpg", "gif", "png");
				if(in_array($extension, $allowed)) //if file is an image, allow upload
				{
					//Upload file
					if(!move_uploaded_file($file, '../../uploads/logos/'.$id.'.'.$extension))
					{
						//Could not upload brand logo image to '/logos/' folder. 
						//Please make sure permissions in /uploads/ folder is set to 777. 
						//Then remove the /logos/ folder in the /uploads/ folder and try again.
						header("Location: ".get_app_info('path').'/edit-brand?i='.$id.'&e=3');
					}
					else
					{
						//Update brand_logo_filename in database
					}
				}
				else 
				{
					//Please upload only these image formats: jpeg, jpg, gif and png.
					header("Location: ".get_app_info('path').'/edit-brand?i='.$id.'&e=2');
					exit;
				}
			}
			
			header("Location: ".get_app_info('path'));
		}
    }

    public function edit_brand(){
        //       
    }
}