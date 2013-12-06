<?php
error_reporting(-1);
ini_set("display_errors", 1);
include_once("JSONManager.php");

$json = new JSONManager("information");
?>
<html>
    <head>
        <title>ten.java Plugin Contest</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="style.css" rel="stylesheet" media="screen" />
        <!--[if !IE 7]>
            <style type="text/css">
                #wrap {display:table;height:100%}
            </style>
        <!--[endif]-->
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <div class="column" style="background: #328F97;">
            <p style="margin-bottom: 40px;">
                <strong>Links</strong><br />
                <a href="http://github.com/tenjavacontest" target="_blank">Github</a> (tenjavacontest)<br />
                <a href="http://forums.bukkit.org/threads/ten-java-plugin-contest-irc-esper-net-ten-java-pool-1-315.190553/" target="_blank">Thread</a><br />
                <a href="https://twitter.com/tenjava">Twitter</a> (@tenjava)</a><br />
                <a href="http://webchat.esper.net/?nick=tenjava...&channels=ten.java&prompt=1" target="_blank">IRC</a> (irc.esper.net #ten.java)<br />
                <a href="https://docs.google.com/document/d/1vBadA687VEPMtj_tI6aEFV_0cQzwz15jF0SHqbf-fKk/edit" target="_blank">Maven Tutorial</a><br />
                <a href="https://docs.google.com/document/d/1Cr4XjwPSWsUd4f0SF4Mp4EQ8TVSZJkzBDtdrSsl-w3o/edit?usp=sharing" target="_blank">Rules</a>
            </p>
            <p style="margin-top: 0px;">
                <strong>Overview</strong><br />
                Points: 4,644<br />
                Date: December 7th 2013<br />
                Time: <a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=ten.java&iso=20131207T16&p1=136&ah=10">1600 UTC</a> & <a href="http://www.timeanddate.com/worldclock/fixedtime.html?msg=ten.java&iso=20131207T08&p1=136&ah=10">0800 UTC</a><br />
                Participants: 80<br />
                Judges: 7
            </p>
        </div>
        <div class="column" style="background: #1abc9c;">
            <p>
                <strong>News Feed</strong><br />
                <a href="javascript:void(0);" onclick="updateNewsFeed();">Refresh</a><br /><br />
                <span id="newsfeed">Loading...</span>
            </p>
        </div>
        <div class="column" style="background: #D15F54;">
            <p>
                <strong>Streams</strong><br />
                <?php
                echo "<ul>";
                $start = "";
                foreach ($json->getStreams() as $key => $stream) {
                    $json->appendListItem($start, "<a href=\"" . $stream["link"] . "\" target=\"_blank\">" . $key . "</a>");
                }
                echo $start;
                echo "</ul>";
                ?>
            </p>

        </div>
        <div class="column" style="background: #f1c40f;">
            <p id="donors">
                <strong>Donators</strong><br />
                <?php
                echo "<ul>";
                $start = "";
                foreach ($json->getDonators() as $key => $donator) {
                    $json->appendListItem($start, "$key: $donator");
                }
                echo $start;
                echo "</ul>";
                ?>
            </p>
        </div>
        <div id="footer">
            Thanks to all the wonderful people who are making this contest possible!
        </div>
    </body>

</html>
