<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>鄉民的力量-決勝焦點</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">

    <link rel="stylesheet" href="css/animate.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="js/jquery.waypoints.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <!-- Modernizr -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/googlefont.css">


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
// 建立MySQL的資料庫連接 
$link = @mysqli_connect( 
            '127.0.0.1',  // MySQL主機名稱 mysql.1freehosting.com    我的電腦:192.168.0.101
            'root',       // 使用者名稱 u777456347_shaun
            '',           // 密碼 
            'live');  // 預設使用的資料庫名稱 u777456347_live

if ( !$link ) {
   echo "<h4>MySQL資料庫連接錯誤!</h4><br/>";
   exit();
}
else {
   echo "";
}


$sql="SELECT * FROM game2";//選取哪一個表單
    //echo $sql."<br/>";
$result=mysqli_query($link,$sql);
$time= array();
$time["name"]="time";
$push=array();
$push["name"]="push";
//$sql="SELECT * FROM game2";
$result=mysqli_query($link,$sql);
$hour=array();
$min=array();
$i=0;
$cal=0;
while($row=mysqli_fetch_array($result))
{   
    $time["data"][]=$row["time"];
    $push["data"][]=$row["push"];
    
   
    $cal+=$row["push"];
    if($row["push"]>=15){
        $use[$i]=$i;
    }
    else
    {   
        $use[$i]=0;
    }
    
    $min[$i]=($time["data"][$i]%100);
    $hour[$i]=(($time["data"][$i]-$min[$i])/100);
    
    $min[$i]-=30;
    $hour[$i]-=8;
    
     if($min[$i]<0){
           $hour[$i]-=1;
           $min[$i]+=30;
                        }
    $i++;
    
}
$final=array($time,$push);
mysqli_free_result($result);
mysqli_close($link);  // 關閉資料庫連接
?>

        <?php
// 建立MySQL的資料庫連接 
$link2 = @mysqli_connect( 
            '127.0.0.1',  // MySQL主機名稱 mysql.1freehosting.com    我的電腦:192.168.0.101
            'root',       // 使用者名稱 u777456347_shaun
            '',           // 密碼 
            'live');  // 預設使用的資料庫名稱 u777456347_live

if ( !$link2 ) {
   echo "<h4>MySQL資料庫連接錯誤!</h4><br/>";
   exit();
}
else {
   echo "";
}


$sql2="SELECT * FROM nba";//選取哪一個表單
$result2=mysqli_query($link2,$sql2);
$time2= array();
$time2["name"]="time";
$push2=array();
$push2["name"]="push";
//$sql="SELECT * FROM game2";
$result2=mysqli_query($link2,$sql2);
$hour2=array();
$min2=array();
$i2=0;
$cal2=0;
while($row2=mysqli_fetch_array($result2))
{   
    $time2["data"][]=$row2["time"];
    $push2["data"][]=$row2["push"];
    
   
    $cal2+=$row2["push"];
    if($row2["push"]>=15){
        $use2[$i2]=$i2;
    }
    else
    {   
        $use2[$i2]=0;
    }
    
    $min2[$i2]=($time2["data"][$i2]%100);
    $hour2[$i2]=(($time2["data"][$i2]-$min2[$i2])/100);
    
    $min2[$i2]-=60;
    $hour2[$i2]-=16;
    
     if($min2[$i2]<0){
           $hour2[$i2]-=9;
           $min2[$i2]+=60;
                        }
    $i2++;
    
}
$final2=array($time2,$push2);
mysqli_free_result($result2);
mysqli_close($link2);  // 關閉資料庫連接
?>





