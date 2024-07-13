import { CREATE_BUREAU_API, CREATE_CATEGORIE_API, GET_BUREAU_API, GET_CATEGORIE_API } from "..";

export async function getCategorie(){
    const {url,...meta} = GET_CATEGORIE_API;
    return await fetch(url, {...meta,credentials:'include'})
}

export async function createCategorie(data){
    const {url,...meta} = CREATE_CATEGORIE_API;
    return await fetch(url, {...meta,body:JSON.stringify(data),credentials:'include'})
}