<!DOCTYPE html>
<html lang="id">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Layanan Terpadu</title>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #ff9900;
    padding: 20px;
    font-family: 'Arial', sans-serif;
    color: #333;
  }

  .main {
    max-width: 1000px;
    margin: auto;
  }

  h1, h2 {
    text-align: center;
    color: #4a4a4a;
  }

  h1 {
    font-size: 50px;
    word-break: break-word;
    margin-bottom: 20px;
  }

  h2 {
    font-size: 30px;
    margin-bottom: 20px;
  }

  hr {
    border: 1px solid #ddd;
  }

  .row {
    margin: 8px -16px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .column {
    flex: 1 1 calc(25% - 16px);
    margin: 8px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s;
  }

  .column:hover {
    transform: translateY(-10px);
  }

  .content {
    padding: 16px;
    text-align: center;
  }

  .content img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-bottom: 2px solid #ff9900;
  }

  .content h3 {
    font-size: 22px;
    color: #ff9900;
    margin: 10px 0;
  }

  .content p {
    font-size: 14px;
    color: #666;
  }

  @media screen and (max-width: 900px) {
    .column {
      flex: 1 1 calc(50% - 16px);
    }
  }

  @media screen and (max-width: 600px) {
    .column {
      flex: 1 1 100%;
    }
  }

  .peta-section {
    margin-top: 40px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .peta-section img {
    width: 100%;
    border-radius: 8px;
  }

  footer {
    margin-top: 40px;
    text-align: center;
    font-size: 14px;
    color: #999;
  }
</style>
</head>
<body>

<div class="main">
  <h1>BERITA</h1>
  <hr>
  <h2>Layanan Terpadu</h2>

  <div class="row">
    <div class="column" onclick="storeService('Membayar Pajak')">
      <div class="content">
        <img src="img/pajak.jpeg" alt="Pajak">
        <h3>Membayar Pajak</h3>
        <p>Membayar pajak adalah kewajiban memberikan sebagian pendapatan kepada pemerintah untuk membiayai layanan publik seperti infrastruktur, pendidikan, dan kesehatan. Pajak ini diatur oleh undang-undang dan dibayarkan secara berkala.</p>
      </div>
    </div>
    <div class="column" onclick="storeService('Membuat KTP')">
      <div class="content">
        <img src="img/ktp.jpeg" alt="KTP">
        <h3>Membuat KTP</h3>
        <p>Membuat KTP (Kartu Tanda Penduduk) dilakukan dengan mendatangi kantor Dinas Kependudukan dan Pencatatan Sipil (Disdukcapil) setempat. Prosesnya meliputi pengisian formulir, pengambilan foto, sidik jari, dan tanda tangan. KTP berlaku seumur hidup untuk WNI yang berusia 17 tahun ke atas.</p>
      </div>
    </div>
    <div class="column" onclick="storeService('Pengaduan Masyarakat')">
      <div class="content">
        <img src="img/pengaduan masyarakat.jpeg" alt="Pengaduan Masyarakat">
        <h3>Pengaduan Masyarakat</h3>
        <p>Pengaduan masyarakat adalah proses pelaporan atau penyampaian keluhan dari warga terhadap pelayanan publik, kebijakan, atau tindakan yang tidak sesuai. Tujuannya untuk memperbaiki kondisi dan memastikan respons dari pemerintah atau instansi terkait. Pengaduan dapat disampaikan melalui berbagai saluran, seperti aplikasi, situs web, atau langsung ke kantor pelayanan.






        </p>
      </div>
    </div>
    <div class="column" onclick="storeService('Pelayanan Publik')">
      <div class="content">
        <img src="img/Pelayanan Publik.jpg" alt="Pelayanan Publik">
        <h3>Pelayanan Publik</h3>
        <p>Pelayanan publik adalah layanan yang disediakan oleh pemerintah atau instansi untuk memenuhi kebutuhan masyarakat, seperti pendidikan, kesehatan, transportasi, dan administrasi. Tujuannya adalah untuk meningkatkan kualitas hidup warga, menjamin akses yang adil, dan mendorong partisipasi masyarakat. Pelayanan publik harus transparan, akuntabel, dan responsif terhadap kebutuhan masyarakat.</p>
      </div>
    </div>
  </div>

  <div class="peta-section">
    <img src="img/peta.jpg" alt="Peta Layanan">
    <h3>Peta Layanan</h3>
    <p>Peta layanan adalah alat yang menggambarkan jenis dan lokasi layanan publik yang tersedia untuk masyarakat. Peta ini membantu warga memahami aksesibilitas layanan, seperti kesehatan, pendidikan, dan transportasi, serta memudahkan pencarian informasi terkait fasilitas dan lembaga yang menyediakan layanan tersebut. Dengan peta layanan, masyarakat dapat lebih mudah menemukan dan memanfaatkan layanan yang dibutuhkan.</p>
  </div>
</div>

<footer>
  <p>Last Visited Service: <span id="lastService"></span></p>
</footer>

<script>
  // Store selected service in localStorage
  function storeService(service) {
    localStorage.setItem('lastService', service);
    alert('Anda Menekan: ' + service);
  }

  // Retrieve and display last visited service
  window.onload = function() {
    const lastService = localStorage.getItem('lastService');
    if (lastService) {
      document.getElementById('lastService').textContent = lastService;
    } else {
      document.getElementById('lastService').textContent = 'No service visited yet';
    }
  }

  // Simulate async data fetch
  async function fetchData() {
    try {
      const response = await fetch('https://jsonplaceholder.typicode.com/posts/1');
      const data = await response.json();
      console.log(data);
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  }

  fetchData(); // Call async function
</script>

</body>
</html>
