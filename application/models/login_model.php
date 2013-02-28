<?php 
class Login_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function login_admin ($usuario,$password)
    {
        $this->load->library('session');
        $data["login"]=false;
        if(strlen($usuario)>4 && strlen($password)>4)
        {
            $this->load->database();
            $consulta="SELECT 'login_adm_usuario, login_adm_nombre, login_adm_password,  login_adm_status, login_adm_tipo' FROM 'sv_login_administrador' INNER JOIN 'sv_login_adm_tipo' ON 'sv_login_administrador.login_adm_tipo_id= sv_login_adm_tipo.login_adm_tipo_id' where `login_adm_usuario` = '".$usuario."' COLLATE utf8_bin AND `login_adm_password` = '".sha1($password)."' ";
            //$data["q"]=$consulta;
            $query=$this->db->query($consulta);
            if ($query->num_rows > 0)
            {
                foreach ($query->result() as $row)
                {
                    if($row->login_adm_status == 1)
                    {
                        $this->session->set_userdata(array("ses_admin_activa"=>true,"ses_admin_id"=>$row->login_adm_id,"ses_admin_nombre"=>$row->login_adm_nombre,"ses_admin_usuario"=>$row->login_adm_usuario,"ses_admin_status"=>$row->login_adm_status,"ses_admin_tipo"=>$row->login_adm_tipo));
                        $data["login"]=true;
                    }
                }
            }
        }
        echo json_encode($data);
    }
    
}
