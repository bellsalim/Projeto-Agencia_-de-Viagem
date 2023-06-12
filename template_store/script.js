const modal = document.querySelector("#modal")
const buyTicketsButton = document.querySelector("#buy-tickets")
const closeButton = document.querySelector("#close-button")

buyTicketsButton.addEventListener("click", ()=>{
  modal.classList.add("active")
})

closeButton.addEventListener("click", ()=>{
  modal.classList.remove("active")
})

const swiper = new Swiper(".swiper", {
  spaceBetween: 30,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: false,
  },
})
