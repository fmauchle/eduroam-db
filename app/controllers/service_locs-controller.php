<?php
    class service_locs_controller {
        
        function index() {
            $s = new Service_loc();
            pass_var("s", $s->find_all());
            pass_var('title', "Service Locations Index");
            pass_var('message', "List of Service Locations");
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "addservice") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updaterealm"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $s = new Service_loc();
                $s = $s->find_one_by_id($runtime['ident']);
                $s->data = $data;
                $s->dirty = array(
                                    'institutionid',
                                    'longitude',
                                    'latitude',
                                    'stage',
                                    'loc_name',
                                    'address_city',
                                    'contact_name',
                                    'contact_email',
                                    'contact_phone',
                                    'SSID',
                                    'enc_level',
                                    'port_restrict',
                                    'transp_proxy',
                                    'IPv6',
                                    'NAT',
                                    'HS20',
                                    'AP_no',
                                    'wired_no',
                                    'info_URL',
                                    'ts'
                                );
                $s->save();
                $s = $s->find_one_by_id($runtime['ident']);
                pass_var("service", $s->data);
            }
            else {
                global $runtime;
                $s = new Service_loc();
                $s = $s->find_one_by_id($runtime['ident']);
                pass_var("service", $s->data);
            }
            
            $i = new Institution();
            $i = $i->find_all();
            $insts = array();
            foreach($i as $inst) {
                $insts[$inst->id] = $inst->org_name;
            }
            
            pass_var('ins', $insts);
            pass_var('title', "Edit Realm");
            pass_var('message', "Edit Realms");
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "addservice") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addservice"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $s = new Service_loc($data);
                $s->save();
            }
            $i = new Institution();
            $i = $i->find_all();
            $insts = array();
            foreach($i as $inst) {
                $insts[$inst->id] = $inst->org_name;
            }
            
            pass_var('ins', $insts);
            pass_var('title', "Add Realm");
            pass_var('message', "Add Realm");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $s = new Service_loc();
            $s = $s->find_one_by_id($runtime['ident']);
            $s->delete();
            redirect('service_locs/');
        }
        
    }
?>