<?php
    class realms_controller {
        
        function index() {
            $r = new Realm();
            pass_var("r", $r->find_all());
            pass_var('title', "Realms Index");
            pass_var('message', "List of Realms");
        }
        
        function xml() {
            global $runtime;
            $runtime['format'] = 'xml';
            $i = new Realm();
            pass_var("realms", $i->find_all());
            load_view('xml');
        }
        
        function get($id) {
            $r = new Realm();
            return $r->find_one_by_id($id);
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "updaterealm") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updaterealm"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $r = new Realm();
                $r = $r->find_one_by_id($runtime['ident']);
                $r->data = $data;
                $r->dirty = array(
                                    'country',
                                    'roid',
                                    'stype',
                                    'stage',
                                    'org_name',
                                    'address_street',
                                    'address_city',
                                    'contact_name',
                                    'contact_email',
                                    'contact_phone',
                                    'contact_type',
                                    'contact_privacy',
                                    'info_URL',
                                    'policy_URL',
                                    'ts'
                                );
                $r->save();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realm", $r->data);
            }
            else {
                global $runtime;
                $r = new Realm();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realm", $r->data);
            }
            
            pass_var('title', "Edit Realm");
            pass_var('message', "Edit Realms");
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "addrealm") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addrealm"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $r = new Realm($data);
                $r->save();
            }
            pass_var('title', "Add Realm");
            pass_var('message', "Add Realm");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Realm();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('realms/');
        }
        
    }
?>