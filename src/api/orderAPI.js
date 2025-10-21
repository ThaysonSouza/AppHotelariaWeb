export async function finishedOrder(item) {
    const url = "api/pedido/OrdemReserva";
    const body = {
        /*definindo que o pagamento sera feito via pix,
         mas sera alterado futuramente para que o usuario
         possa setar a forma desejada */
        pagamento: "pix",
        quartos: item.map(it => (
            {
                id: quartoId,
                inicio: it.checkIn,
                fim: it.checkOut
            }
        ))
    };
    const res = await fetch(url, {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        credentials: "same-origin",
        body: JSON.stringify(body)
    });
    if(!res.ok){
        const menssagem = `Erro ao enviar pedido: ${res.status}`;
        throw new Error(menssagem);
    }
    return res.json();

}