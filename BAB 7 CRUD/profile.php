<!DOCTYPE html>
<html lang="id">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  background-image: url("img/ppp.jpeg");
  filter: blur(8px);
  -webkit-filter: blur(8px);
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.bg-text {
  background-color: rgba(0, 0, 0, 0.4);
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

button {
  padding: 10px 20px;
  margin: 10px;
  background-color: #f1f1f1;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #ddd;
}

.modal {
  display: none;
  position: fixed;
  z-index: 3;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #222;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  color: white;
  text-align: center;
  border-radius: 10px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}

.modal-button {
  margin-top: 20px;
}
</style>
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
  <h2>PROFIL</h2>
  <h1 style="font-size:50px">LAYANAN TERPADU</h1>
  <p>UNTUK MASYARAKAT</p>
  <button onclick="tampilkanAlert()">Tampilkan Alert</button>
  <button onclick="tampilkanConfirm()">Tampilkan Konfirmasi</button>
  <button onclick="tampilkanPrompt()">Tampilkan Prompt</button>
</div>

<!-- Modal Alert -->
<div id="alertModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="tutupModal('alertModal')">&times;</span>
    <p id="alertText">Ini adalah kotak alert!</p>
    <button class="modal-button" onclick="tutupModal('alertModal')">OK</button>
  </div>
</div>

<!-- Modal Konfirmasi -->
<div id="confirmModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="tutupModal('confirmModal')">&times;</span>
    <p id="confirmText">Apakah Anda yakin?</p>
    <button class="modal-button" onclick="konfirmasiAksi(true)">OK</button>
    <button class="modal-button" onclick="konfirmasiAksi(false)">Batal</button>
  </div>
</div>

<!-- Modal Prompt -->
<div id="promptModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="tutupModal('promptModal')">&times;</span>
    <p id="promptText">Silakan masukkan nama Anda:</p>
    <input type="text" id="userInput" style="padding: 10px; width: 80%;" />
    <button class="modal-button" onclick="promptAksi()">Kirim</button>
  </div>
</div>

<script>
  function tampilkanAlert() {
    document.getElementById('alertModal').style.display = 'block';
  }

  function tampilkanConfirm() {
    document.getElementById('confirmModal').style.display = 'block';
  }

  function tampilkanPrompt() {
    document.getElementById('promptModal').style.display = 'block';
  }

  function tutupModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
  }

  function konfirmasiAksi(isConfirmed) {
    tutupModal('confirmModal');
    if (isConfirmed) {
      alert("Anda menekan OK!");
    } else {
      alert("Anda menekan Batal!");
    }
  }

  function promptAksi() {
    let input = document.getElementById('userInput').value;
    tutupModal('promptModal');
    if (input) {
      alert("Halo " + input + "! Selamat datang.");
    }
  }
</script>

</body>
</html>
