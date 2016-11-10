<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
    <link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <title>社群比賽直播-場次1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <?php


    //資料庫
    $database = "live";
  

    $con = mysql_connect('127.0.0.1','root','');
     
     if ( !mysql_select_db($database, $con) )
         die("無法開啟 $database 資料庫!<br/>");
     


    //取資料
  
    $query = mysql_query("SELECT * FROM nba");
 
    //將資料存起來
    
    $push = array();
    $push['name'] = 'push';
        
    $time = array();
    $time['name'] = 'time';
        
    while($row = mysql_fetch_array($query))
    {
        $push['data'][] = $row['push'];
        $time['data'][] = $row['time'];
    }
   
  

    //用JSON格式儲存
     
    $final = array();
    array_push($final,$time);
    array_push($final,$push);
     
     mysql_close($con);
?>

        <?php

 array_multisort($push['data'], SORT_DESC, $time['data'], SORT_ASC);
   
?>

            <script>
                if (window.chrome)
                    $("[type=video\\\/mp4]").each(function () {
                        $(this).attr('src', $(this).attr('src').replace(".mp4", "_c.mp4"));
                    });
            </script>

            <script>
                // 2. This code loads the IFrame Player API code asynchronously.
                var tag = document.createElement('script');

                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                // 3. This function creates an <iframe> (and YouTube player)
                //    after the API code downloads.
                var player;

                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('player', {
                        height: '1000',
                        width: '1500',
                        videoId: 'razsY87JuWI',
                        events: {
                            'onReady': onPlayerReady
                        }
                    });
                }

                // 4. The API will call this function when the video player is ready.
                function onPlayerReady(event) {
                    event.target.pauseVideo();
                }

                // 5. The API calls this function when the player's state changes.
                //    The function indicates that when playing a video (state=1),
                //    the player should play for six seconds and then stop.
                var done = false;

                function change() {
                    player.seekTo(30 * 60 + 60 * 29 - 1 * 60, true);
                }

                function jump() {
                    setTimeout(jump2, 60000);
                    setTimeout(jump3, 120000);
                    player.seekTo(times1, true);
                }

                function jump2() {
                    player.seekTo(times2, true);
                }

                function jump3() {
                    player.seekTO(times3, true);
                    setTimeout(alert("The end"), 60000);
                }
            </script>


</head>

<body id="top" style="background-color:rgba(0,0,0,0.0);">

    <!-- ####################################################################################################### -->

    <div>
        <h1 style="text-align: center">NBA東區總冠軍賽G5</h1>
        <h1 style="text-align: center">騎士 VS 暴龍</h1>
    </div>


    <?php //計算影片三大時間點
$minute = array();
$hour = array();
$j = 0;
$i = 0;
while(TRUE)
{
if($time['data'][$j] > 0830)
{ 

$minute[$i]= ($time['data'][$j] ) %100;
$hour[$i] =(($time['data'][$j]) - $minute[$i] ) /100;
$j++;
$i++;
}
else
{ $j++;
}
if($i==3)
{break;} 
}
$vm = array();
$vh = array(); 
for($i=0;$i<3;$i++)
{ 
$vm[$i] = $minute[$i];
$vh[$i] = $hour[$i] - 8; 
}
?>

        <?php 
                  $finalsecond = array();
                  $finalsecond[0] = 3600*$vh[0] + 60*$vm[0];
                  $finalsecond[1] = 3600*$vh[1] + 60*$vm[1];
                  $finalsecond[2] = 3600*$vh[2] + 60*$vm[2];
                  
           ?>

            <script>
                var times1 = <?php echo $finalsecond[0] ?>;
                var times2 = <?php echo $finalsecond[1] ?>;
                var times3 = <?php echo $finalsecond[2] ?>;
            </script>





            <div id="highlight">
                <div style="text-align:center;">
                    <button onclick="jump()" type="button" class="myButton" value="send">整場精華</button>
                    <button onclick="change()" type="button" class="myButton" value="send">try</button>
                    <br>
                    <br/>
                    <br/>
                    <div id="player" style="text-align:center;"></div>
                </div>

            </div>
            <!-- ####################################################################################################### -->



            <!-- ####################################################################################################### -->

            <br class="clear" />

</body>

</html>