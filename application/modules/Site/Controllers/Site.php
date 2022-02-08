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

	public function app_view(){
		$this->load->view("site/app");
	}

	public function app_edit(){
		$this->load->view("site/includes/app/edit");
	}

	public function app_check_email_verification(){
		$this->load->view("site/includes/app/check-email-verification");
	}

	public function app_verify_email(){
		$this->load->view("site/includes/app/verify-email");
	}

	public function app_delete_logo(){
		$this->load->view("site/includes/app/delete-logo");
	}

    public function new_brand(){
        $this->load->view("site/new-brand");
    }

    public function create_brand(){
        // if(!file_exists("././././uploads/logos")) 
        // {
        //     //Create /csvs/ directory
        //     if(!mkdir("../../uploads/logos", 0777))
        //     {
        //         //Could not create directory '/logos/'. 
        //         //Please make sure permissions in /uploads/ folder is set to 777. 
        //         echo dirname(__FILE__);
        //         //header("Location: ".get_app_info('path').'/index.php/site/edit-brand?i=8'.'&e=1');
        //         exit;
        //     }
        //     else
        //     {
        //         //chmod uploaded file
        //         chmod("../../uploads/logos",0777);
        //     }
        // } else {
        //     echo dirname(__FILE__);
        //     echo " test";
        //     exit();
        // };
        $id = $this->brand_model->new_brand();

        if ($id != null)
		{
			//Upload brand logo
			//Create /logos/ directory in /uploads/ if it doesn't exist
			if(!file_exists("././././uploads/logos")) 
			{
				//Create /csvs/ directory
				if(!mkdir("././././uploads/logos", 0777))
				{
					//Could not create directory '/logos/'. 
					//Please make sure permissions in /uploads/ folder is set to 777. 
					header("Location: ".get_app_info('path').'/index.php/site/edit-brand?i='.$id.'&e=1');
					exit;
				}
				else
				{
					//chmod uploaded file
					chmod("././././uploads/logos",0777);
				}
			}
			
			//Upload logo
			$file = $_FILES['logo']['tmp_name'];
			$file_name = $_FILES['logo']['name'];
			if($file_name!='') //if an image file was uploaded, upload the image
			{
				$extension_explode = explode('.', $file_name);
				$extension = $extension_explode[count($extension_explode)-1];
				$time = time();
				chmod("././././uploads",0777);
				
				//Check filetype
				$allowed = array("jpeg", "jpg", "gif", "png");
				if(in_array($extension, $allowed)) //if file is an image, allow upload
				{
					//Upload file
					if(!move_uploaded_file($file, '././././uploads/logos/'.$id.'.'.$extension))
					{
						//Could not upload brand logo image to '/logos/' folder. 
						//Please make sure permissions in /uploads/ folder is set to 777. 
						//Then remove the /logos/ folder in the /uploads/ folder and try again.
						header("Location: ".get_app_info('path').'/index.php/site/edit-brand?i='.$id.'&e=3');
					}
					else
					{
                        // $config['upload_path'] = '././uploads/logos';
                        // $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        // $config['max_size']     = '100';
                        // $config['max_width'] = '1024';
                        // $config['max_height'] = '768';
                        // $config['file_name'] = $id;
                        // $this->load->library('upload', $config);
                        // $data = array('upload_data' => $this->upload->data());
                        //Update brand_logo_filename in database
                        $logo_column = array("brand_logo_filename" => $id.'.'.$extension);
                        $where_id = array("key" => "id", "value" => $id);
                        $this->brand_model->update_brand($logo_column, $where_id, "apps");
					}
				}
				else 
				{
					//Please upload only these image formats: jpeg, jpg, gif and png.
					header("Location: ".get_app_info('path').'/index.php/site/edit-brand?i='.$id.'&e=2');
					exit;
				}
			}
			
			header("Location: ".get_app_info('path'). '/index.php/site/');
		}
    }

    public function edit_brand(){
        $this->load->view("site/edit-brand");       
    }

	public function create_campaign(){
		$this->load->view("site/create");
	}

	public function create_save_campaign(){
		$this->load->view("site/includes/create/save-campaign");
	}

	public function create_delete_attachment(){
		$this->load->view("site/includes/create/delete-attachment");
	}

	public function create_toggle_wysiwyg(){
		$this->load->view("site/includes/create/toggle-wysiwyg");
	}

	public function templates(){
		$this->load->view("site/templates");
	}

	public function create_template(){
		$this->load->view("site/create-template");
	}

	public function edit_template(){
		$this->load->view("site/edit-template");
	}

	public function templates_delete(){
		$this->load->view("site/includes/templates/delete");
	}

	public function save_template(){
		$this->load->view("site/includes/templates/save-template");
	}

	public function template_preview(){
		$this->load->view("site/template-preview");
	}

	public function template_use_template(){
		$this->load->view("site/includes/templates/use-template");
	}

	public function list(){
		$this->load->view("site/list");
	}

	public function delete_from_list(){
		$this->load->view("site/delete-from-list");
	}

	public function unsubscribe_from_list(){
		$this->load->view("site/unsubscribe-from-list");
	}

	public function unsubscribe_success(){
		$this->load->view("site/unsubscribe-success");
	}

	public function edit_list(){
		$this->load->view("site/edit-list");
	}

	public function list_edit(){
		$this->load->view("site/includes/list/edit");
	}

	public function list_dismiss(){
		$this->load->view("site/includes/list/dismiss");
	}

	public function list_progress(){
		$this->load->view("site/includes/list/progress");
	}

	public function list_export_skipped_emails(){
		$this->load->view("site/includes/list/export-skipped-emails");
	}

	public function autoresponders_list(){
		$this->load->view("site/autoresponders-list");
	}

	public function autoresponders_create(){
		$this->load->view("site/autoresponders-create");
	}

	public function autoresponders_edit(){
		$this->load->view("site/autoresponders-edit");
	}

	public function autoresponders_emails(){
		$this->load->view("site/autoresponders-emails");
	}

	public function autoresponders_report(){
		$this->load->view("site/autoresponders-report");
	}

	public function ares_add_autoresponder(){
		$this->load->view("site/includes/ares/add-autoresponder");
	}

	public function ares_save_autoresponder_email(){
		$this->load->view("site/includes/ares/save-autoresponder-email");
	}

	public function ares_delete_ares(){
		$this->load->view("site/includes/ares/delete-ares");
	}

	public function ares_delete_attachment(){
		$this->load->view("site/includes/ares/delete-attachment");
	}

	public function ares_delete_email(){
		$this->load->view("site/includes/ares/delete-email");
	}

	public function ares_toggle_wysiwyg(){
		$this->load->view("site/includes/ares/toggle-wysiwyg");
	}

	public function ares_toggle_autoresponder(){
		$this->load->view("site/includes/ares/toggle-autoresponder");
	}

	public function ares_reports_export_csv(){
		$this->load->view("site/includes/ares-reports/export-csv");
	}

	public function segment(){
		$this->load->view("site/segment");
	}

	public function segments_list(){
		$this->load->view("site/segments-list");
	}

	public function segments_export_csv(){
		$this->load->view("site/includes/segments/export-csv");
	}

	public function segment_segmentate(){
		$this->load->view("site/includes/segments/segmentate");
	}

	public function segments_delete(){
		$this->load->view("site/includes/segments-delete");
	}

	public function search_all_lists(){
		$this->load->view("site/search-all-lists");
	}

	public function search_all_brands(){
		$this->load->view("site/search-all-brands");
	}

	public function subscribe(){
		$this->load->view("site/subscribe");
	}

	public function subscribers(){
		$this->load->view("site/subscribers");
	}

	public function unsubscribe(){
		$this->load->view("site/unsubscribe");
	}

	public function subscribers_line_unsubscribe(){
		$this->load->view("site/includes/subscribers/line-unsubscribe");
	}

	public function subscribers_import_unsubscribe(){
		$this->load->view("site/includes/subscribers/import-unsubscribe");
	}

	public function subscribers_import_add(){
		$this->load->view("site/includes/subscribers/import-add");
	}

	public function subscribers_import_update(){
		$this->load->view("site/includes/subscribers/import-update");
	}

	public function subscribers_import_delete(){
		$this->load->view("site/includes/subscribers/import-delete");
	}

	public function subscribers_import_blocked_domain_list(){
		$this->load->view("site/includes/subscribers/import-blocked-domain-list");
	}

	public function subscribers_import_blocked_domain_list2(){
		$this->load->view("site/includes/subscribers/import-blocked-domain-list2");
	}

	public function subscribers_import_suppression_list(){
		$this->load->view("site/includes/subscribers/import-suppression-list");
	}

	public function subscribers_import_suppression_list2(){
		$this->load->view("site/includes/subscribers/import-suppression-list2");
	}

	public function subscribers_edit(){
		$this->load->view("site/includes/subscribers/edit");
	}

	public function subscribers_export_csv(){
		$this->load->view("site/includes/subscribers/export-csv");
	}

	public function subscribers_subscriber_info(){
		$this->load->view("site/includes/subscribers/subscriber-info");
	}

	public function subscribers_delete_suppressed_email(){
		$this->load->view("site/includes/subscribers/delete-suppressed-email");
	}

	public function subscribers_delete_blocked_domain(){
		$this->load->view("site/includes/subscribers/delete-blocked-domain");
	}

	public function subscribers_delete_inactive(){
		$this->load->view("site/includes/subscribers/delete-inactive");
	}

	public function subscribers_delete_unconfirmed(){
		$this->load->view("site/includes/subscribers/delete-unconfirmed");
	}

	public function subscribers_line_update(){
		$this->load->view("site/includes/subscribers/line-update");
	}

	public function subscribers_line_delete(){
		$this->load->view("site/includes/subscribers/line-delete");
	}

	public function subscribers_subscribe_form(){
		$this->load->view("site/includes/subscribers/subscribe-form");
	}

	public function subscribers_subscribe_info(){
		$this->load->view("site/includes/subscribers/subscribe-info");
	}

	public function subscribers_unsubscribe(){
		$this->load->view("site/includes/subscribers/unsubscribe");
	}

	public function subscribers_delete(){
		$this->load->view("site/includes/subscribers/delete");
	}

	public function subscribers_save_gdpr(){
		$this->load->view("site/includes/subscribers/save-gdpr");
	}

	public function subscribers_housekeeping_no_opens(){
		$this->load->view("site/includes/subscribers/housekeeping-no-opens");
	}

	public function subscribers_housekeeping_no_clicks(){
		$this->load->view("site/includes/subscribers/housekeeping-no-clicks");
	}

	public function subscription(){
		$this->load->view("site/subscription");
	}

	public function update_list(){
		$this->load->view("site/update-list");
	}

	public function housekeeping_unconfirmed(){
		$this->load->view("site/housekeeping-unconfirmed");
	}

	public function housekeeping_inactive(){
		$this->load->view("site/housekeeping-inactive");
	}

	public function blacklist_suppression(){
		$this->load->view("site/blacklist-suppression");
	}

	public function report(){
		$this->load->view("site/report");
	}

	public function reports(){
		$this->load->view("site/reports");
	}

	public function reports_export_csv(){
		$this->load->view("site/includes/reports/export-csv");
	}

	public function reports_update_campaign_title(){
		$this->load->view("site/reports/update-campaign-title");
	}

	public function calculate_totals(){
		$this->load->view("site/includes/create/calculate-totals");
	}

	public function edit_campaign(){
		$this->load->view("site/edit");
	}

	public function campaigns_bounces(){
		$this->load->view("site/includes/campaigns/bounces");
	}

	public function campaigns_complaints(){
		$this->load->view("site/includes/campaigns/complaints");
	}

	public function campaigns_delete(){
		$this->load->view("site/includes/campaigns/delete");
	}

	public function send_to(){
		$this->load->view("site/send-to");
	}

	public function send_now(){
		$this->load->view("site/includes/create/send-now");
	}

	public function sending(){
		$this->load->view("site/sending");
	}

	public function send_later(){
		$this->load->view("site/includes/create/send-later");
	}

	public function test_send(){
		$this->load->view("site/includes/create/test-send");
	}

	public function app_duplicate(){
		$this->load->view("site/includes/app/duplicate");
	}

	public function app_progress(){
		$this->load->view("site/includes/app/progress");
	}

	public function app_delete(){
		$this->load->view("site/includes/app/delete");
	}

	public function app_generate_password(){
		$this->load->view("site/includes/app/generate-password");
	}

	public function app_verify_login_email(){
		$this->load->view("site/includes/app/verify-login-email");
	}

	public function app_download_errors_csv(){
		$this->load->view("site/includes/app/download_errors_csv");
	}

	public function custom_fields(){
		$this->load->view("site/custom-fields");
	}

	public function list_add_custom_field(){
		$this->load->view("site/list/add-custom-field");
	}

	public function list_edit_custom_field(){
		$this->load->view("site/list/edit-custom-field");
	}

	public function list_delete_custom_field(){
		$this->load->view("site/list/delete-custom-field");
	}

	public function list_delete(){
		$this->load->view("site/list/delete");
	}
	
	public function confirm(){
		$this->load->view("site/confirm");
	}

	public function payment(){
		$this->load->view("site/payment");
	}

	public function detect_table_conflicts(){
		$this->load->view("site/detect-table-conflicts");
	}

	public function clear_queue(){
		$this->load->view("site/clear-queue");
	}

	public function blacklist_blocked_domains(){
		$this->load->view("site/blacklist-blocked-domains");
	}

	public function settings(){
		$this->load->view("site/settings");
	}

	public function settings_save(){
		$this->load->view("site/includes/settings/save");
	}

	public function settings_two_factor(){
		$this->load->view("site/includes/settings/two-factor");
	}

	public function reset_cron(){
		$this->load->view("site/reset-cron");
	}

	public function import_csv(){
		$this->load->view("site/import-csv");
	}

	public function remove_duplicates(){
		$this->load->view("site/remove-duplicates");
	}

	public function reconsent_success(){
		$this->load->view("site/reconsent-success");
	}

	public function w($id, $a = null){
		if($a == null) $data = array('i' => $id);
		else $data = array('i' => $id . '/' . $a);
		
		$this->load->view("site/w", $data);
	}

	public function l($i){
		if($i == null) $data = array('i' => $i);
		$this->load->view("site/l", $data);
	}

	public function r($id, $link_id = null, $ares_id = null){
		if($link_id == null) $data = array('i' => $id);
		else $data = array('i' => $id . '/' . $link_id);

		if(($link_id != null) && ($ares_id != null)){
			$data["i"] = $data["i"] . '/'. $ares_id;
		}
		$this->load->view("site/l", $data);
	}
}