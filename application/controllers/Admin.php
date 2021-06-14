<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cms_model');
        $this->load->model('logs_model');

        $this->load->library('cms_table');
        
    }

    public function index()
    {
        
        $this->load->view('pages/cms/dashboard');
    }

    // Admin posts page
    public function sell()
    {
        $this->load->view('pages/cms/sell');
    }

    // Admin users page
    public function customers()
    {
        $this->load->view('pages/cms/customers');
    }

    // Admin users page
    public function sales()
    {
        $this->load->view('pages/cms/sales');
    }

    // Admin users page
    public function logs()
    {
        $this->load->view('pages/cms/logs');
    }

    public function add_sell() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            if ($this->input->post('customer_name')) {

                $customerInfo['customer_uuid'] = md5(uniqid());
                $customerInfo['name'] = ucfirst($this->input->post('customer_name'));
                $this->cms_model->add_new_customer($customerInfo);

                // Insert customer
                $sellInfo['customer_uuid'] = $customerInfo['customer_uuid'];
                $sellInfo['mine_code'] = $this->input->post('mine_code');
                $sellInfo['price'] = $this->input->post('price');

                $this->logs_model->log('Added miner: '. ucfirst($this->input->post('customer_name')).' (<i>code: '.$this->input->post('mine_code').')</i>');
            } else {

                // Insert customer
                $sellInfo['customer_uuid'] = $this->input->post('customer_uuid');
                $sellInfo['mine_code'] = $this->input->post('mine_code');
                $sellInfo['price'] = $this->input->post('price');

                $customerDetails = $this->cms_model->get_customer($this->input->post('customer_uuid'));

                $this->logs_model->log('Added miner: '. $customerDetails['name'].' (<i>code: '.$this->input->post('mine_code').')</i>');
            }
            
            // if ( isset($_FILES['user_image']) ) {
            //     $userInfo['user_image'] = $this->do_upload('user_image');
            //     if ($userInfo['user_image'] == "false") {
            //         $userInfo['user_image'] = "";
            //     }
            // }

            // Add customer
            $resultSellInfo['id'] = $this->cms_model->add_sell($sellInfo);
            // $this->auth_model->login($this->input->post('username'), $this->input->post('password'));
            echo json_encode ($resultSellInfo);
            
        } else {
            redirect('', 'refresh');
        }
    }

    public function add_customer() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Insert customer
            $customerInfo['customer_uuid'] = md5(uniqid());
            $customerInfo['name'] = ucfirst($this->input->post('name'));
            $customerInfo['fb_link'] = $this->input->post('fb_link');
            $customerInfo['address'] = ucwords($this->input->post('address'));
            $customerInfo['phone_num'] = $this->input->post('phone_num');
            // if ( isset($_FILES['user_image']) ) {
            //     $userInfo['user_image'] = $this->do_upload('user_image');
            //     if ($userInfo['user_image'] == "false") {
            //         $userInfo['user_image'] = "";
            //     }
            // }

            // Add customer
            $resultCustomerInfo['id'] = $this->cms_model->add_customer($customerInfo);

            $this->logs_model->log('Added customer: '.$this->input->post('name'));
            // $this->auth_model->login($this->input->post('username'), $this->input->post('password'));
            echo json_encode ($resultCustomerInfo);
            
        } else {
            redirect('', 'refresh');
        }
    }

    // Admin posts page
    public function get_daily_sales()
    {
        $date = date('Y-m-d');
        $dates = [];

        for ($i=0; $i < 5; $i++) { 
            array_push($dates, $this->cms_model->get_daily_sales($date)??0);
            $date =  date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date))));
        }

        echo json_encode($dates);
    }

    // Admin posts page
    public function get_customer()
    {
        echo json_encode($this->cms_model->get_customer($this->input->post('customer_uuid')));
    }

    // Admin posts page
    public function get_all_customers()
    {
        echo json_encode($this->cms_model->get_all_customers());
    }

    // Admin posts page
    public function get_active_customers()
    {
        echo json_encode($this->cms_model->get_active_customers());
    }

    // GET miners today
    public function get_miners_today()
    {
        echo json_encode($this->cms_model->get_miners_today());
    }

    // GET sales today
    public function get_sales_date()
    {
        echo json_encode($this->cms_model->get_sales_date());
    }

    // GET sales today
    public function get_all_logs()
    {
        echo json_encode($this->cms_model->get_all_logs());
    }

    // VIEW all sales of customer
    public function view_customer_sales()
    {
        echo json_encode($this->cms_model->view_customer_sales($this->input->get('uuid')));
    }

    // VIEW sales of customer on specified date
    public function view_sales_customer()
    {
        echo json_encode($this->cms_model->view_sales_customer($this->input->post('customer_uuid'), $this->input->post('date_created')));
    }


    public function edit_customer() {
        // Check if this is an AJAX request
        if($this->input->is_ajax_request()) {

            // Edit customer
            $customer_uuid = $this->input->post('customer_uuid');
            $customerInfo['fb_link'] = $this->input->post('fb_link');
            $customerInfo['phone_num'] = $this->input->post('phone_num');
            $customerInfo['address'] = ucwords($this->input->post('address'));
            // if ( isset($_FILES['user_image']) ) {
            //     $userInfo['user_image'] = $this->do_upload('user_image');
            //     if ($userInfo['user_image'] == "false") {
            //         $userInfo['user_image'] = "";
            //     }
            // }

            // Add customer
            $resultCustomerInfo['id'] = $this->cms_model->edit_customer($customer_uuid, $customerInfo);

            $this->logs_model->log('Edited customer: '.$this->input->post('name'));
            // $this->auth_model->login($this->input->post('username'), $this->input->post('password'));
            echo json_encode ($resultCustomerInfo);
            
        } else {
            redirect('', 'refresh');
        }
    }

    // Hide customer
    public function hide_customer()
    {
        $this->cms_model->hide_customer($this->input->post('customer_uuid'));

        $customerDetails = $this->cms_model->get_customer($this->input->post('customer_uuid'));

        $this->logs_model->log('Hidden a customer: '.$customerDetails['name']);

        echo json_encode('success');
    }

    // Hide customer
    public function unhide_customer()
    {
        $this->cms_model->unhide_customer($this->input->post('customer_uuid'));

        $customerDetails = $this->cms_model->get_customer($this->input->post('customer_uuid'));

        $this->logs_model->log('Unhidden a customer: '.$customerDetails['name']);

        echo json_encode('success');
    }

    // Hide customer
    public function remove_customer()
    {
        $this->cms_model->remove_customer($this->input->post('customer_uuid'));

        $customerDetails = $this->cms_model->get_customer($this->input->post('customer_uuid'));

        $this->logs_model->log('Removed a customer: '.$customerDetails['name']);

        echo json_encode('success');
    }

    // Hide customer
    public function remove_sell()
    {
        $this->cms_model->remove_sell($this->input->post('sell_id'));

        $sellDetails = $this->cms_model->get_sell($this->input->post('sell_id'));

        $this->logs_model->log('Removed a miner; Code: '.$sellDetails['mine_code']);

        echo json_encode('success');
    }

    // Hide customer
    public function toggle_sales_paid()
    {
        $this->cms_model->toggle_sales_paid($this->input->post('customer_uuid'), $this->input->post('date_created'));

        $customerDetails = $this->cms_model->get_customer($this->input->post('customer_uuid'));

        $this->logs_model->log('Toggle Paid to: '.$customerDetails['name'].' for '.date("F jS", strtotime($this->input->post('date_created'))));

        echo json_encode('success');
    }

    // Hide customer
    public function override_paid()
    {
        $this->cms_model->override_paid($this->input->post('sell_id'));

        $sellDetails = $this->cms_model->get_sell($this->input->post('sell_id'));

        $this->logs_model->log('Overidden an item to paid for customer: '. $sellDetails['name'].' <i>(code: '. $sellDetails['mine_code'].')</i>');

        echo json_encode('success');
    }

    public function generate_invoice(){
        $this->ggenerate_invoice();
    }


    private function ggenerate_invoice(){

        $this->load->library('Phpfpdf');
        $pdf = new Phpfpdf();
        $pdf->AliasNbPages();

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);

        $customer_uuid = $this->input->post('customer_uuid');
        $date_created = $this->input->post('date_created');
        $salesDetails = $this->cms_model->view_sales_customer($this->input->post('customer_uuid'), $this->input->post('date_created'));

        // // Title
        $pdf->SetFont('Arial','B',22);
        $pdf->Cell(190,10,'THRIFTEES & MORE INVOICE',0,0,'C');

        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(190,3,'0947 355 7763 | vsevilla416@gmail.com',0,0,'C');
        $pdf->Ln();

        $pdf->Ln();
        $pdf->Cell(190,10,'',0,0,'C');
        $pdf->Ln();

        // // Body
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15,10,'',0,0,'L');
        $pdf->Cell(120,10,'Name: '.$salesDetails[0]['name'],0,0,'L');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(85,10,'Date: '.$salesDetails[0]['date_created'],0,0,'L');
        $pdf->Ln();

        $pdf->Cell(190,10,'',0,0,'C');
        $pdf->Ln();

        $pdf->Cell(15,10,'',0,0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(130,10,'Items List(s):',0,0,'L');
        $pdf->Ln();

        $pdf->Cell(15,10,'',0,0,'L');
        $pdf->CellFitScale(10,6, '#',1, 0, 'C');
        $pdf->CellFitScale(110,6, 'Item Code',1, 0, 'C');
        $pdf->CellFitScale(38,6, 'Price',1, 0, 'C');
        $pdf->Ln();

        $grandTotal = 0;

        $pdf->SetFont('Arial','',10);
        for($i=0; $i < count($salesDetails); $i++) {

            $grandTotal = $salesDetails[$i]['price'] + $grandTotal;

            $pdf->Cell(15,10,'',0,0,'L');
            $pdf->CellFitScale(10,12, $i+1,1, 0, 'C');
            $pdf->CellFitScale(110,12, $salesDetails[$i]['mine_code'],1, 0, 'C');
            $pdf->CellFitScale(38,12, '         P '.number_format($salesDetails[$i]['price']),1, 0, 'L');
            $pdf->Ln();
        }

        $pdf->Cell(110,10,'',0,0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(34,10, 'Grand Total:',0,0,'L');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,10, 'P '.number_format($grandTotal),0,0,'L');


        $pdf->Output("D", $salesDetails[0]['date_created'].' - '.$salesDetails[0]['name'].".pdf");
    }

}