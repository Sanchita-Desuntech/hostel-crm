<?php 
if (! defined('BASEPATH')) {    
    exit('No direct script access allowed');
}

/**
 * Class Currency_Model
 * 
 * @author Joy Kumar Bera<joy.desuntech@gmail.com>
 */
class Currency_Model extends CI_Model
{
    /**
     * Add currency
     * 
     * @param array $data
     * @return bool
     */
    public function addCurrency($data)
    {
        return $this->db->insert('tbl_currency_master', [
            'currency_name' => $data['currency_name'],
            'currency_code' => $data['currency_code'],
            'currency_value' => $data['currency_value_wrt_inr'],
            'respect_to'    => 'INR'
        ]);
    }

    /**
     * Update currency
     * 
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function updateCurrency($data, $id)
    {
        return $this->db->update('tbl_currency_master', [
            'currency_name' => $data['currency_name'],
            'currency_code' => $data['currency_code'],
            'currency_value' => $data['currency_value_wrt_inr']
        ], ['id' => $id]);
    }

    /**
     * Delete a currency
     * 
     * @param int $id
     * @return bool
     */
    public function deleteCurrency($id)
    {
        $this->db->delete('tbl_currency_master', ['id' => $id]);
    }

    /**
     * Get currency list
     * 
     * @return array
     */
    public function getCurrencyList()
    {
        $sql = "SELECT * FROM tbl_currency_master";

        return $this->db->query($sql)->result();
    }

    /**
     * Find currency by id
     * 
     * @param int $id
     * @return array
     */
    public function findCurrencyById($id)
    {
        $sql = "SELECT * FROM tbl_currency_master WHERE id = ?";

        return $this->db->query($sql, [$id])->row_array();
    }
}
