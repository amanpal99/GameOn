const slide = document.querySelector('.slides');
const slideImages = document.querySelectorAll('.slides img');
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

// counter
let counter = 1;
const size = slideImages[0].clientWidth;

slide.style.transform = 'translateX(' + (-size * counter) + 'px)';

//start
carousel();

// btn listener
nextBtn.addEventListener('click',()=>{
  if(counter >= slideImages.length -1 ) return;
  slide.style.transition = "transform 0.8s ease-in-out";
  counter++;
  slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

prevBtn.addEventListener('click',()=>{
  if(counter <= 0) return;
  slide.style.transition = "transform 0.8s ease-in-out";
  counter--;
  slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
});

slide.addEventListener('transitionend', ()=>{
  if(slideImages[counter].id === 'lastclone'){
    slide.style.transition = "none";
    counter = slideImages.length - 2;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
  if(slideImages[counter].id === 'firstclone'){
    slide.style.transition = "none";
    counter = slideImages.length - counter;
    slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
});

function carousel() {
  if(counter >= slideImages.length -1 ) return;
  slide.style.transition = "transform 0.4s ease-in-out";
  counter++;
  slide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
