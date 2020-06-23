<?php
setPageTitle('Homepage');
include('top.php'); 
?>

    <div class="topnav" style="overflow: visible;">
        <div class="search-container">
            <div class="searchBox">
                <div style="position: relative;">
                    <input autocomplete="off" type="text" class="searchField" id="search-by-name" placeholder="Search your videos...">
                    <div class="sugestRes" id="sugestRes">
                    </div>
                </div>

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