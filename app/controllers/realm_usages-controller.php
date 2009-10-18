<?php
    class realm_usages_controller {
        
        function index() {
            $realms = new Realm();
            $rus = new Realm_usage();
            pass_var("realms", $realms->find_all());
            pass_var("rus", $rus->find_all());
            pass_var('title', "Realm Usage Index");
            pass_var('message', "List of Realm Usage");
        }
        
        function xml() {
            global $runtime;
            $runtime['format'] = 'xml';
            $rus = new Realm_usage();
            $realms = new Realm();
            $rus = $rus->find_all();
            $realms = $realms->find_all();
            //Map all
            foreach($realms as $r) {
                foreach($rus as $ru) {
                    if($ru->data['realmid'] == $r->data['id']) {
                        $t[]->data = $ru->data;
                    }
                }
                $r->usage = $t; $t = null;
            }
            pass_var("realms", $realms);
            load_view('xml');
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "addrealmusage") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addrealmusage"]);
                $data["date"] = date("Y-m-d");
                $r = new Realm_usage($data);
                $r->save();
            }
            pass_var("rids",$rids);
            pass_var('title', "Add Realm Usage");
            pass_var('message', "Add Realm Usage");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Realm_usage();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('realm_usages/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "updaterealmusage") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updaterealmusage"]);
                $data["date"] = date("Y-m-d");
                $r = new Realm_usage();
                $r = $r->find_one_by_id($runtime['ident']);
                $r->data = $data;
                $r->dirty = array(
                                    'realmid',
                                    'national_sn',
                                    'international_sn',
                                    'date'
                                );
                $r->save();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realmd", $r->data);
            }
            else {
                global $runtime;
                $r = new Realm_usage();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realmd", $r->data);
            }
            
            pass_var("rids",$rids);
            pass_var('title', "Edit Realm Usage");
            pass_var('message', "Edit Realm Usage");
        }
    }
?>