<?php
class Social_model extends MY_Model
{
    public function get_user($id)
    {
        $sql = "SELECT * FROM `ci_users_socials` `us`
                LEFT JOIN `ci_socials` `s` ON `s`.`name`=`us`.`social_name`
                WHERE `user_id`={$id}";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