</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                鄉民的力量-決勝焦點</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">Idea</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">曲線圖展示</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Highlight自動化擷取</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#content2">Highlight關鍵字搜尋</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#content3">OpenData的資料結合</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Feedback</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1> 鄉民的力量<br/>之<br/>決勝焦點 </h1>
                <h2>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <hr>
                    <p style="font-size:18pt; color:white;">
            Designed by<br/> Shaun Yang  <i class="fa fa-times"></i>  James Kuo<br/>
                        Mentor is YAO-CHUNG FAN .
                        
                    </p>
                    <hr>
                </h2>
                <a href="#about" class="btn btn-primary btn-xl page-scroll" style="background-color:rgba(0,0,0,0.2);">Find Out More</a>

            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h1 class="header-content-inner">
                    IDEA</h1>

                    <hr class="light">
                </div>
            </div>
        </div>


        <section id="cd-timeline" class="cd-container">
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-4x fa-cog fa-spin" style="padding-left:4px;"></i>
                </div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h1 style="font-weight:bolder; color:black;text-align:center;"><i class="fa fa-check"></i>讓剪輯精華影片更簡單</h1>
                    <p style="color:black;font-size:24pt;text-align:center;">
                        不需要再重頭到尾把比賽看完
                        <br/> 就能輕鬆找出Highlight
                    </p>

                    <span class="cd-date"><h1>我們的想法</h1></span>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-movie">
                    <i class="fa fa-4x fa-cog fa-spin" style="padding-left:4px;"></i>
                </div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h1 style="font-weight:bolder; color:black;text-align:center;"><i class="fa fa-bar-chart"></i>讓鄉民幫你剪輯影片</h1>
                    <p style="color:black;font-size:24pt;text-align:center;">
                        利用PTT及時推文的優點
                        <br>快速分析影片的精彩片刻
                        <br/>
                    </p>
                    <p style="color:black;">
                    </p>
                    <span class="cd-date"><h1>我們的特色</h1></span>
                </div>
                <!-- cd-timeline-content -->

            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <i class="fa fa-4x fa-cog fa-spin" style="padding-left:4px;"></i>
                </div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content">

                    <h1 style="font-weight:bolder; color:black;text-align:center;"><i class="fa fa-futbol-o"></i>精采好球一次搞定</h1>
                    <p style="color:black;font-size:24pt;text-align:center;">
                        討論度最高的比賽時段
                        <br> 一次為您呈現!
                    </p>

                    <span class="cd-date"><h1>Highlight 自動化擷取</h1></span>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                    <i class="fa fa-4x fa-cog fa-spin" style="padding-left:4px;"></i>
                </div>
                <!-- cd-timeline-img -->

                <div id="#0" class="cd-timeline-content">
                    <h1 style="font-weight:bolder; color:black;text-align:center;"><i class="fa fa-pencil-square-o"></i>甚至讓剪輯變得更自由</h1>
                    <p style="color:black;font-size:24pt;text-align:center;">
                        我們可以依據使用者的搜尋
                        <br> 分析出關鍵字的相關影片。
                    </p>
                    <span class="cd-date"><h1>Highlight 關鍵字搜尋</h1></span>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location">
                    <i class="fa fa-4x fa-cog fa-spin" style="padding-left:4px;"></i>
                </div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h1 style="font-weight:bolder; color:black;text-align:center;"><i class="fa fa-television"></i>與電視業者合作</h1>
                    <p style="color:black;font-size:24pt;text-align:center;">
                        我們的技術
                        <br> 讓轉播比賽能夠更加快速完成精華剪輯。
                    </p>
                    <span class="cd-date"><h1>未來的發展</h1></span>
                </div>
                <!-- cd-timeline-content -->
            </div>

        </section>
        <a href="#services" class="btn btn-primary btn-xl page-scroll" style="position:absolute;left:47% ;background:gray;background-color:rgba(0,0,0,0.2);">Next</a>
        <!-- cd-timeline -->

    </section>

    <section id="services">
        <div style="background-color:rgba(0,0,0,0.1);padding-top:150px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="section-heading" style="color:#ffffff;padding-bottom:50px;">Present data by using HighChart</h1>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-lightbulb-o wow bounceIn text-primary"></i>
                            <h2 style="padding-top:10px;color:#ffffff;">Powerful</h2>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-spin fa-globe  text-primary" data-wow-delay=".1s"></i>
                            <h2 style="padding-top:10px;color:#ffffff;">Real Time</h2>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x  fa-users wow bounceIn text-primary" data-wow-delay=".2s"></i>
                            <h2 style="padding-top:10px;color:#ffffff;">Social Media</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary " data-wow-delay=".3s"></i>
                            <h2 style="padding-top:10px;color:#ffffff;">High Efficiency</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col-md-4 col-md-offset-5">

                    <br/>
                    <br/>
                    <button style="font-size:35px;" class="btn btn-info btn-lg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Choose to watch
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a id="a">2013 職棒總冠軍賽G4</a></li>
                        <li><a id="b">2016 NBA 騎士@暴龍G5</a></li>
                    </ul>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>


            </div>








            <!--///////////////////////////////////////////////////////////////NBA//////////////////////////////////////////////-->






            <div class="dipper" id="highchart" style="text-align:center ;width:100%;">
                <div class="container2" id="container" style="width:2048px; height: 800px; margin:auto; padding-bottom:50px; padding-top:70px; " class="fa fa-4x wow bounceIn text-primary">


                    <script type="text/javascript">
                        $().ready(function () {


                            var chart = $('#container').highcharts();


                            $('.container2').highcharts({
                                chart: {
                                    type: 'line',
                                    spacingLeft: 50,
                                    backgroundColor: "rgba(0,0,0,0.0)",

                                },

                                title: {
                                    text: 'Post',
                                    x: -20,
                                    align: 'center'
                                },
                                subtitle: {
                                    text: 'Source:ptt',
                                    x: -20
                                },
                                xAxis: {
                                    categories: <?php  print(json_encode($final[0]['data'])); ?>

                                },
                                yAxis: {
                                    title: {
                                        text: 'Times of post'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#000000'
                                    }],
                                    gridLineColor: '#966655'
                                },
                                plotOptions: {
                                    line: {

                                        dataLabels: {
                                            enabled: true
                                        },
                                        enableMouseTracking: true
                                    },
                                    series: {
                                        lineColor: '#303030',
                                        fillColor: '#000000',
                                        animation: {


                                            duration: 10000
                                        }
                                    }
                                },
                                tooltip: {
                                    valueSuffix: 'post',
                                    delayForDisplay: 1000,
                                    hideDelay: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'left',
                                    verticalAlign: 'left',
                                    borderWidth: 0
                                },
                                series: [{
                                    <?php
                                    print("\"name\":"."\"");
                                    print($final[1]['name']."\"");
                                    print(",\"data\":");       
                                    print(str_replace("\"", "", json_encode($final[1]['data']))); ?>

                                    }]



                            });





                        });
                        $('#b').click(function () {

                            var chart = $('#container').highcharts();
                            $('.container2').highcharts({
                                chart: {
                                    type: 'line',
                                    spacingLeft: 50,
                                    backgroundColor: "rgba(0,0,0,0.0)",

                                },

                                title: {
                                    text: 'Post',
                                    x: -20,
                                    align: 'center'
                                },
                                subtitle: {
                                    text: 'Source:ptt',
                                    x: -20
                                },
                                xAxis: {
                                    categories: <?php  print(json_encode($final2[0]['data'])); ?>

                                },
                                yAxis: {
                                    title: {
                                        text: 'Times of post'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#000000'
                                    }],
                                    gridLineColor: '#966655'
                                },
                                plotOptions: {
                                    line: {

                                        dataLabels: {
                                            enabled: true
                                        },
                                        enableMouseTracking: true
                                    },
                                    series: {
                                        lineColor: '#303030',
                                        fillColor: '#000000',
                                        animation: {


                                            duration: 10000
                                        }
                                    }
                                },
                                tooltip: {
                                    valueSuffix: 'post',
                                    delayForDisplay: 1000,
                                    hideDelay: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'left',
                                    verticalAlign: 'left',
                                    borderWidth: 0
                                },
                                series: [{
                                    <?php
                                    print("\"name\":"."\"");
                                    print($final[1]['name']."\"");
                                    print(",\"data\":");       
                                    print(str_replace("\"", "", json_encode($final2[1]['data']))); ?>

                                    }]
                            });
                        });

                        $('#a').click(function () {

                            var chart = $('#container').highcharts();
                            $('.container2').highcharts({
                                chart: {
                                    type: 'line',
                                    spacingLeft: 50,
                                    backgroundColor: "rgba(0,0,0,0.0)",

                                },

                                title: {
                                    text: 'Post',
                                    x: -20,
                                    align: 'center'
                                },
                                subtitle: {
                                    text: 'Source:ptt',
                                    x: -20
                                },
                                xAxis: {
                                    categories: <?php  print(json_encode($final2[0]['data'])); ?>

                                },
                                yAxis: {
                                    title: {
                                        text: 'Times of post'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#000000'
                                    }],
                                    gridLineColor: '#966655'
                                },
                                plotOptions: {
                                    line: {

                                        dataLabels: {
                                            enabled: true
                                        },
                                        enableMouseTracking: true
                                    },
                                    series: {
                                        lineColor: '#303030',
                                        fillColor: '#000000',
                                        animation: {


                                            duration: 10000
                                        }
                                    }
                                },
                                tooltip: {
                                    valueSuffix: 'post',
                                    delayForDisplay: 1000,
                                    hideDelay: 5
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'left',
                                    verticalAlign: 'left',
                                    borderWidth: 0
                                },
                                series: [{
                                    <?php
                                    print("\"name\":"."\"");
                                    print($final[1]['name']."\"");
                                    print(",\"data\":");       
                                    print(str_replace("\"", "", json_encode($final[1]['data']))); ?>

                                    }]
                            });
                        });
                    </script>





                </div>


                <div style="text-align: center; padding-bottom:50px;">
                    <a href="#portfolio" class="btn btn-primary btn-xl page-scroll" style="background-color:rgba(0,0,0,0.2);">Next</a>
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        #portfolio,
        #about,
        #contact,
        #content2,
        #services,
        #content3 {
            background: url("background.jpg") no-repeat fixed;
            background-size: cover;
            /* For flexibility */
        }
    </style>


    <section class="bg-primary" id="portfolio">

        <div class="container" style="text-align:center;">
            <div class="col-lg-12 text-center">
                <h1 style="font-weight:bolder; color:#ffffff;padding-bottom:50px;" class="section-heading">Highlight自動化擷取
            </h1>
                <hr>
            </div>
            <hr class="primary">
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="container">


                <div class="col-md-offset-4 col-md-1">



                </div>

                <div class="dropdown col-md-1">
                    <button style="font-size:35px;" class="btn btn-info btn-lg dropdown-toggle" type="button" id="Menu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Choose to watch
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu " aria-labelledby="Menu2">
                        <li><a id="a2">2013 職棒總冠軍賽G4</a></li>
                        <li><a id="b2">2016 NBA 騎士@暴龍G5</a></li>
                    </ul>

                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>



            </div>

            <script>
                $(document).ready(function () {


                    $("#baseball_1").hide();
                    $("#basketball_1").hide();


                    $("#a2").click(function () {
                        $("#baseball_1").show();
                        $("#basketball_1").hide();
                    });
                    $("#b2").click(function () {
                        $("#baseball_1").hide();
                        $("#basketball_1").show();
                    });
                });
            </script>





            <div id="baseball_1" class="container" style="text-align:center; width:100%;height:100%;">

                <div class="container" style="border-style: solid;border-color: #000000;border-width:5px;">

                    <div class="col-md-6" style="text-align:center;">
                        <iframe class="col-md-12" id="videotape" src="game1.php" width="1224px" height="750px" frameborder="0" scrolling="no" style="background-color:rgba(0,0,0,0);"></iframe>

                    </div>


                    <div class="col-md-6" style="text-align:center;">
                        <iframe class="col-md-12" id="videotape" src="game2.php" width="1224px" height="750px" frameborder="0" scrolling="no" style="background-color:rgba(0,0,0,0);"></iframe>

                    </div>
                    <br/>
                </div>


                <div class="container" style="border-style:solid;border-bottom-style: solid;border-color: #000000;border-width:5px;">
                    <div style="text-align:center;">
                        <iframe class="col-md-6" id="videotape" src="game3.php" width="1224px" height="750px" frameborder="0" scrolling="no" style="background-color:rgba(0,0,0,0);"></iframe>

                    </div>

                    <div>
                        <iframe class="col-md-6" id="videotape" src="game4.php" width="1224px" height="750px" frameborder="0" scrolling="no" style="background-color:rgba(0,0,0,0);"></iframe>

                    </div>
                </div>
            </div>






            <div id="basketball_1" class="container" style="text-align:center; width:100%;height:100%;">
                <div class="col-md-12" style="border-style: solid;border-color: #000000;border-width:5px;">
                    <iframe id="videotape5" src="nba.php" width="100%" height="1580px" frameborder="0" scrolling="no" style="background-color:rgba(0,0,0,0);"></iframe>

                </div>

            </div>










            <div style="text-align: center; padding-bottom:50px;padding-top:50px;">
                <a href="#content2" class="btn btn-primary btn-xl page-scroll" style="background-color:rgba(0,0,0,0.2);">Next</a>
            </div>
        </div>

    </section>




    <section class="bg-primary" id="content2">
        <div style="background-color:rgba(0,0,0,0.1);;padding-top:150px;">
            <div class="container">
                <div class="col-lg-12 text-center">
                    <h1 style="font-weight:bolder;color:#ffffff;padding-bottom:30px;" class="section-heading">Highlight關鍵字搜尋
            </h1>
                    <hr style="padding-bottom:30px;">



                    <div class="container col-md-12">
                        <div class="col-md-offset-4 col-md-1">
                        </div>
                        <div class="dropdown col-md-1">
                            <div class="dropdown col-md-5">
                                <button style="font-size:35px;" class="btn btn-info btn-lg dropdown-toggle" type="button" id="Menu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Choose to watch
                                    <span class="caret"></span>
                                </button>


                                <ul class="dropdown-menu pull-left" aria-labelledby="Menu3">
                                    <li><a id="a3">2013 職棒總冠軍賽G4</a></li>
                                    <li><a id="b3">2016 NBA 騎士@暴龍G5</a></li>
                                </ul>
                            </div>
                            <br>
                            <br/>
                            <br>
                            <br/>
                            <br>


                        </div>

                        <script>
                            $(document).ready(function () {
                                $("#videotape2").hide();
                                $("#videotape3").hide();
                                $("#g1text").hide();
                                $("#g2text").hide();
                                $("#a3").click(function () {
                                    $("#videotape2").show();
                                    $("#g1text").show();
                                    $("#g2text").hide();
                                    $("#videotape3").hide();
                                });
                                $("#b3").click(function () {
                                    $("#videotape2").hide();
                                    $("#g2text").show();
                                    $("#g1text").hide();
                                    $("#videotape3").show();
                                });
                            });
                        </script>
                      
                        <br>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="container">
                        
                                
                            <br>
                            <br/>
                            <br>
                            <br/>
                         <h2 id="g1text" style=" font-size:24pt;font-weight:bolder; color:#ffffff;" class="section-heading">Enter keywords( e.g. 張泰山)
            </h2>
                        <h2 id="g2text" style=" font-size:24pt;font-weight:bolder; color:#ffffff;" class="section-heading">Enter keywords( e.g. James)
            </h2>
                       
                       
                             <br/>
                            <br>
                            <br/>
                        <iframe id="videotape2" src="handle.php" width="100%" height="1200px" frameborder="0" scrolling="no"></iframe>
                        <iframe id="videotape3" src="nba_handle.php" width="100%" height="1200px" frameborder="0" scrolling="no"></iframe>

                    </div>

                </div>
            </div>
            <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/><br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
        </div>
        <br/>
               
                
    </section>


    <section class="bg=primary" id="content3">

        <div style="background-color:rgba(0,0,0,0.1);">
            <div class="container">
                <div class="col-lg-12 text-center wow bounceIn">
                    <h1 style="font-weight:bolder;color:#ffffff;padding-bottom:50px;padding-top:100px;" class="section-heading"> Different Data Type
            </h1>
                    <hr>
                </div>


                <div class="col-xs-4 text-center wow bounceIn" data-wow-delay="1s">
                    <img src="CPBL.png">

                </div>
                <div class="col-xs-4  text-center wow bounceIn" data-wow-delay="1.75s" style="hieght:50%;width:30%;">
                    <i class="fa fa-5x fa-times" style=" color:white; font-size: 12.5em;"></i>
                </div>


                <div class="col-xs-3 text-center wow bounceIn" data-wow-delay="2.5s">
                    <img src="ptt.png" style="height:355px">
                </div>

                <div class="col-md-12  text-center wow bounceIn" data-wow-delay="3.25s" style="hieght:1000px; width:100%;">
                    <div class="col-md-12 " style="padding-top:165px;"></div>
                    <h1 class="text-center wow bounceIn section-heading" style="color:white;"> 
                 兩種不同的資料型態<br/>
                </h1>
                </div>

                <div class="col-md-12  text-center wow bounceIn" data-wow-delay="4s" style="hieght:1000px; width:100%;">
                    <div class="col-md-12 " style="padding-top:50px;"></div>
                    <p class="text-center wow bounceIn " style="color:white; font-size:28pt;">
                        <strong>做出創新的結合</strong>
                        <br/>
                        <i class="fa fa-5x fa-share  fa-rotate-90" style=" color:white; font-size: 12.5em;"></i>

                    </p>
                </div>
                <div class="col-md-12  text-center wow bounceIn" data-wow-delay="4s" style="hieght:1000px; width:100%;">
                    <div class="col-md-12 " style="padding-top:50px;"></div>
                    <h1 class="text-center wow bounceIn " style="color:white; font-size:28pt; ">  
    Automation Of Highlight 
    <br/>

    <img style="-webkit-user-select: none;hieght:1500px;width:1500px;padding-top:50px;" src="http://stream1.gifsoup.com/view6/20151029/5262962/baseball-o.gif">
 
    </h1>
                </div>

            </div>
        </div>

    </section>


    <!--<section id="contact" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h1 class="section-heading" style="padding-bottom:50px;">Feedback</h1>
                    <hr class="primary" style="padding-bottom:50px;">
                </div>
                <div class="col-lg-12 text-center">

                    <p style="font-size:18pt;padding-bottom:50px;">
                        We really appreciate your Feedback.
                        <br/> If any problem ,please let us know . <i class="fa fa-2x fa-smile-o"></i>
                    </p>
                    <p class="wow bounceIn" data-wow-delay=".1s" style="font-size:20pt;"><i class="fa fa-envelope-o fa-2x wow bounceIn" data-wow-delay=".1s"></i> Email : aberfoule@yahoo.com.tw</p>
                </div>
            </div>
        </div>
    </section>
       
   --->









    <!-- Plugin JavaScript -->

    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>


</body>

</html>