import { Avatar } from '@radix-ui/react-avatar'
import { LuBell, LuCog, LuMenu } from 'react-icons/lu'
import React from 'react'
import { Link } from 'react-router-dom'


function Navbar({toggleSidebar}) {
    return (
        <div className='flex justify-between items-center py-2 px-5'>
            <div className='flex gap-10 items-center'>
                <div>
                    <LuMenu size={20} className='md:hidden cursor-pointer' onClick={toggleSidebar}/>
                </div>
                <h1 className='text-md font-semibold uppercase'>
                    Gestion de documents
                </h1>
                
            </div>

            <div className='flex justify-end px-3 items-center gap-5'>
                <LuBell size={20}/>
                <Link to={"/setting"}><LuCog size={20}/></Link>
                <Avatar className=' flex-none bg-primary-foreground p-2 rounded-full border border-primary '>
                    CN
                </Avatar>
            </div>
        </div>
    )
}

export default Navbar