var modheigth = 1.2;
var modwidht = .98;
var imgratio = .55; //height of the div section-instagram
var h = window.innerHeight;
var w = window.innerWidth;
var fullpicwidth = .55; // width of the section section-instagram-fullpicwidt
var widthgrid = 1-fullpicwidth;
var thumbnailratio = 150; //pixels
var padding = 2; //pixels

function wah(){
  var heightwin = (h*modheigth)+"px";
  var widhtwin = (w*modwidht)+"px";
  document.getElementById("section").style.height = heightwin;
  document.getElementById("section").style.width = widhtwin;
  document.getElementById("section").style.paddingLeft = (w-(w*modwidht))/2+"px";
  document.getElementById("section").style.paddingRight = (w-(w*modwidht))/2+"px";
}

var slideIndex = 0;

function instagram(category){

  if(category==0){
    slideIndex = 0;
    showSlides();
  }else {
    slideIndex = category;
    currentslide(slideIndex);
  }

  function currentslide(index){
    var slideIndex = index;
    var slides = document.getElementsByClassName("mySlides");
    var thumbnail = document.getElementsByClassName('thumbnailimg');
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      thumbnail[i].className = thumbnail[i].className.replace(" active","");
    }
    slides[slideIndex-1].style.display = "block";
    thumbnail[slideIndex-1].className += " active";
    var activeImg = document.getElementById('image'+slideIndex);
    activeImg.style.height = (h*imgratio*modheigth)+"px";
    var totalPad = (w*fullpicwidth)-activeImg.width;
    activeImg.style.paddingLeft = (totalPad/2)+"px";
    activeImg.style.paddingRight = (totalPad/2)+"px";
  }


  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var thumbnail = document.getElementsByClassName('thumbnailimg');
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      thumbnail[i].className = thumbnail[i].className.replace(" active","");
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    thumbnail[slideIndex-1].className += " active";
    var activeImg = document.getElementById('image'+slideIndex);
    activeImg.style.height = (h*imgratio*modheigth)+"px";
    var totalPad = (w*fullpicwidth)-activeImg.width;
    activeImg.style.paddingLeft = (totalPad/2)+"px";
    activeImg.style.paddingRight = (totalPad/2)+"px";
    setTimeout(showSlides, 7000);
  }
}

function resizeandconquer(rows, columns){
  var heightofdiv = h*imgratio*modheigth;
  var widthofdiv = w*widthgrid*modwidht;
  var sizeofpics = (heightofdiv-((rows+1)*padding))/rows;
  if(sizeofpics*columns>(widthofdiv-((columns+1)*padding))){
    var sizeofpics = (widthofdiv-((columns+1)*padding))/columns;
  }
  var thumbnails = document.getElementsByClassName('thumbnailimg');
  for(var i = 0; i<thumbnails.length;i++){
    thumbnails[i].style.width = sizeofpics+"px";
  }
  var col= document.getElementsByClassName('column');
  for(var i = 0; i<col.length;i++){
    col[i].style.flex = (100/columns)+"%";
  }
}
