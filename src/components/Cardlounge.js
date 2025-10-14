export default function CardLounge(cardLoungeItem, index = 0){

    const{
        caminho,
        titulo,
        texto
    } = cardLoungeItem || {}

    const cardLounge = document.createElement('div');
    cardLounge.innerHTML = `
    <div class="card lounge-card">
        <img src="public/assets/images/${caminho}" class="card-img-top" alt="${titulo}">
        <div class="btn-group dropup w-100">
            <button type="button" class="btn w-100 lounge-header lounge-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="lounge-toggle-icon" aria-hidden="true">
                    <img src="public/assets/images/caret-up.svg" width="20" height="20" alt="abrir">
                </span>
                <span class="lounge-title">${titulo}</span>
            </button>
            <ul class="dropdown-menu w-100 lounge-dropdown">
                <li><p>${texto}</p></li>
            </ul>
        </div>
    </div>
    `

    return cardLounge;
}