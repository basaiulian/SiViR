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

<div id="poll-div">



</div>

<div class="sources">
    <div id="insta">
        <img alt="Instagram logo" id=insta_img src="public/img/insta_color.png" />
    </div>
    <div id="yt">
        <img alt="YouTube logo" id=yt_img src="public/img/yt_color.png" />
    </div>
    <div id="vimeo">
        <img alt="Vimeo logo" id=vimeo_img src="public/img/vimeo_color.png" />
    </div>

    <div id="poll-border">

        <div id="poll">
            <h3>Do you like this website?</h3>
            <form>
                Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
                No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
            </form>
        </div>

    </div>

</div>

<?php include('bottom.php'); ?>