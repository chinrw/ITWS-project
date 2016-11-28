<!--Term Project, Group 3, Home Page !-->
<!DOCTYPE HTML>
<html>

  <head>
  <?php
  include('conn.php');
  mysql_query("set names utf8");
  mysql_set_charset('utf8');
  ?>
    <title>Term Project</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="termProject.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <script src="jquery-3.1.1.min.js" ></script>
    <script type="text/javascript" src="termProject.js"> </script>
  </head>

  <body>

    <div id="bodyBlock">
      <h1><a href="index.php"><img id="logo" src="logo.gif"></a>Just putting it out there</h1>
      <div id="wholeBox" >
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div id="commentBox">
          <label for="comments" class="field">What is on you're mind?</label>
          <div class="value"> <textarea rows="4" name="comments" id="comments" onblur="return addingtextbackin(this)" onclick="return clearComments(this)">...</textarea></div>
        </div>

        <div>
       
          <input type="checkbox" name="vehicle[]" value="Love">Love
          <input type="checkbox" name="vehicle[]" value="Family">Family
          <input type="checkbox" name="vehicle[]" value="Pets">Pets
          <input type="checkbox" name="vehicle[]" value="School">School
          <input type="checkbox" name="vehicle[]" value="Work">Work
          <input type="checkbox" name="vehicle[]" value="Children">Children
          <!--<button class="submitButton" type="button" onclick="saveUserInfo(); ">Submit</button>  -->
          <input class="submitButton" type="submit" value="Submit" name="submit"/>
        
        </div>
        </form>

      </div>

      <div>
       <h1>Past Content</h1>
       <form action="">
       
        <input type="checkbox" name="sorttags" value="Love" id="Love">
        <label for="Love">Love</label>
        <input type="checkbox" name="sorttags" value="Family" id="Family">
        <label for="Family">Family</label>
        <input type="checkbox" name="sorttags" value="Pets" id="Pets">
        <label for="Pets">Pets</label>
        <input type="checkbox" name="sorttags" value="School" id="School">
        <label for="School">School</label>
        <input type="checkbox" name="sorttags" value="Work" id="Work">
        <label for="Work">Work</label>
        <input type="checkbox" name="sorttags" value="Children" id="Children">
        <label for="Children">Children</label>
        <input type="checkbox" name="sorttags" value="notag" id="notag">
        <label for="notag">No tag</label>

        <button class="sortButton" type="button" id="sortButton" >Sort By Tag(s)</button>
        <button class="sortButton" type="button" id="reset">Show all</button>

      </form>
      </div>



      <div id="pastEntries">

       <?php
            $display_query = mysql_query("select * from comment order by id desc;");
            while($row= mysql_fetch_array($display_query)) {
                $datum= array();
                $datum["content"] = $row["content"];
                $datum["time"]  = $row["time"];
                $datum["tags"]  = $row["tags"];
                $datum["flag"]  = $row["flag"];
                if ($datum["flag"] < 2) {
                  # code...
                

                $tagstr = str_replace("|"," ",$datum["tags"]);
                if ($tagstr == "") {
                  $tagstr = "notag";
                }
                
        ?>

        <div class="<?php echo 'content '.$tagstr; ?>">
          <p><?php echo $datum["content"];?></p>
          <p style="font-size: 0.9em"><?php 
            if ($tagstr == "notag") {
              $tagstr = "No tags";
            } else{
              $tagstr = "TAG: ".$tagstr;
            }
            echo $tagstr;
          ?></p>
          <Span id="date" ><?php echo $datum["time"];?></span>
          <button class="flag"  type="submit" >Flag</button>
          <div style= "clear:both" ></div>
        </div>
        <?php
        }}
        ?>


      </div>
      <div style="clear: both"></div>
    </div>

    <footer>
      <a href="aboutPage.html" id="aboutPage">About Page</a>
      <a href="contactUs.html" id="contactUs">Contact Us</a>
      <a href="index.php" id="home">Home</a>
    </footer>


<?php

    function injectChk($sql_str) { 
        $check = eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
        if ($check) {
          echo('failed');
          exit ();
        } else {
          return $sql_str;
        }
    }


    if (isset($_POST['submit'])) {
        $comments = $_POST['comments'];
        $tags = "";
        if(!empty($_POST['vehicle'])) {
          // Loop to store and display values of individual checked checkbox.
            foreach($_POST['vehicle'] as $selected) {
              $tags=$tags.$selected."|";
            }
        }else{
            $tags = "";
        }
        $tags=rtrim($tags,"|");
        //$tags=mysql_real_escape_string($tags);
        $q1 = mysql_query("insert into comment(`content`,`tags`) values('$comments','$tags')");
        echo '<script language="javascript">';
        echo 'alert("Success!");';
        echo 'window.location="index.php"';
        echo '</script>';
    }


?>
    

  </body>

</html>


