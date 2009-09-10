<?php
    class mon_logs_controller {
        
        function index() {
            $m = new Mon_log();
            pass_var("m", $m->find_all());
            pass_var('title', "Monitoring Logs Index");
            pass_var('message', "List of Monitoring Logs");
        }
        
        function add() {          
            if($_POST["action"] == "addmonlog") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonlog"]);
                $data["ts"] = date("Y-m-d");
                $m = new Mon_log($data);
                $m->save();
            }
            pass_var('title', "Add a Monitoring Log");
            pass_var('message', "Add a Monitoring Log");
        }
        
        function delete() {
            global $runtime;
            $i = new Mon_log();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_logs/');
        }
        
        function edit() {         
            if($_POST["action"] == "updatemonlog") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonlog"]);
                $data["ts"] = date("Y-m-d");
                $m = new Mon_log();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'tested_realm',
                                    'tested_country',
                                    'realmid',
                                    'mon_type_sel',
                                    'last_mon_logid',
                                    'ts'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monl", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_log();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monl", $m->data);
            }
            
            pass_var('title', "Edit Monitoring Log");
            pass_var('message', "Edit Monitoring Log");
        }
    }
?>