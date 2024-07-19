import { CREATE_PERSONNEL_API, GET_PERSONNEL_API, UPDATE_PERSONNEL_API } from "..";

export async function getPersonnels(){
    const {url,...meta} = GET_PERSONNEL_API;
    return await fetch(url, {...meta,credentials:'include'})
}

export async function updatePersonnels(data){
    const {url,...meta} = UPDATE_PERSONNEL_API
    return await fetch(url, {...meta,body:JSON.stringify(data),credentials:'include'})
}
export async function createPersonnel(data){
    const {url,...meta} = CREATE_PERSONNEL_API;
    return await fetch(url, {...meta,body:JSON.stringify(data),credentials:'include'})
}