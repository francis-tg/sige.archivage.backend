import { GET_DOCUMENTS_API, POST_DOCUMENTS_API } from "..";

/**
 * Envoie des données de compte avec une image.
 * 
 * @param {Object} data - Les données à envoyer.
 * @param {File} image - Le fichier d'image à envoyer.
 * @returns {Promise<Response>} La réponse de la requête fetch.
 */
export async function createDocument(data, file) {
    const { url, ...meta } = POST_DOCUMENTS_API;

    // Utilisation de FormData pour envoyer des données et un fichier
    const formData = new FormData();
    
    // Ajouter les données au FormData
    for (const key in data) {
        if (data.hasOwnProperty(key)) {
            formData.append(key, data[key]);
        }
    }

    // Ajouter le fichier d'image au FormData
    if (file) {
        formData.append('file', file);
    }

    // Mise à jour de la méthode et des headers pour l'utilisation de FormData
    const fetchOptions = {
        ...meta,
        body: formData,
    };

    return await fetch(url, fetchOptions);
}

export async function getDocument(){
    const {url,...meta} = GET_DOCUMENTS_API;
    return await fetch(url, {...meta,credentials:'include'})
}

export async function countDocument(){
    const {url,...meta} = GET_DOCUMENTS_API;
    return await fetch(url+'/count', {...meta,credentials:'include'})
}