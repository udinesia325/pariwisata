<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\{LoginModel, KategoriModel, MakananModel,AdminModel};

class Login extends BaseController
{
    public $login;
    public $admin;
    public $kategori;
    public $makanan;
    public function __construct()
    {
        $this->login = new LoginModel();
        $this->admin = new AdminModel();
        $this->kategori = new KategoriModel();
        $this->makanan = new MakananModel();
    }
    public function index()
    {
        //
        return view("login/index");
    }
    public function process()
    {
        $form = $this->request->getVar();
        $username = $form["username"];
        $password = $form["password"];
        $user = $this->login->db->query("select * from login_user where username = '$username' and password = '$password' ")->getResultArray();

        if (count($user) > 0) {
            session()->set("id_user", $user[0]["id_user"]);
            session()->set("username", $user[0]["fullname"]);
            return redirect()->to(base_url('/'));
        } else {

            return redirect()->to(base_url('/login'));
        }
    }
    public function setting($id_user)
    {
        $data = [
            'user' => $this->login->db->query("SELECT * FROM login_user WHERE id_user = '$id_user'")->getResultArray(),
            'kategori' => $this->kategori->findAll(),
            'makanan' => $this->makanan->findAll()
        ];
        // dd($data[    'user']);
        return view('login/setting', $data);
    }
    public function update()
    {
        $this->login->save($this->request->getVar());
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
    public function register()
    {
        $data["valid"] = \Config\Services::validation();
        return view("login/register", $data);
    }
    public function register_process()
    {
        if (!$this->validate([
            "username" => [
                "rules" => "is_unique[login_user.fullname]|required",
                "errors" => [
                    "is_unique" => "Nama Sudah Terdaftar !",
                    "required" => "Nama tidak boleh kosong !",
                ]
            ]

        ])) {
            return redirect()->to(base_url('/register'))->withInput();
        }
        $this->login->save($this->request->getVar());
        return redirect()->to(base_url('/'));
    }
    public function admin()
    {
        return view("login/admin");
    }
    public function admin_process()
    {
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $login = $this->admin->db->table("login_admin")->where("username",$username)->where("password",$password)->get()->getResultArray()[0];
        session()->set("id_admin",$login["id_admin"]);
        session()->set("username",$login["username"]);
        return redirect()->to(base_url('admin/makanan'));
    }
    public function adminRegister()
    {
        return view("login/adminRegister");
    }
    public function adminRegisterProcess()
    {
        $this->admin->save($this->request->getVar());
        return redirect()->to(base_url('admin/login'));
        
    }
}
