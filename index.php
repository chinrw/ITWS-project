<!--Term Project, Group 3, Home Page !-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<htmlxmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

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
      <h1><a href="index.html"><img id="logo" src="logo.gif"></a>Just putting it out there</h1>
      <div id="wholeBox" >
        <div id="commentBox">
          <label for="comments" class="field">What is on you're mind?</label>
          <div class="value"> <textarea rows="4" name="comments" id="comments" onblur="return addingtextbackin(this)" onclick="return clearComments(this)">...</textarea></div>
        </div>

        <div>
        <form action="">
          <input type="checkbox" name="vehicle" value="tag 1">Love
          <input type="checkbox" name="vehicle" value="tag 2">Family
          <input type="checkbox" name="vehicle" value="tag 3">Pets
          <input type="checkbox" name="vehicle" value="tag 4">School
          <input type="checkbox" name="vehicle" value="tag 5">Work
          <input type="checkbox" name="vehicle" value="tag 5">Children
          <button class="submitButton" type="button" onclick="saveUserInfo(); ">Submit</button>
        </form>
        </div>

      </div>

      <div>
       <h1>Past Content</h1>
       <form action="">
        <input type="checkbox" name="vehicle" value="tag 1">Love
        <input type="checkbox" name="vehicle" value="tag 2">Family
        <input type="checkbox" name="vehicle" value="tag 3">Pets
        <input type="checkbox" name="vehicle" value="tag 4">School
        <input type="checkbox" name="vehicle" value="tag 5">Work
        <input type="checkbox" name="vehicle" value="tag 5">Children
        <button class="sortButton" type="button">Sort By Tag(s)</button>
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
        ?>

        <div class="content">
          <p><?php echo $datum["content"];?></p>
          <Span id="date" ><?php echo $datum["time"];?></span> 
          <button class="flag"  type="submit" >Flag</button>
          <div style= "clear:both" ></div>
        </div>
        <?php   
        }
        ?>


      </div>
      <div style="clear: both"></div>
    </div>

    <footer> 
      <a href="aboutPage.html" id="aboutPage">About Page</a>
      <a href="contactUs.html" id="contactUs">Contact Us</a>
      <a href="index.html" id="home">Home</a>    
    </footer>
    
  </body>
  
</html> 


