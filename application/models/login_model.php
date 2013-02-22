<?php 
class Login_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function login_adm ($usuario,$password)
    {
        $this->load->library('session');
        $data["login"]=false;
        if(strlen($usuario)>4 && strlen($password)>4)
        {
            $this->load->database();
            $consulta="SELECT * FROM `sv_login_administrador` WHERE `login_adm_usuario` = '".$usuario."' COLLATE utf8_bin AND `login_adm_password` = '".sha1($password)."'";
            //$data["q"]=$consulta;
            $query=$this->db->query($consulta);
            if ($query->num_rows > 0)
            {
                foreach ($query->result() as $row)
                {
                    if($row->login_adm_status == 1)
                    {
                        $this->session->set_userdata(array("ses_admin_activa"=>true,"ses_admin_id"=>$row->login_adm_id,"ses_admin_nombre"=>$row->login_adm_nombre));
                        $data["login"]=true;
                    }
                }
            }
        }
        echo json_encode($data);
    }
    
}
