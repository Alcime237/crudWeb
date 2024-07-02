const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}
document.querySelector('.parcourir').addEventListener('click', function() {
  document.getElementById('fileInput').click();
});
document.getElementById('fileInput').addEventListener('change', function() {
  var file = this.files[0];
  var imageType = /image.*/;

  if (file.type.match(imageType)) {
    var reader = new FileReader();

    reader.onload = function() {
      var img = new Image();
      img.src = reader.result;
      // img.style.maxWidth = '100%';
      img.style.width='350px';
      img.style.height='248px';
      img.style.borderRadius='10px'
      document.getElementById('photo').innerHTML = '';
      document.getElementById('photo').appendChild(img);
    }

    reader.readAsDataURL(file);
  } else {
    alert('Veuillez sélectionner un fichier image.');
  }
});

