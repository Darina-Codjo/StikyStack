const card = document.querySelector('.card');
const container = document.querySelector('.container');

//Items
const title = document.querySelector('.title');
const pp = document.querySelector('.pp img');
const description_profil = document.querySelector('.description_profil');


//Moving Animation Event
container.addEventListener('mousemove',(e) => {
	let xAxis = (window.innerWidth /2 - e.pageX)/100;
	let yAxis = (window.innerHeight /2 - e.pageY)/100;
	card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});

//Animate In
container.addEventListener('mouseenter', e => {
	card.style.transition = 'none';
	//Popout
	title.style.transform='translateZ(50px)';
	pp.style.transform='translateZ(50px)';
	description_profil.style.transform='translateZ(50px)';
});



//Animate Out
container.addEventListener('mouseleave', e => {
	card.style.transition = 'all 1s ease';
	card.style.transform= `rotateY(0deg) rotateX(0deg)`;
	//Popback
	title.style.transform='translateZ(0px)';
	pp.style.transform='translateZ(0px)';
	description_profil.style.transform='translateZ(0px)';
});



const file= document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');

file.addEventListener('change',function(){
	//this refers to file
	const choosedFile=this.files[0];
	if(choosedFile){
		const reader= new FileReader();
		//FileReader is a predifined function of js
		reader.addEventListener('load',function(){
			pp.setAttribute('src',reader.result);
		});

		reader.readAsDataURL(choosedFile);
	}
});

