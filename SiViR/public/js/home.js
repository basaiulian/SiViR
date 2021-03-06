
var submitButton = document.getElementById('submit-button');

var searchByNameInput = document.getElementById('search-by-name');

var orderByInput = document.getElementById('order');

var durationInput = document.getElementById('duration');

var websiteInput = document.getElementById('website');

var loadingVideos = document.getElementById('loadingVideos');

var videosBox = document.getElementById('videosBox');

var floatingButton = document.getElementById("homeFloatingButton");

var closeModalButton = document.getElementById('closeModal');

var modal = document.getElementById('modal');

submitButton.addEventListener('click',searchVideos);

closeModalButton.addEventListener('click',closeModal);

// window.addEventListener('load',getSearches);

var gifHtml = loadingVideos.outerHTML;

function closeModal(){
	modal.style.display='none';
	modal.getElementsByClassName('modalVideosContent')[0].innerHTML = '';
}

function searchVideos(){

	var keywords = searchByNameInput.value;
	var order = orderByInput.value;
	var duration = durationInput.value;
	var website = websiteInput.value;
	

	if(keywords.length == 0){
		return;
	}

	videosBox.style.display = 'block';
	videosBox.innerHTML = gifHtml;
	loadingVideos = document.getElementById('loadingVideos');
	loadingVideos.style.display = 'block';

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadingVideos.style.display = 'none';
			
			let data = [];

			if(this.responseText.charAt(0)=="<"){
				console.log("eroare");
				videosBox.innerHTML="No results";
			} else {
				data = JSON.parse(this.responseText);
			}

			

		    for(let i=0; i<data.length; i++){

		    	let videoHtml = ``;

				let title = decodeHtml(data[i].title); 
				let description = decodeHtml(data[i].description); 
				let source = decodeHtml(data[i].type);
				let author = decodeHtml(data[i].author);
				

		    	if(author==' '){
					videoHtml = `
				<div class="video" data-video="${data[i].video_src}" data-type="${data[i].type}" 
		    	\data-video_id="${data[i].video_id}" data-title="${data[i].title}" data-description="${data[i].description}" data-author="${data[i].author}" data-thumbnail="${data[i].thumbnail}">
					<div class="Thumbnail">
						<img class="videoThumbnail videoImg" src="${data[i].thumbnail}" >
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
				<div class="video" data-video="${data[i].video_src}" data-type="${data[i].type}" 
		    	\data-video_id="${data[i].video_id}" data-title="${data[i].title}" data-description="${data[i].description}" data-author="${data[i].author}" data-thumbnail="${data[i].thumbnail}">
					<div class="Thumbnail">
						<img class="videoThumbnail videoImg" src="${data[i].thumbnail}">
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
	xhttp.open("GET", "http://localhost/sivir/api/video.php?action=search&keyword="+keywords+"&order="+order+"&duration="+duration+"&types="+website, true);
	xhttp.send();
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
				<iframe id="youtube_iframe" width="1200" height="600" src="${video_src}" frameborder="0" allowfullscreen></iframe>
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
				
				insertVideo(type, video_src, video_id, title1, description1, thumbnail1, author1);

			modal.getElementsByClassName('modalVideosContent')[0].innerHTML = videoIframe;
		});
	}
}

function insertVideo(type, video_src, video_id, title, description, thumbnail, author) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log("Video saved");
	  } else {
		console.log("Saving video...");
	  }
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=insertVideo&username=TEST&type="+type+"&video_src="+video_src+"&video_id="+video_id+"&title="+title+"&description="+description+"&thumbnail="+btoa(thumbnail)+"&author="+author);
  }

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

var suggestionsArray = [];

function getSearches(){

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadingVideos.style.display = 'none';
			let data = JSON.parse(this.responseText);

		    for(let i=0; i<data[0].length; i++){
				let keyword = decodeHtml(data[0][i].keyword); 
				
				suggestionsArray.push(keyword);
			}
		}
	};
	xhttp.open("POST", "api/user.php?", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("action=getSearches");

	return suggestionsArray;
}

var searchByNameInput = document.getElementById('search-by-name');

var sugestRes = document.getElementById('sugestRes');

var usernameSearches = getSearches();

searchByNameInput.onkeyup = function(){

	sugestRes.innerHTML = '';

	sugestRes.style.padding = "0px";
	sugestRes.style.border = "0px";

	if(searchByNameInput.value == '')
		return;

	let ok = 0;

	for(let i=0; i<usernameSearches.length; i++ ){

		if(usernameSearches[i].substr(0, searchByNameInput.value.length).toUpperCase() == searchByNameInput.value.toUpperCase()){
			sugestRes.innerHTML += `<p onclick="setSugest(this)">${usernameSearches[i]}</p>`;
			sugestRes.style.padding = "7px";
			sugestRes.style.border = "1px solid #333";
			ok = 1;
		}
	}
	
	if(ok == 1){
		sugestRes.style.padding = "7px";
		sugestRes.style.border = "1px solid #333";
	}
	
;};

function setSugest(res){
	document.getElementById('search-by-name').value=res.innerHTML;
	document.getElementById('sugestRes').innerHTML='';
	sugestRes.style.padding = "0px";
	sugestRes.style.border = "0px";

}

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


