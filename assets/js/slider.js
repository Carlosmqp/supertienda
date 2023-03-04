const slider = document.querySelector("#slider");
let sliderSection = document.querySelectorAll(".slider_section");

let sliderSectionLast = sliderSection[sliderSection.length - 1];

const btnLeft = document.querySelector("#slider_btn-left");

const btnRight = document.querySelector("#slider_btn-right");

slider.insertAdjacentElement("afterbegin", sliderSectionLast);

function Next() {
  let sliderSectionFirts = document.querySelectorAll(".slider_section")[0];
  slider.style.marginLeft = "-200%";
  slider.style.transition = "all 0.5s";

  setTimeout(() => {
    slider.style.transition = "none";
    slider.insertAdjacentElement("beforeend", sliderSectionFirts);
    slider.style.marginLeft = "-100%";
  }, 500);
}

function Preview() {
  let sliderSection = document.querySelectorAll(".slider_section");
  let sliderSectionLast = sliderSection[sliderSection.length - 1];
  slider.style.marginLeft = "0";
  slider.style.transition = "all 0.5s";

  setTimeout(() => {
    slider.style.transition = "none";
    slider.insertAdjacentElement("afterbegin", sliderSectionLast);
    slider.style.marginLeft = "-100%";
  }, 500);
}
btnRight.addEventListener("click", function () {
  Next();
});

btnLeft.addEventListener("click", function () {
  Preview();
});

setInterval(() => {
  Next();
}, 3000);
