<<<<<<< HEAD
<?php
setPageTitle('Favourites');
include('top.php'); 
?>


<button onclick="topFunction()" id="floatingButton" title="Go To Top"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </i> </button>
<button onclick='window.open("../../sivir/export/my_rss.xml")' id="rssFloatingButton" title="RSS FEED"> <i class="fa fa-rss" aria-hidden="true"></i></i> </i> </button>
<button type="submit" onclick="window.open('../../sivir/export/my_csv.csv')" id="csvFloatingButton" title="Export CSV"> <i class="fa fa-download" aria-hidden="true"></i></i> </i> </button>


<div class="videosBox" id="videosBox" style="margin-top:20px">
    <div class="loadingVideos" id="loadingVideos">
        <img src="public/img/loading.gif" width="60" />
        <p>Loading videos</p>
    </div>
</div>

<div class="modal" id="modal">
    <div class="modalContent">
        <button id="closeModal">Close</button>
        <div class="modalVideosContent"></div>
    </div>
</div>

<script type="text/javascript" src="public/js/favourites.js"></script>

=======
<?php
setPageTitle('Favourites');
include('top.php'); 
?>

<div class="videosBox" id="videosBox" style="margin-top:20px">
    <div class="loadingVideos" id="loadingVideos">
        <img src="public/img/loading.gif" width="60" />
        <p>Loading videos</p>
    </div>
</div>


<!-- <div class="sources">
    <div id="insta">
        <img id=insta_img src="public/img/insta_color.png" />
    </div>
    <div id="yt">
        <img id=yt_img src="public/img/yt_color.png" />
    </div>
    <div id="vimeo">
        <img id=vimeo_img src="public/img/vimeo_color.png" />
    </div>
</div> -->

<!-- <button id="openModalBtn">Click me</button>
 -->
<div class="modal" id="modal">
    <div class="modalContent">
        <button id="closeModal">Close</button>
        <div class="modalVideosContent"></div>
    </div>
</div>

<script type="text/javascript">
function closeModal(){
    document.getElementById('modal').style.display='none';
    document.getElementById('modal').getElementsByClassName('modalVideosContent')[0].innerHTML = '';
}

document.getElementById('closeModal').addEventListener('click',closeModal);
</script>

<script type="text/javascript" src="public/js/favourites.js"></script>

>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
<?php include('bottom.php'); ?>