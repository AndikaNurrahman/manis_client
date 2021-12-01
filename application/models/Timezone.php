<?php if ( defined('BASEPATH') === FALSE ) exit('No direct script access allowed');

class My_timezones_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->create();
    }

    function create()
    {
        if( $this->db->table_exists('my_timezones')  == FALSE)
        {
            $this->db->query( "CREATE TABLE `my_timezones` (
                `tz_id` int unsigned not null auto_increment,
                `tz_continent` varchar(12) not null comment 'the continent',
                `tz_city` varchar(14) not null comment 'the city',
                PRIMARY KEY (`tz_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");

            $arr = array();
            $identifiers = DateTimeZone::listIdentifiers();
            foreach ($identifiers as $identifer)
            {
                $tmp = explode('/',$identifer);
                if ((isset($tmp[1])) && ($tmp[1]))
                {
                    $arr[] = array('tz_continent' => $tmp[0],'tz_city'=>$tmp[1]);   
                }

            }
            $this->db->insert_batch('my_timezones',$arr);
        }
    }
    function get_select($selected_tz_id=FALSE)
    {
        // returns a select
        $timezones = $this->db->get('my_timezones')->result();
        $select = '<select>';
        $optgroup = FALSE;
        foreach ($timezones as $timezone)
        {
            if ($optgroup === FALSE )
            {
                $select .= "<optgroup label='$timezone->tz_continent'>";
                $optgroup = $timezone->tz_continent;
            }
            if ($timezone->tz_continent != $optgroup)
            {
                $select .= "</optgroup><optgroup label='$timezone->tz_continent'>";
                $optgroup = $timezone->tz_continent;
            }
            $select .="<option value='$timezone->tz_id'";
            if ($timezone->tz_id == $selected_tz_id)
            {
                $select .= " selected='selected' ";
            }
            $select .=">$timezone->tz_city</option>";
        }
        $select .="</optgroup></select>";
        return $select;
    }

    function get_continents()
    {
        // returns a list of continents
        return $this->db->select('tz_continent')->group_by('tz_continent')->order_by('tz_sort_order')->get($this->get('table_name'))->result();
    }
    function get_tz($id)
    {
        // input of the tz_id
        // returns a string of the timezone in format: Continent/City, eg Australia/Hobart, or NULL if the ID is not found.

        $this->db->select("concat(`tz_continent`,'/',`tz_city`) as tz",FALSE)
            ->from($this->get('table_name'))
            ->where('tz_id',$id);
        $q = $this->db->get();
        $r = NULL;
        if ( $q->num_rows()  == 1 )
        {
            $r = str_replace(' ','_',$q->first_row()->tz);
        }
        return $r;
    }
}