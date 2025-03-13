<?php use app\core\Flasher as Flasher;?>
<head>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .profile-container {
            margin-top: 50px; /* Margin from the top */
        }
        .card {
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
</head>
<body>
    <div class="container profile-container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center"><?= $data['judul'] ?></h1>
                <div class="col-6">
                    <?php Flasher::flash()?>
                </div>
                <form action="<?= BASEURL ?>/profile/update" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['user']['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $data['user']['phone_number'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" required><?= $data['user']['address'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>
