import NavBar from "../components/NavBar.js";
import Footer from "../components/Footer.js";
import CartHeader from "../components/CartHeader.js";
import CartRoomCard from "../components/CartRoomCard.js";
import CartFooter from "../components/CartFooter.js";
import { obterCarrinho, obterTotais } from "../store/cartStore.js";

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

    // Adiciona lista de quartos do carrinho persistido
    const roomsList = document.createElement('div');
    roomsList.className = 'rooms-list';
    const carrinho = obterCarrinho();
    const itens = Array.isArray(carrinho.item) ? carrinho.item : [];
    itens.forEach((room, i) => roomsList.appendChild(CartRoomCard(room, i)));
    cartContainer.appendChild(roomsList);

    // Adicionar rodapé
    const cartFooter = CartFooter();
    cartContainer.appendChild(cartFooter);
    const totalEl = cartFooter.querySelector('#cartTotal');
    if (totalEl){
        const { total } = obterTotais();
        totalEl.textContent = `R$ ${total.toFixed(2)}`;
    }

    divRoot.appendChild(cartContainer);

    const foot = document.getElementById('rodape');
    foot.innerHTML = '';
        
    const footer = Footer();
    foot.appendChild(footer);
}
