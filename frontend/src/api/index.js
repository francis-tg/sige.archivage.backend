const BASE_URL = process.env.NODE_ENV === 'production' ? 'https://backend.estlc-unv-ebolowa.com' : 'http://localhost:8000/api';

const token = sessionStorage.getItem("token")
export const LOGIN_API = {
    url: `${BASE_URL}/auth`,
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    }
}
export const LOGOUT_API = {
    url: `${BASE_URL}/auth/logout`,
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${token}`
    }
}
export const AUTH_ME_API = {
    url: `${BASE_URL}/auth/me`,
    method: "GET",
    headers: {
        "Authorization": `Bearer ${token}`
    }
}
export const GET_DOCUMENTS_API = {
    url: `${BASE_URL}/documents`,
    method: "GET",
    headers: {
        "Authorization": `Bearer ${token}`
    }
}
export const POST_DOCUMENTS_API = {
    url: `${BASE_URL}/documents`,
    method: "POST",
    headers: {
        "Authorization": `Bearer ${token}`,
        "Content-Type": "application/json"
    }
}