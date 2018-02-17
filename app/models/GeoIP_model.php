<?php
class GeoIP_model extends MY_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_country($ip, $lang)
    {
        $country = (object) array_fill_keys(['code', 'country_name'], '');

        $sql = "SELECT `code`, `country_name` FROM
					(SELECT * FROM `geoip_whois` WHERE `ip_from` <= INET_ATON('{$ip}') ORDER BY `ip_from` DESC LIMIT 1) AS `cnt`,
					`geoip_locations`
                WHERE `code` = `country_iso_code` AND `locale_code` = '{$lang}'";

        $result = $this->db->query($sql)->row();

        return is_object($result) ? $result : $country;
    }
}
