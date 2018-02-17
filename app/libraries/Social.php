<?php
class Social
{
    public function __construct()
    {
        $this->load->model('social_model');
    }

    public function lists($id = 0, $page = 'social_lists')
    {
        $user['list'] = $this->social_model->get_user($id);
        return $this->parser->parse($page, $user);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
}
