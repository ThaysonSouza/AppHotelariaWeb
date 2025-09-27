import { getToken } from "./authAPI";

export async function listAllRoomsRequest() {
    const token = getToken();

    const response = await fetch("api/room", {
        method: "GET",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
            ...(token ? { "Authorization": `Bearer ${token}` } : {})
        },
        credentials: "same-origin"
    });

    return response;
}