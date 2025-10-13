import { quartosDisponivelRequest } from "../api/roomAPI.js";
import DataSelector from "../components/DataSelector.js";
import Hero from "../components/Hero.js";
import NavBar from "../components/NavBar.js";
import RoomCard from "../components/RoomCard.js";
import Footer from "../components/Footer.js";
import Modal from "../components/Modal.js";
import Spinner from "../components/Spinner.js";
import CardLounge from "../components/Cardlounge.js";

export default function renderHomePage() {
    // Limpar e renderizar navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = NavBar();
    nav.appendChild(navbar);

    // Limpar e renderizar conteúdo principal
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    // Adicionar hero section
    const hero = Hero();
    divRoot.appendChild(hero);

    // Adicionar seletor de datas
    const dateSelector = DataSelector();
    divRoot.appendChild(dateSelector);

    // Obter elementos do formulário
    const guestsSelect = dateSelector.querySelector('.guests-select');
    const [dateCheckIn, dateCheckOut] = dateSelector.querySelectorAll('input[type="date"]');
    const btnSearchRoom = dateSelector.querySelector('button');


    // Criar container para cards de infraestrutura (lounge)
    const infraGroup = document.createElement('div');
    infraGroup.className = 'lounge-cards-container';

    // Criar container para os cards de quartos (resultados)
    const cardsGroup = document.createElement('div');
    cardsGroup.className = 'room-cards-container';
    cardsGroup.id = "cards-result";


    const loungeItens = [
        {caminho: "restaurante.jpeg", titulo: "Restaurante", 
            texto: "capaz de encantar os paladares mais exigentes. Aprecie o menu exclusivo em ambiente aconchegante, com atendimento personalizado e na charmosa região dos Jardins"},
        {caminho: "salao.jpg", titulo: "Salão de festas", 
            texto: "O Nocturne Royal, possui uma áreas para festa, distribuídas em 09 salas, localizadas em dois andares totalmente dedicados à realização de eventos. " +
            "Apresenta estrutura versátil e uma equipe exclusiva de profissionais especializados em eventos corporativos e sociais"},
        {caminho: "bar.jpg", titulo: "Bar", 
            texto: "Um cardápio variado de bebidas e petiscos, unido a uma atmosfera cosmopolita, proporciona momentos únicos entre amigos."}
    ];

    for(let i = 0; i < loungeItens.length; i++){
        const cardLounge = CardLounge(loungeItens[i], i);
        infraGroup.appendChild(cardLounge);
    }

    btnSearchRoom.addEventListener('click', async (e) => {
        e.preventDefault();

        const dataInicio = (dateCheckIn?.value || "").trim();
        const dataFim = (dateCheckOut?.value || "").trim();
        const qtd = parseInt(guestsSelect?.value || "0", 10);

        // Validar preenchimento dos campos
        if (!dataInicio || !dataFim || Number.isNaN(qtd) || qtd <= 0) {
            Modal("Por favor, preencha todos os campos corretamente.", "Campos Obrigatórios");
            return;
        }

        // Validar datas
        const inicio = new Date(dataInicio);
        const fim = new Date(dataFim);

        if (isNaN(inicio) || isNaN(fim) || inicio >= fim) {
            Modal("A data de check-out deve ser posterior à data de check-in.", "Data Inválida");
            return;
        }

        // Mostrar spinner de carregamento
        const spinner = Spinner("Buscando quartos disponíveis...");
        spinner.show();

        try {
            const quartos = await quartosDisponivelRequest({ dataInicio, dataFim, qtd });

            // Esconder spinner
            spinner.hide();

            if (!quartos.length) {
                Modal("Nenhum quarto disponível para esse período. Tente outras datas.");
                return;
            }

            // Limpar container e adicionar cards
            cardsGroup.innerHTML = '';

            quartos.forEach((itemCard, i) => {
                cardsGroup.appendChild(RoomCard(itemCard, i));
            });

        }
        catch (error) {
            // Esconder spinner em caso de erro
            spinner.hide();
            console.error("Erro ao buscar quartos:", error);
            Modal("Ocorreu um erro ao buscar os quartos. Tente novamente.", "Erro");
        }
    });

    // Adicionar containers ao root: primeiro infraestrutura, depois resultados
    divRoot.appendChild(infraGroup);
    divRoot.appendChild(cardsGroup);

    // Limpar e renderizar footer
    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);
}