<?php
class System_model extends CI_Model
{
    //Admin
    public function get_user()
    {
        $this->db->select('user.id, user.name, user.email, user.role_id, user.is_active, user_role.role, user.membership, membership.status');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->join('membership', 'user.membership = membership.membership_id');
        return $this->db->get()->result();
    }

    public function get_payment()
    {
        $this->db->select('*');
        $this->db->from('payment');
        return $this->db->get()->result();
    }

    //Operator
    public function get_main()
    {
        $this->db->select('main_abiotic.id, main_abiotic.name, main_abiotic.geographical_zone, main_abiotic.type_water, main_abiotic.nilai_awal, main_abiotic.nilai_akhir, main_abiotic.bobot, geographical_zone.zone, type_water.water');
        $this->db->from('main_abiotic');
        $this->db->join('type_water', 'main_abiotic.type_water = type_water.id');
        $this->db->join('geographical_zone', 'main_abiotic.geographical_zone = geographical_zone.id');
        return $this->db->get()->result();
    }

    public function get_add()
    {
        $query = $this->db->get('additional_abiotic');
        return $query->result();
    }

    public function get_index()
    {
        $query = $this->db->get('index_biotic');
        return $query->result();
    }

    public function get_family_biotic()
    {
        $query = $this->db->get('family_biotic');
        return $query->result();
    }
    public function get_all_station()
    {
        $this->db->select('station.id, station.station_id, station.user_id, geographical_zone.zone, type_water.water, user.name, result.result, result.status, result.recommendation, result.conclusion');
        $this->db->from('station');
        $this->db->join('type_water', 'station.type_water = type_water.id');
        $this->db->join('geographical_zone', 'station.geographical_zone = geographical_zone.id');
        $this->db->join('user', 'station.user_id = user.id');
        $this->db->join('result', 'station.user_id = result.user_id AND station.station_id = result.station_id');
        return $this->db->get()->result();
    }

    //Main
    public function get_all_station_print($stationid, $userid)
    {
        $this->db->select('station.id, station.station_id, station.user_id, geographical_zone.zone, type_water.water, user.name, result.result, result.status, result.recommendation, result.conclusion');
        $this->db->from('station');
        $this->db->join('type_water', 'station.type_water = type_water.id');
        $this->db->join('geographical_zone', 'station.geographical_zone = geographical_zone.id');
        $this->db->join('user', 'station.user_id = user.id');
        $this->db->join('result', 'station.user_id = result.user_id AND station.station_id = result.station_id');
        $this->db->where('station.station_id', $stationid);
        $this->db->where('station.user_id', $userid);
        return $this->db->get()->result();
    }
    public function get_station_print($stationid, $userid)
    {
        $this->db->select('station.station_id, type_water.water, geographical_zone.zone, user.name');
        $this->db->from('station');
        $this->db->join('type_water', 'station.type_water = type_water.id');
        $this->db->join('geographical_zone', 'station.geographical_zone = geographical_zone.id');
        $this->db->join('user', 'station.user_id = user.id');
        $this->db->where('station.station_id', $stationid);
        $this->db->where('station.user_id', $userid);
        return $this->db->get()->result_array();
    }
    public function get_species_print($stationid, $userid)
    {
        $this->db->select('species.family, species.species, species.abundance');
        $this->db->join('family_biotic', 'species.family = family_biotic.family');
        $this->db->where('species.station_id', $stationid);
        $this->db->where('species.user_id', $userid);
        return $this->db->get('species')->result();
    }
    public function get_family_biotic_dd()
    {
        $this->db->select('*');
        return $this->db->get('family_biotic')->result();
    }

    public function get_value_main_abiotic($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        return $this->db->get('main_abiotic_station')->result();
    }

    public function get_value_index_add($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->from('index_add_station');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        return $this->db->get()->result();
    }

    public function get_station($stationid, $userid)
    {
        $this->db->select('station.station_id, type_water.water, geographical_zone.zone');
        $this->db->from('station');
        $this->db->join('type_water', 'station.type_water = type_water.id');
        $this->db->join('geographical_zone', 'station.geographical_zone = geographical_zone.id');
        $this->db->where('station.station_id', $stationid);
        $this->db->where('station.user_id', $userid);
        return $this->db->get()->result_array();
    }

    public function get_station_user($userid)
    {
        $this->db->select('station.id,station.station_id, type_water.water, geographical_zone.zone, result.result, result.status, result.conclusion, result.recommendation');
        $this->db->from('station');
        $this->db->join('type_water', 'station.type_water = type_water.id');
        $this->db->join('geographical_zone', 'station.geographical_zone = geographical_zone.id');
        $this->db->join('result', 'station.station_id = result.station_id');
        $this->db->where('station.user_id', $userid);
        return $this->db->get()->result();
    }

    public function get_species($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->from('species');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        return $this->db->get()->result();
    }

    public function get_species_user($userid)
    {
        $this->db->select('*');
        $this->db->from('species');
        $this->db->where('user_id', $userid);
        return $this->db->get()->result();
    }

    public function number_of_species($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        $query = $this->db->get('species');
        return $query->num_rows();
    }

    public function totalabundance($stationid, $userid)
    {
        $this->db->select_sum('abundance', 'total');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        $query = $this->db->get('species');
        $total = $query->row_array();
        return $total['total'];
    }

    public function taxa_indicator($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        $this->db->group_by('family');
        $query = $this->db->get('species')->result();
        $total = 0;
        foreach ($query as $row) {
            $total += $row->taxa_indicator;
        }
        return $total;
    }

    public function result($stationid, $userid)
    {
        $this->db->select('main_abiotic_station.bobot_salinity, main_abiotic_station.bobot_temperature, main_abiotic_station.bobot_do, main_abiotic_station.bobot_ph, index_add_station.bobot_similarity, index_add_station.bobot_dominance, index_add_station.bobot_diversity, index_add_station.bobot_total_abundance, index_add_station.bobot_number_species, index_add_station.taxa_indicator, index_add_station.bobot_conductivity, index_add_station.bobot_ratiocn, index_add_station.bobot_turbidity, index_add_station.bobot_sand,index_add_station.bobot_clay, index_add_station.bobot_silt');
        $this->db->join('index_add_station', 'index_add_station.station_id = main_abiotic_station.station_id');
        $this->db->where('main_abiotic_station.station_id', $stationid);
        $this->db->where('main_abiotic_station.user_id', $userid);
        $query = $this->db->get('main_abiotic_station')->result();
        $hasil = 0;
        foreach ($query as $row) {
            $hasil = $row->bobot_salinity + $row->bobot_temperature + $row->bobot_do + $row->bobot_ph + $row->bobot_similarity + $row->bobot_dominance + $row->bobot_diversity + $row->bobot_total_abundance + $row->bobot_number_species + $row->bobot_conductivity + $row->bobot_ratiocn + $row->bobot_turbidity + $row->bobot_sand + $row->bobot_clay + $row->bobot_silt - $row->taxa_indicator;
        }
        return $hasil;
    }

    public function get_all_value($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->join('index_add_station', 'index_add_station.station_id = main_abiotic_station.station_id');
        $this->db->where('main_abiotic_station.station_id', $stationid);
        $this->db->where('main_abiotic_station.user_id', $userid);
        return $this->db->get('main_abiotic_station')->result();
    }

    public function get_station_update($stationid, $userid)
    {
        $this->db->select('*');
        $this->db->where('station_id', $stationid);
        $this->db->where('user_id', $userid);
        return $this->db->get('station')->result();
    }
}
