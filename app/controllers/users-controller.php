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
                redirect('/');
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
        
        // Recover
        function recover() {
            $this->title = "Recover";
            $this->message = "Recover your account";
            if($_POST['action'] == 'recover') {
                $forgot = new User;
                $test_user = $forgot->find_one_by_email(mysql_escape_string($_POST['email']));
                if($_POST['email'] == $test_user->email) {
                    $forgot_user['email'] = $test_user->email;
                    $forgot_user['name'] = $test_user->name;
                    $forgot_user['location'] = $test_user->location;
                    $forgot_user['password'] = $this->random_password();
                    $this->sendToMail($forgot_user, true);
                    $test_user->password = md5($forgot_user['password']);
                    $test_user->save();
                    $this->message = "An email was sent to your email.";
                }
            }
            pass_var('message', $this->message);
            pass_var('title', $this->title);
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
        
        function sendToMail($data, $recover = false) {
            global $config;
            $to = $data['email'];
            $from = $config['email'];
            $fromweb = $config['base_url'];
            $subject = "Eduroam Registration";
            $message = "Hi, ".$data['name']."\n";
            if(!$recover) {
                $message .= "You're now a eduroam admin.\n";
                $message .= "Thank you for registration.\n";
            }
            else
                $message .= "You asked for an account recovery.\n";
                $message .= "\tYour login information is:\n";
                $message .= "\t\tEmail: ".$data['email']."\n";
                $message .= "\t\tPassword: ".$data['password']."\n";
                $message .= "\nRegards, Eduroam Team\n$fromweb / $from";
            $headers = "From: $from";
            if(mail($to,$subject,$message,$headers))
                return true;
        }
        
        function adduser($data) {
            $test_user = new User;
            $test_user = $test_user->find_one_by_email($data['email']);
            if($test_user) {
                $this->index('Bad email.');
            }
            else {
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
        }

        // Login
        function login() {
            $this->title = "Login";
            if(!$this->message)
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
        
        function info() {
            pass_var('message', 'Here are some informations you might need.');
            pass_var('title', 'Info Page');
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