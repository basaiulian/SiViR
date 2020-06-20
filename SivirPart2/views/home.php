<?php
setPageTitle('Homepage');
include('top.php'); 
?>

<div class="topnav">
    <div class="search-container">
        <form method="post">
            <input type="text" id="search-by-name" placeholder="Search your videos..." name="search">
            <button id="submit-button"  formaction="index.php?page=videos" type="submit" name="search_form"><i class="fa fa-search"></i></button>

            <div class="criteria">

                <div class="author-criteria">
                    <input type="text" class="author-input" placeholder="Youtube Channel" id="author-text"
                        name="author-criteria">
                </div>

                <div class="order-criteria">
                    <select id="order" value="Any" name="order-criteria">
                        <option class="order-option" value="relevance"> Order by </option>
                        <option class="order-option" value="relevance"> Relevance </option>
                        <option class="order-option" value="date"> Date </option>
                        <option class="order-option" value="viewCount"> View count </option>
                    </select>

                </div>

        </form>
    </div>
</div>


<div class="sources">
    <div id="insta">
        <img id=insta_img src="public/img/insta_color.png" />
    </div>
    <div id="yt">
        <img id=yt_img src="public/img/yt_color.png" />
    </div>
    <div id="vimeo">
        <img id=vimeo_img src="public/img/vimeo_color.png" />
    </div>
</div>

<!-- <button id="openModalBtn">Click me</button>

<div class="modal" id="modal">
    <div class="modalContent">
        <button id="closeModal">Close</button>
    </div>
</div> -->

<script type="text/javascript" src="public/js/home.js"></script>

<?php include('bottom.php'); ?>