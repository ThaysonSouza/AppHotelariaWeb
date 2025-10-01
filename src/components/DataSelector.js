export default function DataSelector() {
    const divDateSelector = document.createElement('div');
    divDateSelector.className = 'data-selector-container';

    // Container principal com design moderno
    const selectorCard = document.createElement('div');
    selectorCard.className = 'data-selector-card';

    // Seção de datas
    const datesSection = document.createElement('div');
    datesSection.className = 'dates-section';

    const dateCheckIn = document.createElement('div');
    dateCheckIn.className = 'date-input-group';
    dateCheckIn.innerHTML = `
        <label class="date-label">
            <i class="bi bi-calendar-check"></i>
            Check-in
        </label>
        <input type="date" class="date-input" placeholder="Selecione a data">
    `;
    
    const dateCheckOut = document.createElement('div');
    dateCheckOut.className = 'date-input-group';
    dateCheckOut.innerHTML = `
        <label class="date-label">
            <i class="bi bi-calendar-x"></i>
            Check-out
        </label>
        <input type="date" class="date-input" placeholder="Selecione a data">
    `;

    datesSection.appendChild(dateCheckIn);
    datesSection.appendChild(dateCheckOut);

    // Seção de hóspedes simplificada
    const guestsSection = document.createElement('div');
    guestsSection.className = 'guests-section';
    guestsSection.innerHTML = `
        <label class="guests-label">
            <i class="bi bi-people"></i>
            Hóspedes
        </label>
        <select class="guests-select">
            <option value="1">1 pessoa</option>
            <option value="2" selected>2 pessoas</option>
            <option value="3">3 pessoas</option>
            <option value="4">4 pessoas</option>
            <option value="5">5 ou mais pessoas</option>
        </select>
    `;

    // Botão de pesquisa
    const searchSection = document.createElement('div');
    searchSection.className = 'search-section';
    const btnSearch = document.createElement('button');
    btnSearch.type = 'button';
    btnSearch.className = 'search-btn';
    btnSearch.innerHTML = `
        <i class="bi bi-search"></i>
        <span>Pesquisar</span>
    `;

    searchSection.appendChild(btnSearch);

    // Montar o card
    selectorCard.appendChild(datesSection);
    selectorCard.appendChild(guestsSection);
    selectorCard.appendChild(searchSection);
    divDateSelector.appendChild(selectorCard);

    return divDateSelector;
}

