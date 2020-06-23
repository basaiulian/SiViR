<?php
setPageTitle('Homepage');
include('top.php'); 
?>

    <div class="topnav">
        <div class="search-container">
            <div class="searchBox">

                <input type="text" class="searchField" id="search-by-name" placeholder="Search your videos...">
                

                <select id="order" class="searchField">
                    <option value="relevance"> The Most Relevant </option>
                    <option value="date"> The Most Recent </option>
                    <option value="viewCount"> The Most Viewed </option>
                </select>

                <select id="duration" class="searchField">
                    <option value="short"> Duration </option>
                    <option value="short"> Short </option>
                    <option value="medium"> Medium </option>
                    <option value="long"> Long </option>
                </select>

                <select id="website" class="searchField">
                    <option value="any"> Website </option>
                    <option value="youtube"> Youtube </option>
                    <option value="instagram"> Instagram </option>
                    <option value="vimeo"> Vimeo </option>
                </select>

                <button id="submit-button" class="searchField"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <button onclick="topFunction()" id="homeFloatingButton" title="Go To Top"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </i> </button>

    <div class="videosBox" id="videosBox">
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

    <div class="modal" id="modal">
        <div class="modalContent">
            <button id="closeModal">Close</button>
            <div class="modalVideosContent"></div>
        </div>
    </div>

    <script type="text/javascript">

        
    </script>

    <script type="text/javascript" src="public/js/home.js"></script>

</div>

<?php include('bottom.php'); ?>