traer.index()
document.querySelector(".tipos").addEventListener("click", e => {
   const tar = e.target
   if (tar.tagName != "SPAN") {
      return;
   }
   tar.parentNode.querySelector(".act").classList.remove("act");
   tar.classList.add("act")
   traer.index(e.target.dataset.i)
})