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

const chk = document.getElementById('chk')
chk.addEventListener('change', () => {
    document.body.classList.toggle('dark')
})

