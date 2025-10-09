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

    
    // Criar container principal do carrinho
    const cartContainer = document.createElement('div');
    cartContainer.className = 'cart-container';
    cartContainer.style.marginTop = '10%';

    // Adicionar cabeçalho
    const cartHeader = CartHeader();
    cartContainer.appendChild(cartHeader);

    // Adicionar lista de quartos
    const roomsList = document.createElement('div');
    roomsList.className = 'rooms-list';
    
    // Dados de exemplo para o carrinho (substituir por dados reais do localStorage ou API)
    const roomsData = JSON.parse(localStorage.getItem('cartRooms')) || [];
    
    if (roomsData.length === 0) {
        const emptyMessage = document.createElement('div');
        emptyMessage.className = 'text-center p-4';
        emptyMessage.innerHTML = `
            <i class="bi bi-cart-x fs-1 text-muted"></i>
            <h5 class="mt-3">Seu carrinho está vazio</h5>
            <p class="text-muted">Adicione quartos para começar sua reserva</p>
        `;
        roomsList.appendChild(emptyMessage);
    } else {
        roomsData.forEach((room, index) => {
            const roomCard = CartRoomCard(room, index);
            roomsList.appendChild(roomCard);
        });
    }
    
    cartContainer.appendChild(roomsList);

    // Calcular total
    const totalPrice = roomsData.reduce((sum, room) => sum + (room.preco || 0), 0);

    // Adicionar rodapé
    const cartFooter = CartFooter(totalPrice);
    cartContainer.appendChild(cartFooter);

    divRoot.appendChild(cartContainer);

    const foot = document.getElementById('rodape');
    foot.innerHTML = '';
        
    const footer = Footer();
    foot.appendChild(footer);
}
