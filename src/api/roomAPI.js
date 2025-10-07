//Listar os quartos disponiveis de acordo com inicio, fim e quantidade
export async function quartosDisponivelRequest({ dataInicio, dataFim, qtd }) {

    const params = new URLSearchParams();
    if (dataInicio) params.set("dataInicio", dataInicio);
    if (dataFim) params.set("dataFim", dataFim);
    if (qtd !== null && qtd !== "") params.set("qtd", String(qtd));

    const url = `api/room/disponivel?${params.toString()}`;

    const response = await fetch(url, {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },
        credentials: "same-origin"
    });
    let data = null;
    try {
        data = await response.json();
    } catch {
        data = null;
    }
    if (!response.ok) {
        const msg = data?.menssage || "Falha ao  buscar quartos disponiveis!";
        throw new Error(msg);
    }
    const quartos = Array.isArray(data?.Quartos) ? data.Quartos : [];
    console.log(quartos);
    return quartos;

}