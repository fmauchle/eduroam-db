<?php
    class users_controller {
        
        function index($message = null) {
            $this->session = new Session;
            $this->title = "Login";
            $this->message = "Welcome";
            if($message)
                $this->message = $message;
            
            if($_POST['action'] == 'login') {
                $this->auth($_POST);
            }
            
            if($this->session->get('nickname')) {
                redirect('admin/');
            }
            else {
                $this->message .= " Please login.";
                pass_var('message', $this->message);
                pass_var('title', $this->title);
                load_view("login.php");
            }

            pass_var('message', $this->message);
            pass_var('title', $this->title);
        }

        // Register
        function register() {
            $this->title = "Register";
            $this->message = "Register";
            pass_var('message', $this->message);
            pass_var('title', $this->title);
            if($_POST['action'] == 'register') {
                $this->adduser($_POST);
            }
        }
        
        function random_password()
        {
            $len = 8;
            $mixed_case = true;
            $a = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";
            if(!$mixed_case)
                $a = strtolower($a);
            $result = "";
            for($i = 0; $i < $len; $i++)
                $result .= $a[rand(0, strlen($a))];
            return $result;
        }
        
        function sendToMail($data) {
            $to = $data['email'];
            $from = "contact@eduroam.ro";
            $fromweb = "http://eduroam.ro";
            $subject = "Eduroam Registration";
            $message = "You're now a eduroam admin.\n";
                $message .= "Thank you for registration ".$data['name']."\n";
                $message .= "\tYour login information is:\n";
                $message .= "\t\tEmail: ".$data['email']."\n";
                $message .= "\t\tPassword: ".$data['password']."\n";
                $message .= "\nRegards, Eduroam Team\n$fromweb / $from";
            $headers = "From: $from";
            if(mail($to,$subject,$message,$headers))
                return true;
        }
        
        function adduser($data) {
            $new_user['email'] = $data['email'];
            $new_user['name'] = $data['name'];
            $new_user['location'] = $data['location'];
            $new_user['password'] = $this->random_password();
            $this->sendToMail($new_user);
            $new_user['password'] = md5($new_user['password']);
            $this->user = new User($new_user);
            $this->user->save();
            $this->index("Registration successful. Check your email.");
        }

        // Login
        function login() {
            $this->title = "Login";
            $this->message = "Login";
            pass_var('message', $this->message);
            pass_var('title', $this->title);
            if($_POST['action'] == 'login') {
                $this->auth($_POST);
            }
        }
        
        function auth($data = null){
            $this->session = new Session;
            $auth = new User;
            $test_user = $auth->find_one_by_email($data['email']);
            if(md5($data['password']) == $test_user->password) {
                $this->session->set('id',$test_user->id);
                $this->session->set('email',$test_user->email);
                $this->session->set('name',$test_user->name);
                $this->session->set('location',$test_user->location);
                redirect('users/prefs');
            } else {
                $this->title = "Authentication failed";
                $this->message = "The email or password was wrong!";
                pass_var('message', $this->message);
                pass_var('title', $this->title);
                redirect("users/login");
            }
        }
        
        function changepass($id, $pass) {
            $temp = new User;
            $chpass = $temp->find_one($id);
            $chpass->password = md5($pass);
            $chpass->save();
            return(" Your profile was updated.");
        }
        
        function prefs() {
            $this->session = new Session;
            $message = null;
            // Die if no login
            if(!$this->session->get('email') && !$this->session->get('id'))
                redirect('');
            if($_POST['action'] == 'changepass')
                $message = $this->changepass($this->session->get('id'), $_POST['newpassword']);
                
            $this->title = "User preferences";
            
            $this->message = "Hi ".$this->session->get('name').$message;

            pass_var('name', $this->session->get('name'));
            pass_var('email', $this->session->get('email'));
            pass_var('message', $this->message);
            pass_var('title', $this->title);
        }
        
        // Logout
        function logout() {
            $this->session = new Session;
            $this->session->destroy();
            $this->message = "Good buy!";
            pass_var('message', $this->message);
            redirect('');
        }
        
    }
?>