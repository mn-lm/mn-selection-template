document.addEventListener("DOMContentLoaded", () => {

    console.log('Exercise 3 loaded');

    document.querySelectorAll("[data-slider]").forEach(slider => {
        const slides = Array.from(slider.querySelectorAll(".exercise-3__slide"));
        if (slides.length === 0) return;

        let index = 0;
        const dotsWrap = slider.querySelector(".dots");

        function set(i) {
            slides[index].classList.remove("is-active");
            if (dotsWrap) dotsWrap.children[index].classList.remove("is-active");
            index = (i + slides.length) % slides.length;
            slides[index].classList.add("is-active");
            if (dotsWrap) dotsWrap.children[index].classList.add("is-active");
        }

        slides[0].classList.add("is-active");

        if (slides.length > 1 && dotsWrap) {
            slides.forEach((_, i) => {
                const d = document.createElement("button");
                d.type = "button";
                d.addEventListener("click", () => set(i));
                dotsWrap.appendChild(d);
            });
            dotsWrap.children[0].classList.add("is-active");

            slider.querySelector(".prev").onclick = () => set(index - 1);
            slider.querySelector(".next").onclick = () => set(index + 1);
        }
    });
});
