<?php
require_once('../connection.php');
$data = mysqli_query ($koneksi," select * from tbcandidates") ; 
while ($row = mysqli_fetch_array ($data) ) {
    $datacandidates[] = $row['candidate_name'] ;
    $query = mysqli_query ($koneksi, "select * from tbcandidates where candidate_id  ='". $row['candidate_id']."'");
    $row = $query-> fetch_array () ;
	$total [] = $row['candidate_cvotes'] ;
}
?> 
<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="../js/Chart.js">
</script>

</head>
<body id="top">

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

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="candidates.php">Manage Candidates</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
         </li>
         <li><a class="drop" href="#">Print Result</a>
          <ul>
            <li><a href="print_chart.php">Print Voter PDF</a></li>
            <li><a href="print_excel.php">Print Result Excel</a></li>
          </ul>
         </li>
          <li><a href="logout.php">Logout</a></li>
             </ul>
              </nav>
    
               </header>
              </div>


<div style="width: 1000px ; height: 300px ;background-color: #141414;">	
 <canvas id="myChart"></canvas>
	</div>
   <script>
   var ctx = document.getElementById("myChart").getContext('2d') ; 
   var myChart = new Chart (ctx, {
    type: 'doughnut',
    data : {
        labels: <?php echo json_encode($datacandidates);?>,
            datasets: [{

                label:'Total Vote',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)'],
                borderColor: ['white','white','white'],
                data: <?php echo json_encode ($total);?>
            }
            ]
        },
   options:{
    scales:{
        yAxes:[{
            ticks:{
                beginAtZero : true
            }
        }] 
      }
     }
   }); 
   </script>     

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

