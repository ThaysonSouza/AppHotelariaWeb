import { quartosDisponivelRequest } from "../api/roomAPI.js";
import DataSelector from "../components/DataSelector.js";
import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import RoomCard from "../components/RoomCard.js";
import Footer from "../components/footer.js";

export default function renderHomePage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root')
    divRoot.innerHTML = '';

    const hero = Hero();
    divRoot.appendChild(hero);

    const dateSelector = DataSelector();
    divRoot.appendChild(dateSelector);

    const guestsSelect = dateSelector.querySelector('.guests-select');
    const [dateCheckIn, dateCheckOut] = dateSelector.querySelectorAll('input[type="date"');


    const cardsGroup = document.createElement('div');
    cardsGroup.className = 'room-cards-container';
    cardsGroup.id = "cards-result";
    ;

    const btnSearchRoom = dateSelector.querySelector('button');
    btnSearchRoom.addEventListener('click', async (e) => {
        e.preventDefault();

        const dataInicio = (dateCheckIn?.value || "").trim();
        const dataFim = (dateCheckOut?.value || "").trim();
        const qtd = parseInt(guestsSelect?.value || "0", 10);

        //Validando do preenchimento de infos
        if (!dataInicio || !dataFim || Number.isNaN(qtd) || qtd <= 0) {
            console.log("preencha todos os campos!");
            /* Tarefa 1: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/ */

            return;
        }

        const inicio = new Date(dataInicio);
        const fim = new Date(dataFim);

        if (isNaN(inicio) || isNaN(fim) || inicio >= fim) {
            console.log("A data de check-out deve ser posterior ao check-in");
            /* Tarefa 2: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/ */
            return;
        }

        console.log("buscando quartos disponiveis");
        /* Tarefa 3: Renderizar na tela um símbolo de loading (spinner do bootstrap)!
        https://getbootstrap.com/docs/5.3/components/spinners/ */

        try {
            const quartos = quartosDisponivelRequest({ dataInicio, dataFim, qtd });
            if (!XPathResult.length) {
                console.log("nenhum rtquao disponivel para esse periodo!");

                console.log("Nenhum quarto disponível para esse período!");
                /* Tarefa 4: Renderizar nesse if() posteriormente um modal do bootstrap!
                https://getbootstrap.com/docs/5.3/components/modal/ */
                return;
            }
            cardsGroup.innerHTML = '';

            quartos.forEach((itemCard, i) => {
                cardsGroup.appendChild(RoomCard(itemCard, i));
            });

        } catch (error) {
            console.log(error);
        }
    });

    divRoot.appendChild(cardsGroup);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';

    const footer = Footer();
    rodape.appendChild(footer);

}