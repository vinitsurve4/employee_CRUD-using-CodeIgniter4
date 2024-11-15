<?php
class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
    }

    // Display the employee form
    public function index() {
        $this->load->view('employee_form');
    
    }

    // Save employee and address data
    public function save() {
        $employee_data = array(
            'fname' => $this->input->post('fname'),
            'mname' => $this->input->post('mname'),
            'lname' => $this->input->post('lname'),
            'gender' => $this->input->post('gender'),
            'mail' => $this->input->post('mail'),
            'mobile_no' => $this->input->post('mobile_no'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'photograph' => $this->upload_photo(),  // Function to upload photograph
            'status' => $this->input->post('status')
        );
        $employee_id = $this->Employee_model->insert_employee($employee_data);

        // Insert multiple addresses
        $addresses = $this->input->post('add_line1');
        for ($i = 0; $i < count($addresses); $i++) {
            $address_data = array(
                'employee_id' => $employee_id,
                'add_line1' => $this->input->post('add_line1')[$i],
                'add_line2' => $this->input->post('add_line2')[$i],
                'country' => $this->input->post('country')[$i],
                'state' => $this->input->post('state')[$i],
                'pincode' => $this->input->post('pincode')[$i]
            );
            $this->Employee_model->insert_address($address_data);
        }

        redirect('employee');
    }

    // Upload photograph function
    private function upload_photo() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photograph')) {
            return $this->upload->data('file_name');
        }
        return null;
    }
    public function list($page = 0) {
        $search_query = $this->input->get('search');
        
        $limit = 10;  // Limit of records per page
        $start = $page > 0 ? ($page - 1) * $limit : 0;
    
        $data['employees'] = $this->Employee_model->fetch_employees($limit, $start, $search_query);
        $data['total_rows'] = $this->Employee_model->record_count($search_query);
    
        // Load the employee list view
        $this->load->view('employee_list', $data);
    }
    
}
