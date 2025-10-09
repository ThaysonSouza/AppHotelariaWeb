import { quartosDisponivelRequest } from "../api/roomAPI.js";
import DataSelector from "../components/DataSelector.js";
import Hero from "../components/Hero.js";
import NavBar from "../components/NavBar.js";
import RoomCard from "../components/RoomCard.js";
import Footer from "../components/Footer.js";
import Modal from "../components/Modal.js";
import Spinner from "../components/Spinner.js";

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

    // Criar container para os cards de quartos
    const cardsGroup = document.createElement('div');
    cardsGroup.className = 'room-cards-container';
    cardsGroup.id = "cards-result";

    // Configurar evento do botão de busca
    const btnSearchRoom = dateSelector.querySelector('button');

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

            if (quartos.length === 0) {
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

    // Exemplos de quartos para exibir inicialmente
    const quartosExemplo = [
        {
            nome: "Quarto Standard",
            numero: "101",
            camaSolteiro: 2,
            camaCasal: 0,
            preco: 150.00
        },
        {
            nome: "Quarto Casal",
            numero: "102", 
            camaSolteiro: 0,
            camaCasal: 1,
            preco: 200.00
        },
        {
            nome: "Suite Deluxe",
            numero: "201",
            camaSolteiro: 1,
            camaCasal: 1,
            preco: 300.00
        }
    ];

    quartosExemplo.forEach((quarto, i) => {
        const card = RoomCard(quarto, i);
        cardsGroup.appendChild(card);
    });

    // Adicionar container de cards ao root
    divRoot.appendChild(cardsGroup);

    // Limpar e renderizar footer
    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';
    const footer = Footer();
    rodape.appendChild(footer);
}