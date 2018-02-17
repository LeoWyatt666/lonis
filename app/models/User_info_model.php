<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_info_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function get_info($id = null)
    {
        if (! empty($id)) {
            $user = $this->ion_auth->user($id)->row();

            if ($user) {
                $data['id']         = $user->id;
                $data['ipaddress']  = $user->ip_address;
                $data['username']   = ! empty($user->username) ? htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') : null;
                $data['email']      = $user->email;
                $data['created_on'] = $user->created_on;
                $data['lastlogin']  = ! empty($user->last_login) ? $user->last_login : null;
                $data['active']     = $user->active;
                $data['firstname']  = ! empty($user->first_name) ? htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') : null;
                $data['lastname']   = ! empty($user->last_name) ? htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8') : null;
                $data['company']    = ! empty($user->company) ? htmlspecialchars($user->company, ENT_QUOTES, 'UTF-8') : null;
                $data['phone']      = ! empty($user->phone) ? $user->phone : null;

                if (! empty($data['firstname']) && ! empty($data['lastname'])) {
                    $data['fullname'] = $data['firstname'] . ' ' . $data['lastname'];
                } elseif (! empty($data['firstname']) && empty($data['lastname'])) {
                    $data['fullname'] = $data['firstname'];
                } elseif (empty($data['firstname']) && ! empty($data['lastname'])) {
                    $data['fullname'] = $data['lastname'];
                } else {
                    $data['fullname'] = null;
                }

                return $data;
            }
        }
    }
}
