
var openModalBtn = document.getElementById('openModalBtn');

var closeModal = document.getElementById('closeModal');

var modal = document.getElementById('modal');

openModalBtn.addEventListener('click',function(){
	modal.style.display = 'block';
});

closeModal.addEventListener('click',function(){
	modal.style.display = 'none';
});