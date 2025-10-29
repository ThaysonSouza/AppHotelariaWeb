const chaveCarrinho = "Nocturne_cart";
const chaveReserva = "Nocturne_reserva";

export function definirCarrinho(carrinho) {
    localStorage.setItem(chaveCarrinho, JSON.stringify(carrinho));
}

export function obterCarrinho() {
    try {
        const bruto = localStorage.getItem(chaveCarrinho);
        return bruto ? JSON.parse(bruto) : { status: "rascunho", item: [] };
    } catch {
        return { status: "rascunho", item: [] };
    }
}

export function adicionarItemAoCarrinho(item) {
    const carrinho = obterCarrinho();
    carrinho.item.push(item);
    definirCarrinho(carrinho);
    return carrinho;
}

export function removerItemDoCarrinho(indice){
    const carrinho = obterCarrinho();
    carrinho.item.splice(indice, 1);
    definirCarrinho(carrinho);
    return carrinho;
}
export function limparCarrinho(){
    definirCarrinho({
        status : "rascunho",
        item: []
    });
}

export function obterTotais(){
    const { item } = obterCarrinho();
    const total = item.reduce((acc, it) => 
        acc + Number(it.subtotal || 0), 0    
    );
    return {
        total,
        qtd_item : item.length
    }
}

export function salvarRascunhoReserva(reserva){
    localStorage.setItem(chaveReserva, JSON.stringify(reserva || {}));
}
export function obterRascunhoReserva(){
    try{
        const bruto = localStorage.getItem(chaveReserva);
        return bruto ? JSON.parse(bruto) : {};
    }catch{
        return {};
    }
}
export function limparRascunhoReserva(){
    localStorage.removeItem(chaveReserva);
}