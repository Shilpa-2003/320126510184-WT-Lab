


<?php
	// connect to the database
 include "connection.php";
 session_start();
  if(isset($_POST['clicked']))
  {
         mysqli_query($db,"INSERT into `comments` VALUES('$_SESSION[user]','$_POST[cid]','$_POST[data]');");
  }
	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($db, "SELECT * FROM fb_upload WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($db, "INSERT INTO likes (username, postid) VALUES ('$_SESSION[user]', $postid)");
		mysqli_query($db, "UPDATE fb_upload SET likes=$n+1 WHERE id=$postid");

		echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($db, "SELECT * FROM fb_upload WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($db, "DELETE FROM likes WHERE postid=$postid AND username= '$_SESSION[user]';");
		mysqli_query($db, "UPDATE fb_upload SET likes=$n-1 WHERE id=$postid");

		echo $n-1;
		exit();
	}

	// Retrieve posts from the database
	$posts = mysqli_query($db, "SELECT * FROM  fb_upload");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Like and unlike system</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="styles.css">
  <style media="screen">
  body {
padding-top: 100px;
}

.post {
width: 35%;
margin: 10px auto;
border: 1px solid black;
padding: 5px;
}
.like, .unlike, .likes_count {
color: blue;
}
.hide {
display: none;
}
.fa-thumbs-up, .fa-thumbs-o-up {
transform: rotateY(-180deg);
font-size: 1.3em;
}
p
{
  text-align: center;
}
body
{
}
.img
{
  width:100%;
}
.main
{
    display: flex;
  width:100%;
  height:100%;

}
.b2 table
{
  margin:auto;
}
.b2 tr,td
{
  padding-right: 20px;
}
.b1
{
  flex:5;
  height:100%;


}
.b2
{
  flex:1;
height:1500px;
width:500px;

}
.cbox
{
  display:none;
}
#button1
{
  border:none;
  background-color: #e1e4ec;
}
  </style>
</head>
<body>
<div class="main">
<div class="b1">
  <?php while ($row = mysqli_fetch_array($posts)) {
     $x = $row[2];

    $q = mysqli_query($db,"SELECT description from `description` where id = $row[2];");
    ?>

    <div class="post">
      <div  style =  "padding: 2px; margin-top: 2px;">
        <?php
        echo "<p>";
        echo $row[0];
        echo "</p>";
        ?>
      </div>
      <img class = "img" src="uploads/<?php echo $row['image']; ?>" width = 200 title="<?php echo $row['image']; ?>">
<!--
      <div  style =  "padding: 1px; margin-top: 1px;">
        <?php /*
        $q1 = mysqli_fetch_array($q);
        echo "<p>";
        echo $q1[0];
        echo "</p>";
        */?>
      </div>
-->
      <div style="padding: 2px; margin-top: 5px;">
      <?php
        // determine if user has already liked this post
        $results = mysqli_query($db, "SELECT * FROM likes WHERE username= '$_SESSION[user]' AND postid=".$row['id']."");

        if (mysqli_num_rows($results) == 1 ): ?>
          <!-- user already likes post -->
          <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
          <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
        <?php else: ?>
          <!-- user has not yet liked post -->
          <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
          <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
        <?php endif ?>

        <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
      </div>
    <!--<button  class = "<?php echo $row['id']; ?>" id = "button1">Comments</button>-->
      <div class="cbox" style =  "padding: 1px; margin-top: 1px; " data-id = "<?php echo $row['id']; ?>"  id ="<?php  echo $row['id']; ?>" >

       <?php $t = mysqli_query($db,"SELECT * from `comments` where postid = ".$row['id']."");
       $i = 1;
       ?>
       <table>
        <?php while ($r = mysqli_fetch_array($t)) {
          // code...
          ?>
           <tr>
             <td><?php echo $i; ?></td>
             <td>  <?php echo $r['comment']; echo "  <b> by "; echo $r['username'];echo "</b>"; ?> </td>
           </tr>
          <?php
          $i = $i + 1;
        } ?>
       </table>
       <div  style =  "padding: 2px; margin-top: 2px;">
        <form id="myForm"  method="post">
           <label for="comment">Add Comment</label>
           <input type="text" id="comment" value="">
           <input type="button" class = "submitFormData" onclick="SubmitFormData()" value="submit" data-id = "<?php echo $row['id']; ?>">
        </form>
       </div>

      </div>
    </div>
    <?php
     if(isset($_POST['submit']))
       {


         ?>
         <script type="text/javascript">
           window.location = "view.php";
         </script>
         <?php
       }
     ?>
  <?php } ?>


<!-- Add Jquery to page -->

<script src="jquery.min.js"></script>


<script>
$(document).ready(function(){
  // when the user clicks on like
  $(".submitFormData").on('click',function(event)
{
  var a = event.target.className;
  alert(a);
});
  $("button").on('click',function(event)
{
    var a = event.target.className;

    var x = document.getElementById(a);
 if (x.style.display === "none") {
   x.style.display = "block";
 } else {
   x.style.display = "none";
 }
});
  $('.like').on('click', function(){
    var postid = $(this).data('id');
        $post = $(this);

    $.ajax({
      url: 'view.php',
      type: 'post',
      data: {
        'liked': 1,
        'postid': postid
      },
      success: function(response){
        $post.parent().find('span.likes_count').text(response + " likes");
        $post.addClass('hide');
        $post.siblings().removeClass('hide');
      }
    });
  });

  // when the user clicks on unlike
  $('.unlike').on('click', function(){
    var postid = $(this).data('id');
      $post = $(this);

    $.ajax({
      url: 'view.php',
      type: 'post',
      data: {
        'unliked': 1,
        'postid': postid
      },
      success: function(response){
        $post.parent().find('span.likes_count').text(response + " likes");
        $post.addClass('hide');
        $post.siblings().removeClass('hide');
      }
    });
  });
});
</script>
</div>
<div class="b2">
   <iframe src="users.php" width="100%" height="100%" frameborder = 0></iframe>
</div>
</div>
	<!-- display posts gotten from the database  -->

</body>
</html>