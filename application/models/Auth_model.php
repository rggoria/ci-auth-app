<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct();
        // Database library
        $this->load->database();
    }

    // Create User
    public function create_user($data)
    {
        // Create new data to the database
        $this->db->insert('users', $data);
    }

    // Login User
    public function read_user($data)
    {
        $this->db->select('*')
            ->from('users')
            ->where("(users.username = '{$data['login']}' OR users.email = '{$data['login']}')");
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            // No user found with the provided email/username
            return 'no_user';
        } else {
            $user = $query->row();
            // Check if the password matches
            if ($user->password === $data['password']) {
                // Password matches, return user data
                return $query->row();
            } else {
                // Password does not match
                return 'wrong_password';
            }
        }
    }

    public function read_profile($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        if ($query) {
            $result = $query->row();
            return $result;
        } else {
            return NULL;
        }
    }

    // Update User (Profile Module [Update])
    public function update_user($id, $data)
    {
        $this->db->update('table_user', $data, array('user_id' => $id));
    }

    // User Check Balance (User Module [Add Balance])
    public function user_check_balance($data)
    {
        extract($data);
        $this->db->select('user_balance')
            ->from('table_user')
            ->where('user_username', $user_username);
        $query = $this->db->get();
        if ($query->row()) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    // User Update Balance (User Module [Add Balance])
    public function user_update_balance($order)
    {
        extract($order);
        $this->db->where(array(
            'user_username' => $user_username
        ));
        $this->db->update('table_user', $order);
    }

    // User Check Balance (User Module [Add Balance])
    public function user_current_balance($username)
    {
        $this->db->select('user_balance')
            ->from('table_user')
            ->where('user_username', $username);
        $query = $this->db->get();
        if ($query->row()) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    // Admin User Count (Admin Module [User Count])
    public function admin_user_count()
    {
        $query = $this->db->from('table_user')->get();
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            return $query->num_rows;
        };
    }

    // Admin User List (Admin Module [User List])
    public function admin_user_list()
    {
        $query = $this->db->from('table_user')->get();
        if ($query->result() == NULL) {
            return NULL;
        } else {
            return $query->result();
        };
    }

    // Update User (Admin Module [User List])
    public function admin_update_user($data)
    {
        extract($data);
        $this->db->where(array(
            'user_username' => $user_username
        ));
        $this->db->update('table_user', $data);
    }

    // Admin Disable User (Admin Module [User List])
    public function admin_disable_user($id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('table_user', array('user_status' => 'DISABLE'));
    }

    // Admin Activate User (Admin Module [User List])
    public function admin_activate_user($id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('table_user', array('user_status' => 'USER'));
    }

    // Get User Exist (Forget Password [Step 1 Verify Email])
    public function check_user_exist($email)
    {
        $query = $this->db->get_where('table_user', array('user_email' => $email));
        if ($query->row()) {
            $result = $query->row();
            return $result;
        } else {
            return NULL;
        }
    }

    // Update User (Profile Module [Update])
    public function forget_update_user($data)
    {
        extract($data);
        $this->db->where('user_email', $user_email);
        $this->db->update('table_user', array('user_password' => $user_password));
    }

    // Upload Image (Profile Module [Upload Image])
    public function upload_image($data)
    {
        extract($data);
        $this->db->where(array(
            'user_username' => $user_username
        ));
        $this->db->update('table_user', $data);
    }

    // Upload Password (Profile Module [Update Password])
    public function update_password($data)
    {
        extract($data);
        $this->db->where(array(
            'user_id' => $user_id
        ));
        $this->db->update('table_user', $data);
    }
}
