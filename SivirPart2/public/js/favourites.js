var loadingVideos = document.getElementById('loadingVideos');

var videosBox = document.getElementById('videosBox');

var floatingButton = document.getElementById("floatingButton");

window.addEventListener('load',getVideos);

var gifHtml = loadingVideos.outerHTML;

function getVideos(){

	videosBox.style.display = 'block';
	videosBox.innerHTML = gifHtml;
	loadingVideos = document.getElementById('loadingVideos');
	loadingVideos.style.display = 'block';

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadingVideos.style.display = 'none';
			let data = JSON.parse(this.responseText);

			console.log(data);

		    for(let i=0; i<data[0].length; i++){
		    	let videoHtml = ``;

				let title = decodeHtml(data[0][i].title); 
				let description = decodeHtml(data[0][i].description); 
				let source = decodeHtml(data[0][i].type);
				let author = decodeHtml(data[0][i].author);
	
		    	if(author==' '){
					videoHtml = `
				<div class="video" data-video="${data[0][i].video_src}" data-type="${data[0][i].type}" 
		    	\data-video_id="${data[0][i].video_id}" data-title="${data[0][i].title}" data-description="${data[0][i].description}" data-author="${data[0][i].author}" data-thumbnail="${data[0][i].thumbnail}">
					<div class="Thumbnail">
						<img class="videoThumbnail videoImg" src="${data[0][i].thumbnail}" >
					</div>
					<div class="videoData">
						<p class="videoTitle" ><strong>Title:</strong> ${title}</p>
						<p class="videoDescription" ><strong>Description:</strong> ${description}</p>
						<p class="videoSource" ><strong>Source:</strong> ${source}</p>
					</div>
				</div>
				`;
				} else {
					videoHtml = `
				<div class="video" data-video="${data[0][i].video_src}" data-type="${data[0][i].type}" 
		    	\data-video_id="${data[0][i].video_id}" data-title="${data[0][i].title}" data-description="${data[0][i].description}" data-author="${data[0][i].author}" data-thumbnail="${data[0][i].thumbnail}">
					<div class="Thumbnail">
						<img class="videoThumbnail videoImg" src="${data[0][i].thumbnail}">
					</div>
					<div class="videoData">
					<p class="videoTitle" ><strong>Title:</strong> ${title}</p>
					<p class="videoDescription" ><strong>Description:</strong> ${description}</p>
					<p class="videoSource" ><strong>Source:</strong> ${source}</p>
						<p class="videoAuthor" ><strong>Author:</strong> ${author}</p>
					</div>
				</div>
				`;
				}


		    	videosBox.innerHTML += videoHtml;
			}
		
		    setVideosModals();
		}
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=getFavourites");
}

var openModalBtn = document.getElementById('openModalBtn');

var closeModal = document.getElementById('closeModal');

var modal = document.getElementById('modal');

function setVideosModals(){
	var videos = document.getElementsByClassName('video');

	for(let i=0; i<videos.length; i++){

		let video_img = videos[i].getElementsByClassName('videoImg')[0];
		video_img.addEventListener('click',function (){
			modal.style.display = 'block';

			let title1 = videos[i].dataset.title; 
			
			let description1 = videos[i].dataset.description; 
			let author1 = videos[i].dataset.author;
			console.log(author1);
			let thumbnail1 = videos[i].dataset.thumbnail;

			let video_src = videos[i].dataset.video;
			let video_id = videos[i].dataset.video_id;
			let type = videos[i].dataset.type;
			let videoIframe = ``;

			if(type == 'youtube'){
				videoIframe = `
				<iframe width="1200" height="600" src="${video_src}" frameborder="0" allowfullscreen></iframe>
				`;
			}
			else 
				if(type == 'vimeo'){
				videoIframe = `
				<iframe src="https://player.vimeo.com/video/${video_id}" width="1200" height="600"
				 frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
				`;
				}
			else
				if(type == 'instagram'){
				videoIframe = `
				<iframe  height="600" src="${video_src}/embed" frameborder="0" allowfullscreen></iframe>
				`;
				}
				
				

			modal.getElementsByClassName('modalVideosContent')[0].innerHTML = videoIframe;


		});
	}
}

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

function closeModal(){
    document.getElementById('modal').style.display='none';
    document.getElementById('modal').getElementsByClassName('modalVideosContent')[0].innerHTML = '';
}

document.getElementById('closeModal').addEventListener('click',closeModal);

window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    floatingButton.style.display = "block";
  } else {
    floatingButton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


