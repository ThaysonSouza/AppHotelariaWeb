export default function CardLounge(cardLoungeItem, index = 0){

    const{
        caminho,
        titulo,
        texto
    } = cardLoungeItem || {}

    const cardLounge = document.createElement('div');

    cardLounge.innerHTML = `
    
    <div class="card" style="width: 18rem; height: 17rem;">
        <img src="public/assets/images/${caminho}" class="card-img-top" alt="...">
        <div class="btn-group dropup">
            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style="border: none";>
                <img src="public/assets/images/caret-up.svg" width="20" height="20">
               <h3 classe="card-text" style= "font-size: 1rem; font-weight:700;">${titulo}</h3>
            </button>
            <ul class="dropdown-menu" style="border-radius: 0.375rem 0.375rem 0 0;">
                <p classe="card-text" style="text-align: center";>${texto}</p>
            </ul>
        </div>
    </div>
    `


    return cardLounge;
}