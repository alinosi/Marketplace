<?php use app\core\Flasher as Flasher;?>
   <style>
        :root {
            --primary-black: #121212;
            --secondary-black: #222222;
            --light-gray: #f8f8f8;
            --medium-gray: #e0e0e0;
            --text-gray: #757575;
        }
        
        body {
            background-color: var(--light-gray);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--primary-black);
            padding-bottom: 40px;
        }
        
        .profile-container {
            margin-top: 80px;
            padding: 0 20px;
            max-width: 700px;
        }
        
        .card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: none;
        }
        
        .card-header {
            background-color: var(--primary-black);
            color: white;
            padding: 25px 30px;
            border-bottom: none;
        }
        
        .card-title {
            margin: 0;
            font-weight: 600;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
        }
        
        .card-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--secondary-black);
            display: block;
        }
        
        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 2px solid var(--medium-gray);
            padding: 10px 15px;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
            outline: none;
        }
        
        textarea.form-control {
            height: 120px;
            resize: none;
        }
        
        .btn-primary {
            background-color: var(--primary-black);
            color: white;
            border: none;
            border-radius: 12px;
            height: 50px;
            font-size: 1rem;
            font-weight: 600;
            padding: 0 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-primary:hover {
            background-color: #000;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        
        .flash-message {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .flash-success {
            background-color: rgba(0, 0, 0, 0.1);
            color: var(--primary-black);
        }
        
        .flash-error {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        
        @media (max-width: 576px) {
            .profile-container {
                margin-top: 40px;
            }
            
            .card-body {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container profile-container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $data['judul'] ?></h1>
            </div>
            <div class="card-body">
                <div class="flash-container">
                    <?php Flasher::flash()?>
                </div>
                <form action="<?= BASEURL ?>/profile/update" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['user']['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $data['user']['phone_number'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" required><?= $data['user']['address'] ?></textarea>
                    </div>
                    <button type="submit" class="btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>