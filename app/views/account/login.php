<?php use app\core\Flasher as Flasher;?>
       <style>
        :root {
            --primary-color: black;
            --primary-hover: #e63e00;
            --text-color: #000000;
            --background-light: #f5f5f5;
            --input-border: #e0e0e0;
            --input-focus: #ffd1c2;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: white;
            height: 100vh;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
        }
        
        .container {
            max-width: 430px;
            width: 100%;
            padding: 0 20px;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(255, 69, 0, 0.2);
        }
        
        .card-header {
            background: #000000;
            padding: 30px 0;
            text-align: center;
            position: relative;
        }
        
        .card-header h2 {
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }
        
        .login-icon {
            background: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }
        
        .login-icon i {
            color: #ff4500;
            font-size: 32px;
        }
        
        .card-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 15px;
            color: #555;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        
        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid var(--input-border);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: var(--background-light);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--input-focus);
            outline: none;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
        }
        
        .btn-primary {
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: #000000;
        }
        
        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .flash-container {
            margin-bottom: 20px;
        }
        
        .flash-message {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        
        .flash-message i {
            margin-right: 10px;
        }
        
        .flash-success {
            background-color: rgba(255, 69, 0, 0.1);
            color: #ff4500;
        }
        
        .flash-error {
            background-color: rgba(0, 0, 0, 0.1);
            color: #ffffff;
        }
        
        @media (max-width: 480px) {
            .card-body {
                padding: 30px 20px;
            }
            
            .login-icon {
                width: 60px;
                height: 60px;
            }
            
            .card-header h2 {
                font-size: 24px;
            }
        }
    </style>
<body>
    <br>
    <div class="container">
        <div class="login-card">
            <div class="card-header">
                <div class="login-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <div class="flash-container">
                    <?php Flasher::flash()?>
                </div>
                <form action="<?= BASEURL; ?>/Login/authenticate" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary" name="submit">
                        Login
                    </button>
                    <div class="register-link">
                        Don't have an account? <a href="<?= BASEURL; ?>/Register">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>