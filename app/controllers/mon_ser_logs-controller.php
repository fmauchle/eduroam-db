<?php
    class mon_ser_logs_controller {
        
        function index() {
            $realms = new Realm();
            $mls = new Mon_ser_log();
            $mss = new Mon_ser();
            pass_var("realms", $realms->find_all());
            pass_var("mls", $mls->find_all());
            pass_var("mss", $mss->find_all());
            pass_var('title', "Monitored servers log index");
            pass_var('message', "List of monitored servers log");
        }
        
        function add() {
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $ms = new Mon_ser();
            $ms = $ms->find_all();
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            $mons = array();
            foreach($ms as $mon) {
                $mons[$mon->id] = $mon->name;
            }
            
            if($_POST["action"] == "addmonserlog") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonserlog"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_ser_log($data);
                $m->save();
            }
            pass_var("mons",$mons);
            pass_var("mls",$mls);
            pass_var('title', "Add a monitored server log");
            pass_var('message', "Add a monitored server log");
        }
        
        function delete() {
            global $runtime;
            $i = new Mon_ser_log();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_ser_logs/');
        }
        
        function edit() {
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $ms = new Mon_ser();
            $ms = $ms->find_all();
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            $mons = array();
            foreach($ms as $mon) {
                $mons[$mon->id] = $mon->name;
            }
            
            if($_POST["action"] == "updatemonserlog") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonserlog"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_ser_log();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'mon_serid',
                                    'mon_type',
                                    'status',
                                    'a_resp_time',
                                    'r_resp_time',
                                    'mon_logid',
                                    'ts'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("mons", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_ser_log();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("mons", $m->data);
            }
            
            pass_var("mls",$mls);
            pass_var("ms",$mons);
            pass_var('title', "Edit monitored server log");
            pass_var('message', "Edit monitored server log");
        }
    }
?>