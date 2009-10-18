<?php
    class institution_usages_controller {
        
        function index() {
            $insts = new Institution();
            $instsu = new Institution_usage();
            pass_var("insts", $insts->find_all());
            pass_var("instsu", $instsu->find_all());
            pass_var('title', "Institution Usage Index");
            pass_var('message', "List of Institution Usage");
        }
        
        function xml() {
            global $runtime;
            $runtime['format'] = 'xml';
            $ins = new Institution();
            $ius = new Institution_usage();
            $ins = $ins->find_all();
            $ius = $ius->find_all();
            //Map all
            foreach($ins as $in) {
                foreach($ius as $is) {
                    if($in->data['id'] == $is->data['institutionid']) {
                        $in->usage = $is->data;
                    }
                }
            }
            
            pass_var("ins", $ins);
            load_view('xml');
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $i = new Institution();
            $i = $i->find_all();
            $insts = array();
            foreach($i as $inst) {
                $insts[$inst->id] = $inst->org_name;
            }
            
            if($_POST["action"] == "addinstusage") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addinstusage"]);
                $data["date"] = date("Y-m-d");
                $instu = new Institution_usage($data);
                $instu->save();
            }
            pass_var("insts",$insts);
            pass_var('title', "Add Institution Usage");
            pass_var('message', "Add Institution Usage");
        }
        
        function delete() {
            global $runtime;
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $instu = new Institution_usage();
            $instu = $instu->find_one_by_id($runtime['ident']);
            $instu->delete();
            redirect('institution_usages/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $i = new Institution();
            $i = $i->find_all();
            $insts = array();
            foreach($i as $inst) {
                $insts[$inst->id] = $inst->org_name;
            }
            
            if($_POST["action"] == "updateinstusage") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updateinstusage"]);
                $data["date"] = date("Y-m-d");
                $instu = new Institution_usage();
                $instu = $instu->find_one_by_id($runtime['ident']);
                $instu->data = $data;
                $instu->dirty = array(
                                    'institutionid',
                                    'local_sn',
                                    'national_sn',
                                    'international_sn',
                                    'date'
                                );
                $instu->save();
                $instu = $instu->find_one_by_id($runtime['ident']);
                pass_var("instu", $instu->data);
            }
            else {
                global $runtime;
                $instu = new Institution_usage();
                $instu = $instu->find_one_by_id($runtime['ident']);
                pass_var("instu", $instu->data);
            }
            
            pass_var("insts",$insts);
            pass_var('title', "Edit Institution Usage");
            pass_var('message', "Edit Institution Usage");
        }
    }
?>