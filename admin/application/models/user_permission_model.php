<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class user_permission_model extends CI_Model
{
    /**
     * Get available module permissions
     * 
     * @return array
     */
    public function getSystemModulePermissions()
    {
        $sql = "SELECT id AS module_id, name FROM tbl_module ORDER BY module_order ASC";
        $modules = $this->db->query($sql)->result();

        foreach($modules as $module) {
            // find actions
            $sql = "SELECT id AS action_id, action_name 
            FROM tbl_module_action
            WHERE module_id = ?";

            $module->actions = $this->db->query($sql, [$module->module_id])->result_array();
        }

        return $modules;
    }

    /**
     * Get user module permissions
     * 
     * @param string $user_code
     * @return array
     */
    public function getUserModuleActionIds($user_code)
    {
        $sql = "SELECT action_id FROM tbl_user_module_permission
        WHERE user_id = (
            SELECT id FROM tbl_users WHERE user_code = ?
        )";

        $actionIds = $this->db->query($sql, [$user_code])->result_array();

        return array_column($actionIds, 'action_id');
    }

    /**
     * Get usr permissions
     * 
     * @param int $user_id
     * @param int $user_role
     * @return array
     */
    public function getUserPermission($user_id, $user_role=0)
    {
        if($user_role == USER_ADMIN) {
            $sql = "SELECT TRIM(LOWER(CONCAT(tbl_module_action.action_name, '.', tbl_module.name))) AS name
            FROM tbl_module_action
            INNER JOIN tbl_module ON tbl_module.id = tbl_module_action.module_id";

            $result = $this->db->query($sql)->result_array();
        } else {
            // find all persmissions respect to user
            $sql = "SELECT TRIM(LOWER(CONCAT(tbl_module_action.action_name, '.', tbl_module.name))) AS name
            FROM tbl_module_action
            INNER JOIN tbl_module ON tbl_module.id = tbl_module_action.module_id
            INNER JOIN tbl_user_module_permission ON tbl_user_module_permission.action_id = tbl_module_action.id
            WHERE tbl_user_module_permission.user_id = ?";

            $result = $this->db->query($sql, [$user_id])->result_array();
        }

        return array_column($result, 'name');
    }

}