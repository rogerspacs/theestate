<?php  
class Crud_Operations extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct(){
        parent::__construct();
    }

    // public function get_last_ten_entries()
    // {
    //         $query = $this->db->get('entries', 10);
    //         return $query->result();
    // }

    public function registration_operation($data)
    {
        return $this->db->insert('user_tb', $data);
    }

    public function login_operation($data){
        $this->db->select("*");
        $this->db->from("user_tb");
        $this->db->where("email", $data["email"]);
        $this->db->where("password", $data["password"]);

        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }
    }

    // public function update_entry()
    // {
    //         $this->title    = $_POST['title'];
    //         $this->content  = $_POST['content'];
    //         $this->date     = time();

    //         $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

}
?>