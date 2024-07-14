
import { LuBell, LuCog, LuMenu } from 'react-icons/lu';
import React from 'react';
import { Link } from 'react-router-dom';

function Navbar({ toggleSidebar }) {
    const user = JSON.parse(sessionStorage.getItem("user"));

    return (
        <div className='flex justify-between items-center py-2 px-5'>
            <div className='flex gap-10 items-center'>
                <div>
                    <LuMenu size={20} className='md:hidden cursor-pointer' onClick={toggleSidebar} />
                </div>
                <h1 className='text-md font-semibold uppercase'>
                    Gestion de documents
                </h1>
            </div>

            <div className='flex justify-end px-3 items-center gap-5'>
                <LuBell size={20} />
                {/* <Link to="/setting"><LuCog size={20} /></Link> */}
                <div className="dropdown dropdown-end">
                    <div className="avatar placeholder" tabIndex={0}>
                        <div className="bg-neutral text-neutral-content w-8 rounded-full">
                            <span className="text-xs">
                                {user?.name?.split(' ')[0]?.[0] || ''}{user?.name?.split(' ')[1]?.[0] || ''}
                            </span>
                        </div>
                    </div>
                    <ul tabIndex={0} className="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li><Link to={'/profile'} >Profile</Link></li>
                        <li><Link to='/logout' className='text-red-500'>Déconnexion</Link></li>
                    </ul>
                </div>
            </div>
        </div>
    );
}

export default Navbar;
