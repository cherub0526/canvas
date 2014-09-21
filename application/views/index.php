<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Canvas</title>
  <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/excanvas.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('js/jquery.jqplot.js');?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('js/jquery.jqplot.min.css');?>">

  <script type="text/javascript">
  $(document).ready(function(){
    var line1 = <?php echo json_encode($show);?>;
    var plot1 = $.jqplot('chart1', [line1], {
        title: '座標圖',
        seriesDefaults: {
          showMarker:false,
          pointLabels:{ show:true}
        },
        axes:{ yaxis:{ pad: 1.3 } }
    });
  });
  </script>
</head>
<body>
  <p>最大值 X : <?php echo $max['x'];?> Y: <?php echo $max['y'];?> </p>
  <p>最小值 X : <?php echo $min['x'];?> Y: <?php echo $min['y'];?></p>
<div id="chart1"  style="height:500px; width:1500px;"></div>
</body>
</html>