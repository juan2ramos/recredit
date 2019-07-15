const modalClose = document.querySelectorAll('.modalClose'),
  openModalButton = document.querySelectorAll('.openModal');

export default function () {
  
  if (modalClose) {
    modalClose.forEach(function (item) {
      item.addEventListener('click', function () {
        document.querySelectorAll('.Modal').forEach(function (item) {
          item.classList.add('is-hidden')
        })
      });
    });
    
    openModalButton.forEach(function (item) {
      item.addEventListener('click', function (e) {
        e.preventDefault();
        const modal = document.getElementById(item.dataset.modal);
        modal.classList.remove('is-hidden')
      });
    })
  }
  
}
