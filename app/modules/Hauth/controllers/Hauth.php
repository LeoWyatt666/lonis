<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Hauth Controller Class
 */
class Hauth extends MY_Controller
{

  /**
   * {@inheritdoc}
   */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('hybridauth');
    }

  /**
   * {@inheritdoc}
   */
    public function index()
    {

      // Only AJAX
        // if (!$this->input->is_ajax_request()) {
        //     show_error('No direct script access allowed');
        // }

      // Build a list of enabled providers.
        $providers = array();
        foreach ($this->hybridauth->HA->getProviders() as $provider_id => $params) {
            $providers[$provider_id] = [
            'id' => $provider_id,
            'icon' => strtolower($provider_id),
            'url' => "hauth/window/{$provider_id}",
            ];

            $providers[$provider_id]['ancor'] = anchor($providers[$provider_id]['url'], $provider_id);
        }

        $this->load->view('Hauth/Hauth/login_widget', array(
        'providers' => $providers
        ));
    }

  /**
   * Try to authenticate the user with a given provider
   *
   * @param string $provider_id Define provider to login
   */
    public function window($provider_id = '')
    {
        $params = array(
        'hauth_return_to' => site_url("Hauth/window/{$provider_id}"),
        );
        if (isset($_REQUEST['openid_identifier'])) {
            $params['openid_identifier'] = $_REQUEST['openid_identifier'];
        }
        try {
            $adapter = $this->hybridauth->HA->authenticate($provider_id, $params);
          //$profile = $adapter->getUserProfile();
     
          //$adapter->logoutAllProviders();

          // $this->load->view('hauth/done', array(
          //   'profile' => $profile,
          // ));

            redirect("hauth/{$provider_id}");
        } catch (Exception $e) {
            $this->session->set_flashdata('message', $e->getMessage());
          //show_error($e->getMessage());
            redirect('auth');
        }
    }

  /**
   * Handle the OpenID and OAuth endpoint
   */
    public function endpoint()
    {
        $this->hybridauth->process();
    }
}
