function toggleAdditionalInfo(card) {
    const additionalInfo = card.querySelector('.additional-info');
    additionalInfo.style.display = additionalInfo.style.display === 'none' ? 'block' : 'none';
}

// Adiciona evento de clique a todos os botões ou ícones de "Mostrar informações adicionais"
const showInfoElements = document.querySelectorAll('.show-info');
showInfoElements.forEach(element => {
    element.addEventListener('click', () => {
        const card = element.parentNode;
        toggleAdditionalInfo(card);
    });
});