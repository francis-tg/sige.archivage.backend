import { IoApps, IoDocumentAttach } from "react-icons/io5"
import React from 'react'
import { Link } from 'react-router-dom'
import { Separator } from "../ui/ui/separator"
import { LuUsers2 } from "react-icons/lu"

function Sidebar() {
    return (
        <div className='w-full bg-[#2e2e2e] h-screen p-2'>
            <div className="py-3">
                <h1 className='text-white uppercase text-center text-xl font-bold'>
                    SIGE Archivage
                </h1>
            </div>
            <Separator />
            <ul className='mt-5 flex flex-col gap-5 overflow-x-hidden overflow-y-auto'>
                <p className=' text-white/50'>
                    Overview
                </p>
                <Link to={"/"} className=' flex items-center gap-1 text-white w-full rounded hover:cursor-pointer bg-primary p-2'>
                    <IoApps />
                    <span> Dashboard</span>
                </Link>
                <Separator />
                <div className="flex flex-col gap-5">
                    <p className=' text-white/50'>
                        Gestion de fichier
                    </p>
                    <Link to={"/"} className=' flex items-center gap-1 hover:bg-amber-500/10 text-white w-full rounded hover:cursor-pointer  p-2'>
                        <IoDocumentAttach />
                        <span> Documents</span>
                    </Link>
                </div>
                <Separator />
                <div className="flex flex-col gap-5">
                    <p className=' text-white/50'>
                        Gestion des utilisateurs
                    </p>
                    <Link to={"/"} className=' flex items-center gap-1 hover:bg-amber-500/10 text-white w-full rounded hover:cursor-pointer  p-2'>
                        <LuUsers2 />
                        <span> Utilisateurs</span>
                    </Link>
                </div>
            </ul>
        </div>
    )
}

export default Sidebar