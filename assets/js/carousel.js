window.addEventListener("load", () => {
  let slideIndex = 0;
  btns = document.querySelector(".carousel-btns");
  carouselItems = document.querySelector(".carousel-items").children;
  let carouselProgress = [].slice.call(
    document.querySelector(".carousel-progress").children
  );
  prev = btns.firstElementChild;
  next = btns.lastElementChild;

  let autoSlide = setInterval(slide, 5000);

  function slide(index = slideIndex + 1) {
    clearInterval(autoSlide);
    newIndex = index;
    if (newIndex == carouselItems.length) newIndex = 0;
    if (newIndex < 0) newIndex = carouselItems.length - 1;
    carouselItems[newIndex].scrollIntoView({
      behavior: "smooth",
      block: "nearest",
      inline: "center",
    });
    slideIndex = newIndex;
    autoSlide = setInterval(slide, 5000);
    setCarouselProgress(newIndex);
  }

  function setCarouselProgress(active) {
    carouselProgress.forEach((progress, index) => {
      if (index == active) progress.classList.add("active");
      else progress.classList.remove("active");
    });
  }

  next.addEventListener("click", () => slide());
  prev.addEventListener("click", () => slide(slideIndex - 1));

  carouselProgress.forEach((progress, index) => {
    progress.addEventListener("click", () => slide(index));
  });
});
