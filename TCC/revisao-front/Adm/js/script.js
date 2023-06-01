function toggleMenu() {
    // Importa o elemento 'ul' do DOM
    const listaDoMenu = document.querySelector('ul');
    // Verifica o status atual do atributo active
    const activeStatus = listaDoMenu.getAttribute('active');
    // Troca o status para seu contrário
    if (activeStatus) {
        listaDoMenu.removeAttribute('active')
        listaDoMenu.style.transform = 'translateX(160px)';
    } else {
        listaDoMenu.setAttribute('active', true)
        listaDoMenu.style.transform = 'translateX(-160px)';
    }
}

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  var quantidade = button.getAttribute('data-bs-whateverquantidade')
  var data = button.getAttribute('data-bs-whateverdt_fornada')

  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')
  var modalQuantidade = exampleModal.querySelector('#Quantidade')
  var modalData = exampleModal.querySelector('#Data')

  //atribui o valor para os inputs e titulo.
  modalTitle.textContent = 'Editar fornada ID(' + recipient + ')'
  modalBodyInput.value = recipient
  modalQuantidade.value = quantidade
  modalData.value = data
})