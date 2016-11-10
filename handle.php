<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
    <link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <script>
        if (window.chrome)
            $("[type=video\\\/mp4]").each(function () {
                $(this).attr('src', $(this).attr('src').replace(".mp4", "_c.mp4"));
            });
    </script>

</head>

<body id="top" style="background-color:rgba(0,0,0,0);">

    <?php   
        $key = (!empty($_GET['key']) ? $_GET['key'] : null);
            
        /***讀檔*********************/
        $contents = "";
        $name ="";
        $stamp ="";
        $fkey = fopen("output_game4.txt","r");
        $find = 0;
        $first= 0;
        if ($fkey) {
            while (!feof($fkey)) {
                        if($key==null)
                            $first=1;
                        $contents = fgets($fkey);
                        sscanf($contents, "%s : %s", $name, $stamp);
                         if ($key == $name){ 
                                echo "<h2 class=\"container text-center\">已找到您輸入的關鍵字'".$key."'</h2><br/>";
                                $find = 1;
                                break; }         
            }
            if(!($find)&&!($first)){
                  echo "<h2>未找到您輸入的關鍵字".$key."</h2>";
            }
                   
        }                   
        $time = array();
        $hour = array();
        $minute = array();
        $size = 0;
        $vm = array();
        $vh = array();
        $finalsecond = array();
        if ($find)
        {
                $time = explode(",", $stamp);    //字串分割
                 $size = sizeof($time);
                    for ($i=0;$i<$size;$i++) {
                      sscanf($time[$i], "%d : %d", $hour[$i], $minute[$i]);
                     $vm[$i] = $minute[$i]-30;//這邊的時間要跟比賽一起改
                     $vh[$i] = $hour[$i] - 18;  //game4 -16小時+28分
                      $finalsecond[$i] = 3600*$vh[$i] + 60*$vm[$i];
                     
                        }
        }
        fclose($fkey);    
         
                             
     ?>
        <script>
            var i = 0;
            var count = <?php echo $size?>;
            var times = [<?php echo join(", ",  $finalsecond);?>];
        </script>
        
        
        
        <div class="container">
            <form class="text-center" action="" method="get">
                <input type="text" name="key" id="key" />
                <input id="submit" type="submit" value="submit" onClick="verify()" />
            </form>
     <br/>
<br/>



        <script>
            function emptypage() {
                alert("Please enter");
                if (document.getElementById("key").value == "")
                    firstpause();
                else {}


            }

            function verify() {
                if (document.getElementById("key").value == "") {
                    alert("Please enter");
                    firstpause();
                }

            }
        </script>
        <div id="player" class="container">

        </div>
 </div>
        <script>
            //--------------------------------redirecting
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";

            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;

            function firstpause() {
                player.stopVideo();
            }

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '900',
                    width: '1500',
                    videoId: 'P7uDbJ3mQxo',
                    events: {
                        'onReady': onPlayerReady
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                if (times[0] == null)
                    player.pauseVideo();
                else {
                    player.seekTo(times[0], true);
                    setTimeout(jump1, 60000);
                }
            }


            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.




            var done = false;


            <?php for($i=1;$i<$size-1;$i++){?>

            function jump<?php echo $i?> () {
                player.seekTo(times[<?php echo $i?>], true);
                setTimeout(jump<?php echo $i+1?>, 60000);
            }
            <?php  }?>

            function jump<?php echo $i?> () {
                player.seekTo(times[<?php echo $i?>], true);
                setTimeout(alert("finished!!!"), 60000);
                player.stopVideo();
            }
        </script>







        <!-- ####################################################################################################### -->

        <!-- ####################################################################################################### -->
</body>

</html>