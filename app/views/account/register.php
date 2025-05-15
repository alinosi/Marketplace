<?php use app\core\Flasher as Flasher;?>
     <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 40px;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn-register {
            width: 100%;
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-register:hover {
            background-color: #e63e00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #111;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #333;
            text-decoration: underline;
        }

        /* Form columns for mobile responsiveness */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .form-col {
            flex: 1 0 100%;
            padding: 0 10px;
        }

        /* On larger screens, make columns side by side */
        @media (min-width: 768px) {
            .form-col-6 {
                flex: 0 0 50%;
            }
        }

        /* For password visibility toggle */
        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            background: none;
            border: none;
            font-size: 0.9rem;
        }

        /* Alert/Flash message styling */
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
        }

        /* Decoration */
        .form-decoration {
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.6;
        }

        .form-decoration-1 {
            top: -100px;
            right: -100px;
        }

        .form-decoration-2 {
            bottom: -100px;
            left: -100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Create Account</h1>
        
        <!-- Flash Messages -->
        <?php Flasher::flash()?>
        
        <form action="<?= BASEURL; ?>/Register/store" method="POST">
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col form-col-6">
                    <div class="form-group password-field">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="form-col form-col-6">
                    <div class="form-group password-field">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-col">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn-register" name="submit">
                Create Account
            </button>
            
            <p class="login-link">
                Already have an account? <a href="<?= BASEURL; ?>/Login">Sign in</a>
            </p>
        </form>
    </div>

    <!-- Make sure Font Awesome is included in your template -->
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const icon = event.currentTarget.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Optional: Password match validation
        document.querySelector('form').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
        });
    </script>
</body>