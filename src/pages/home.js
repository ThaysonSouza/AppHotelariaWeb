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

    const btnSearchRoom= dateSelector.querySelector('button');
    btnSearchRoom.addEventListener('click', async (e) =>{
        e.preventDefault();

        //teste
        const dataInicio = "2025-11-22";
        const dataFim = "2025-11-24";
        const qtd = 2;

        try{
            const quartos = quartosDisponivelRequest({dataInicio, dataFim, qtd});
        } catch(error){
            console.log(error);
        }
    } 

);

    const cardsGroup = document.createElement('div');
    cardsGroup.className = 'room-cards-container';
    
    for (var i = 0; i < 3; i++) {
        const cards = RoomCard(i);
        cardsGroup.appendChild(cards);
    }
    
    divRoot.appendChild(cardsGroup);

    const rodape = document.getElementById('rodape');
    rodape.innerHTML = '';

    const footer = Footer();
    rodape.appendChild(footer);

}