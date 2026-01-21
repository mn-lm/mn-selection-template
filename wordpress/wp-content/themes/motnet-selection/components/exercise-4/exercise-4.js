document.addEventListener("DOMContentLoaded", () => {
  const instances = document.querySelectorAll(".exercise-4");

  instances.forEach(instance => {
    const items = instance.querySelectorAll(".exercise-4__item");
    const openClass = "exercise-4__item--open";
    const openFirst = instance.dataset.openFirst === "true";
    const singleOpen = instance.dataset.singleOpen === "true";

    if (openFirst && items[0]) {
      items[0].classList.add(openClass);
    }

    const closeAll = () =>
      items.forEach(item => item.classList.remove(openClass));

    items.forEach(item => {
      const trigger = item.querySelector(".exercise-4__item-header");
      trigger.addEventListener("click", () => {
        const isOpen = item.classList.contains(openClass);
        if (!isOpen && singleOpen) closeAll();
        item.classList.toggle(openClass, !isOpen);
      });
    });
  });
});
