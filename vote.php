<?php
  require_once('connection.php');

  session_start();
  
  if(empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
  if (isset($_POST['vote'])) {
    $vote = $_POST['vote'];

    // Tingkatkan jumlah suara kandidat yang dipilih
    $query = "UPDATE tbcandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'";
    $koneksi->query($query);

    $voter_id = $_POST['voter'];
    $email = $_POST['email'];
    // Melakukan query untuk menginsert data ke tabel
    $query = "INSERT INTO konfirmasi (voter_id, email) VALUES ('$voter_id', '$email')";
    $koneksi->query($query);

    $query = "DELETE FROM tbmembers WHERE voter_id='$voter_id'";
    $koneksi->query($query);
    echo '<script>alert("Vote berhasil! Anda akan dipaksa logout."); window.location.href = "index.php";</script>';
    exit();
}
// Tampilkan kandidat-kandidat yang dapat dipilih
$query = "SELECT candidate_name FROM tbCandidates";
$result = $koneksi->query($query);

?>
<!DOCTYPE html>
<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/user.js">
</script>
<style>
  .imgx{
    height: 300px;
    width: 232px;
  }
  .bottom-button {
  margin-bottom: 1px;
  background-color: grey;
  box-shadow: black;
}
.rowx{
  background-color: #373737;
}
.selengkapnya{
  background-color: #373737;
}
.inputx{
  background-color: #373737;
}
    select {
        width: 200px;
        height: 30px;
        align-items: center;

    }
</style>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-instagram" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-phone"></i> +6285816081685</li>
        <li><i class="fa fa-envelope-o"></i> 21082010154@student.upnjatim.ac.id</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <!-- ################################################################################################ -->
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a class="drop" href="#">Voter Pages</a>
          <ul>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">Manage my profile</a></li>
          </ul>
        </li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background2.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li>
        <blockquote>           
<table>
  <th width="250px"><img class="imgx" src="prabowo.jpg"></th>
  <th align="justify"><center>Prabowo Subianto</center><br>Prabowo Subianto Djojohadikusumo (lahir 17 Oktober 1951) adalah seorang politisi, pengusaha, dan perwira tinggi militer Indonesia. Ia menempuh pendidikan dan jenjang karier militer selama 28 tahun sebelum berkecimpung dalam dunia bisnis, politik dan pemerintahan. Pada tanggal 23 Oktober 2019, Prabowo dilantik menjadi Menteri Pertahanan ke-26 Republik Indonesia dalam Kabinet Indonesia Maju untuk periode 2019 hingga 2024 <br>Sebagai Ketua Umum Partai Gerindra, Prabowo Subianto bersama Hatta Rajasa, maju sebagai calon Presiden Indonesia ke-7 dalam pemilihan umum 2014, namun diungguli oleh pasangan Joko Widodo dan Jusuf Kalla. Ia mencalonkan diri sebagai presiden pada pemilihan umum Presiden Indonesia 2019, berpasangan dengan Sandiaga Uno. Pada Rapimnas Partai Gerakan Indonesia Raya tanggal 13 Agustus 2022 di Sentul, Prabowo menerima pencalonan partainya untuk mencalonkan diri sebagai presiden pada Pemilihan umum Presiden Indonesia 2024.</th>
  <tr>
                <td class="rowx"></td>
                <td class="rowx"><center><a href="https://id.wikipedia.org/wiki/Prabowo_Subianto"><button class="selengkapnya" >Selengkapnya</button></a></center></td>
            </tr>
</table>
        </blockquote>
      </li>
      <li>
        <blockquote>
        <table>
  <th width="250px"><img class="imgx" src="ganjar.jpg"></th>
  <th><center>Ganjar Pranowo</center> <br>H. Ganjar Pranowo, S.H., M.I.P. (lahir 28 Oktober 1968) adalah seorang politisi yang saat ini menjabat sebagai Gubernur Jawa Tengah selama dua periode sejak 23 Agustus 2013. Sebelumnya, ia merupakan anggota Dewan Perwakilan Rakyat dari Fraksi PDI Perjuangan periode 2004–2009 dan 2009–2013. Ia juga sedang menjabat sebagai Ketua Umum Keluarga Alumni Universitas Gadjah Mada (Kagama) selama dua periode, yaitu 2014–2019 dan 2019–2024; sekaligus Ketua Umum Persatuan Radio TV Publik Daerah Seluruh Indonesia (Persada.id). Pada 21 April 2023, Ganjar Pranowo ditunjuk oleh PDIP sebagai calon Presiden Indonesia 2024. </th>
  <tr>
                <td class="rowx"></td>
                <td class="rowx"><center><a href="https://id.wikipedia.org/wiki/Ganjar_Pranowo"><button class="selengkapnya" >Selengkapnya</button></a></center></td>
            </tr>
</table>
        </blockquote>
      </li>
      <li>
        <blockquote>
        <table>
  <th width="250px"><img class="imgx" src="anies.jpg">
</th>
<th><center>Anies Baswedan</center> <br>Setelah mengenyam pendidikan di bidang ilmu politik, Anies berkarier sebagai akademisi. Ia menjabat sebagai Rektor Universitas Paramadina selama delapan tahun, dan menggagas gerakan Indonesia Mengajar, yang menurutnya bukanlah semata-mata untuk modal politiknya. Ia kemudian bergabung dalam konvensi calon presiden yang diselenggarakan oleh Partai Demokrat pada tahun 2013. Pada bulan Oktober 2014, ia ditunjuk oleh Presiden Joko Widodo menjadi Menteri Pendidikan dan Kebudayaan pada Kabinet Kerja, namun dicopot dua tahun kemudian. Dengan menggunakan politisasi isu SARA, Anies bersama pasangannya yaitu Sandiaga Uno, dengan diusung oleh PKS dan Gerindra, memenangkan pemilu gubernur DKI Jakarta tahun 2017 dari lawannya, Basuki Tjahaja Purnama.</th>
<tr>
                <td class="rowx"></td>
                <td class="rowx"><center><a href="https://id.wikipedia.org/wiki/Anies_Baswedan"><button class="selengkapnya" >Selengkapnya</button></a></center></td>
            </tr>
</table>
        </blockquote>
      
      </li>
      <li>
        <blockquote>
        <table>
  <th width="250px" height="100px">
  <Center><p>Lakukan Voting</p></Center><br>
  <form action="vote.php" method="POST">
  <center><select class="selengkapnya" name="vote" required></center>
        <option value="">Pilih kandidat</option>
        <?php while ($row = $result->fetch_assoc()): ?>
            <option value="<?php echo $row['candidate_name']; ?>"><?php echo $row['candidate_name']; ?></option>
        <?php endwhile; ?>
    </select><br>
    <center><label for="email">Email:</label></center>
  <center><input class="inputx" type="text" id="email" name="email"></center><br>
  <center> <label for="voter">Voter ID:</label> </center>
  <center><input class="inputx" type="text" id="voter" name="voter"><br></center>
 <center><button class="selengkapnya" type="submit" name="submit">Vote</button></center><br>
</form>
</th>
</table>
        </blockquote>
      
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>



    <!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->

</body>
</html>



