<?php
session_start();

require_once ('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];

  $sql = "SELECT * FROM siswa WHERE nis='$nis' AND nisn='$nisn'";
  $result = $koneksi->query($sql);

  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['user'] = [
      'id' => $data['id'],
      'nama' => $data['nama'],
      'nis' => $data['nis'],
      'nisn' => $data['nisn'],
      'alamat' => $data['alamat'],
      'tgl_lahir' => $data['tgl_lahir'],
    ];
    $_SESSION['role'] = 'siswa';
    $_SESSION['isLogin'] = true;


    header("location: dashboard.php");
  } else {
    echo "<script>alert('Login Siswa Gagal')</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORM LOG IN SESSION</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #000;
    }

    section {
      position: absolute;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2px;
      flex-wrap: wrap;
      overflow: hidden;
    }

    section::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(#000, #0f0, #000);
      animation: animate 5s linear infinite;
    }

    @keyframes animate {
      0% {
        transform: translateY(-100%);
      }

      100% {
        transform: translateY(100%);
      }
    }

    section span {
      position: relative;
      display: block;
      width: calc(6.25vw - 2px);
      height: calc(6.25vw - 2px);
      background: #181818;
      z-index: 2;
      transition: 1.5s;
    }

    section span:hover {
      background: #0f0;
      transition: 0s;
    }

    section .signin {
      position: absolute;
      width: 400px;
      background: #222;
      z-index: 1000;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      border-radius: 4px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 9);
    }

    section .signin .content {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 40px;
    }

    section .signin .content h2 {
      font-size: 2em;
      color: #0f0;
      text-transform: uppercase;
    }

    section .signin .content .form {
      width: 100%;
      display: flex;
      flex-direction: column;
      /* gap: 2px; */
    }

    section .signin .content .form .inputBox {
      position: relative;
      width: 100%;
    }

    section .signin .content .form .inputBox input {
      position: relative;
      width: 100%;
      background: #333;
      border: none;
      outline: none;
      padding: 25px 10px 7.5px;
      border-radius: 4px;
      color: #fff;
      font-weight: 500;
      font-size: 1em;
    }

    section .signin .content .form .inputBox button {
      position: relative;
      width: 100%;
      background: #333;
      border: none;
      outline: none;
      padding: 25px 10px 7.5px;
      border-radius: 4px;
      color: #fff;
      font-weight: 500;
      font-size: 1em;

    }

    section .signin .content .form .inputBox label {
      position: absolute;
      left: 0;
      padding: 15px 10px;
      font-style: normal;
      color: #aaa;
      transition: 0.5s;
      pointer-events: none;
    }

    .signin .content .form .inputBox input:focus~label,
    .signin .content .form .inputBox input:valid~label {
      transform: translateY(-7.5px);
      font-size: 0.8em;
      color: #fff;
    }

    .signin .content .form {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    .signin .content .form {
      color: #fff;
      text-decoration: none;
    }

    .signin .content .form:nth-child(2) {
      color: #0f0;
      font-weight: 600;
    }

    .signin .content .form .inputBox button[type="submit"] {
      padding: 10px;
      background: #0f0;
      color: #000;
      font-weight: 600;
      font-size: 1.35em;
      letter-spacing: 0.05em;
      cursor: pointer;

    }

    a {
      color: black;
    }

    button[type="submit"]:active {
      opacity: 0.6;
    }

    @media (max-width: 900px) {
      section span {
        width: calc(10vw - 2px);
        height: calc(10vw - 2px);
      }
    }

    @media (max-width: 600px) {
      section span {
        width: calc(20vw - 2px);
        height: calc(20vw - 2px);
      }
    }
  </style>

</head>



<section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
  <span></span> <span></span> <span></span> <span></span> <span></span>

  <div class="signin">

    <div class="content">

      <h2>Siswa</h2>

      <form class="form" method="post">

        <div class="inputBox">
          <label>Nis</label>
          <input type="text" name="nis" placeholder="Nis">
        </div>
        <br>
        <br>
        <div class="inputBox">
          <label>Nisn</label>
          <input type="number" name="nisn" placeholder="Nisn">
        </div>
        <br>
        <br>
        <div class="inputBox">
          <button type="submit" name="submit">
            Log In
          </button>
        </div>
        <br>
        <div class="inputBox">
          <a href="logout.php">Kembali</a>
        </div>

      </form>

    </div>

  </div>

</section>





</body>

</html>