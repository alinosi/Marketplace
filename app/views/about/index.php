 <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f5f5f5;
    }
    
    .profile-container {
      margin-left: auto;
      margin-right: auto;
      background-color: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      width: 400px;
      position: relative;
      border: 1px solid #eaeaea;
    }
    
    .header {
      position: relative;
      margin-bottom: 30px;
    }
    
    .profile-image {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid white;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      margin: 0 auto;
      display: block;
    }
    
    .profile-details {
      margin-top: 20px;
    }
    
    .detail-row {
      display: flex;
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .detail-row:last-child {
      border-bottom: none;
    }
    
    .label {
      font-weight: 600;
      width: 100px;
      color: #333;
    }
    
    .value {
      flex: 1;
      color: #555;
    }
    
    a {
      text-decoration: none;
      color: #000;
      font-weight: 500;
      transition: all 0.3s ease;
      border-bottom: 1px solid transparent;
    }
    
    a:hover {
      border-bottom: 1px solid #000;
    }
    
    .name-heading {
      text-align: center;
      margin: 25px 0 15px;
      font-size: 22px;
      color: #000;
      font-weight: 600;
    }
    
    .decoration {
      position: absolute;
      width: 100%;
      height: 70px;
      background-color: #000;
      top: 0;
      left: 0;
      border-radius: 20px 20px 0 0;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="decoration"></div>
    <div class="header">
      <img src="<?= BASEURL ?> /img/saya.jpg" alt="Profile Photo" class="profile-image">
      <h2 class="name-heading">M. Thoriqul Fadli</h2>
    </div>
    
    <div class="profile-details">
      <div class="detail-row">
        <div class="label">NIM</div>
        <div class="value">09031282328037</div>
      </div>
      <div class="detail-row">
        <div class="label">Jurusan</div>
        <div class="value">Sistem Informasi</div>
      </div>
      <div class="detail-row">
        <div class="label">Instagram</div>
        <div class="value"><a href="https://instagram.com/thor__u" target="_blank">@thor__u</a></div>
      </div>
    </div>
  </div>
</body>