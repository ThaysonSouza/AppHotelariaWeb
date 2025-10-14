export default function CardLounge(cardLoungeItem, index = 0){

    const{
        caminho,
        titulo,
        texto
    } = cardLoungeItem || {}

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
    <div class="lounge-card">
        <div class="lounge-image">
            <img src="public/assets/images/${caminho}" alt="${titulo}">
            <div class="lounge-overlay">
                <h3 class="lounge-title">${titulo}</h3>
                <p class="lounge-desc">${texto}</p>
            </div>
        </div>
    </div>
    `

    return wrapper.firstElementChild;
}