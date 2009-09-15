<?php
    class mon_logs_controller {
        
        function index() {
            $m = new Mon_log();
            pass_var("m", $m->find_all());
            pass_var('title', "Monitoring Logs Index");
            pass_var('message', "List of Monitoring Logs");
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "addmonlog") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonlog"]);
                $data['ts_scheduled'] .= date('P');
                $data['ts_start'] .= date('P');
                $data['ts_end'] .= date('P');
                $m = new Mon_log($data);
                $m->save();
            }
            pass_var('title', "Add a Monitoring Log");
            pass_var('message', "Add a Monitoring Log");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Mon_log();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_logs/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            if($_POST["action"] == "updatemonlog") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonlog"]);
                $m = new Mon_log();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'scheduled',
                                    'ts_scheduled',
                                    'ts_start',
                                    'ts_end',
                                    'type',
                                    'status'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                // Small hacks to get the date usable
                $m->data['ts_scheduled'] = substr($m->data['ts_scheduled'], 0, 16);
                $m->data['ts_start'] = substr($m->data['ts_start'], 0, 16);
                $m->data['ts_end'] = substr($m->data['ts_end'], 0, 16);
                pass_var("monl", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_log();
                $m = $m->find_one_by_id($runtime['ident']);
                // Small hacks to get the date usable
                $m->data['ts_scheduled'] = substr($m->data['ts_scheduled'], 0, 16);
                $m->data['ts_start'] = substr($m->data['ts_start'], 0, 16);
                $m->data['ts_end'] = substr($m->data['ts_end'], 0, 16);
                pass_var("monl", $m->data);
            }
            
            pass_var('title', "Edit Monitoring Log");
            pass_var('message', "Edit Monitoring Log");
        }
    }
?>