document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-exercise-5]").forEach(grid => {
    const items = Array.from(grid.querySelectorAll(".exercise-5__item"));
    if (!items.length) return;

    const imgs = items.map(item => item.querySelector("img"));
    const lightbox = grid.querySelector(".exercise-5__lightbox");
    const lightboxImg = lightbox.querySelector(".exercise-5__lightbox-image");
    const closeBtn = lightbox.querySelector(".exercise-5__close");
    const prevBtn = lightbox.querySelector(".exercise-5__nav.prev");
    const nextBtn = lightbox.querySelector(".exercise-5__nav.next");

    let index = 0;

    lightbox.hidden = true;

    const open = i => {
      index = i;
      lightboxImg.src = imgs[index].src;
      lightbox.hidden = false;
      document.body.style.overflow = "hidden";
    };

    const close = () => {
      lightbox.hidden = true;
      lightboxImg.src = "";
      document.body.style.overflow = "";
    };

    const prev = () => open((index - 1 + imgs.length) % imgs.length);
    const next = () => open((index + imgs.length + 1) % imgs.length);

    items.forEach((item, i) => {
      item.addEventListener("click", () => open(i));
    });

    closeBtn.addEventListener("click", close);
    prevBtn.addEventListener("click", prev);
    nextBtn.addEventListener("click", next);

    lightbox.addEventListener("click", e => {
      if (e.target === lightbox) close();
    });

    document.addEventListener("keydown", e => {
      if (lightbox.hidden) return;
      if (e.key === "Escape") close();
      if (e.key === "ArrowLeft") prev();
      if (e.key === "ArrowRight") next();
    });
  });
});
