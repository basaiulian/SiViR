<?php include('top.php'); ?>

<div class="topnav">
    <div class="search-container">
        <form action="index.php?page=search" method="post">
            <input type="text" id="search-by-name" placeholder="Search your videos..." name="search">
            <button id="submit-button" type="submit" name="search_form"><i class="fa fa-search"></i></button>

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
        <img id=insta_img src="img/insta_color.png" />
    </div>
    <div id="yt">
        <img id=yt_img src="img/yt_color.png" />
    </div>
    <div id="vimeo">
        <img id=vimeo_img src="img/vimeo_color.png" />
    </div>

   


</div>

<?php include('bottom.php'); ?>