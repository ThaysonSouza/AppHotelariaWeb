import NavBar from "../components/NavBar.js";
import Footer from "../components/Footer.js";
import CartHeader from "../components/CartHeader.js";
import CartRoomCard from "../components/CartRoomCard.js";
import CartFooter from "../components/CartFooter.js";

export default function renderCartPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';

    const navbar = NavBar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    
    // Cria container principal do carrinho
    const cartContainer = document.createElement('div');
    cartContainer.className = 'cart-container';
    cartContainer.style.marginTop = '10%';

    // Adiciona cabeçalho
    const cartHeader = CartHeader();
    cartContainer.appendChild(cartHeader);

    // Adiciona lista de quartos (exemplos estáticos, sem funções e sem localStorage)
    const roomsList = document.createElement('div');
    roomsList.className = 'rooms-list';
    const items = [
        { nome: 'Suíte Standard', camaCasal: 1, camaSolteiro: 0, preco: 350.00 },
        { nome: 'Quarto Família', camaCasal: 1, camaSolteiro: 2, preco: 520.00 },
        { nome: 'Suíte Master', camaCasal: 1, camaSolteiro: 1, preco: 680.00 }
    ];
    items.forEach((room, i) => roomsList.appendChild(CartRoomCard(room, i)));
    cartContainer.appendChild(roomsList);

    // Adicionar rodapé
    const cartFooter = CartFooter();
    cartContainer.appendChild(cartFooter);
    const totalEl = cartFooter.querySelector('#cartTotal');
    if (totalEl){ totalEl.textContent = 'R$ 1550,00'; }

    divRoot.appendChild(cartContainer);

    const foot = document.getElementById('rodape');
    foot.innerHTML = '';
        
    const footer = Footer();
    foot.appendChild(footer);
}
