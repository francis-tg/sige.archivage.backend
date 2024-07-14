import React, { useEffect, useState } from 'react';
import { LuFileEdit, LuLoader, LuPlus, LuTrash2 } from 'react-icons/lu';
import { Link } from 'react-router-dom';
import PersonnelModal from '../components/PersonnelModal';
import { getPersonnels } from '../api/routes/personnel';

function Personnel() {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [Personnels, setPersonnels] = useState([])
    const [tableLoading,setTableLoading] = useState(false)
    const handleOpenModal = () => {
        setIsModalOpen(true);
    };

    const handleCloseModal = () => {
        setIsModalOpen(false);
    };
    function fecthPersonnels() {
        try {
            setTableLoading(true)
            getPersonnels().then(async (res) => {
                if (res.status === 200) {
                    const data = await res.json()
                    setPersonnels(data)
                    setTableLoading(false)
                }
                tableLoading(false)
            }).catch((err) => console.log(err))
        } catch (error) {
            tableLoading(false)
        }
    }

    const handleSubmit = (data) => {
        console.log('Form data:', data);
        // Ici, vous pouvez envoyer les données au serveur
        handleCloseModal();
        fecthPersonnels()
    };

    useEffect(() => {
        fecthPersonnels()
        return () => {
            fecthPersonnels()
        }
    }, [])


    return (
        <div className='flex flex-col flex-grow py-2'>
            <div className="breadcrumbs text-sm">
                <ul>
                    <li><Link to={"/"}>Sige Archive</Link></li>
                    <li>Personnel</li>
                </ul>
            </div>
            <div className="flex items-end justify-end mb-3">
                <button onClick={handleOpenModal} className='btn bg-primary hover:bg-primary text-white'>
                    <LuPlus />
                    Ajouter un personnel
                </button>
            </div>
            <div className="overflow-x-auto">
                <table className="table">
                    {/* head */}
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Bureau</th>
                        </tr>
                    </thead>
                    <tbody className={Personnels.length===0?'relative h-[62vh] overflow-auto':''}>
                        {/* row 1 */}
                        {tableLoading? <div className='absolute left-1/2 text-gray-400 text-3xl -bottom-2 h-full flex items-center justify-center'>
                            <LuLoader className=' animate-spin duration-1000' />
                        </div>:Personnels.length>0?(
                            
                                Personnels.map((personnel) => (
                                    <tr>
                                        <th>
                                            <div className='flex items-center gap-1 w-1/3'>
                                                <button className='btn btn-sm btn-warning btn-square'>
                                                    <LuFileEdit/>
                                                </button>
                                                <button className='btn btn-sm btn-error btn-square'>
                                                    <LuTrash2/>
                                                </button>
                                            </div>
                                        </th>
                                        <td>{personnel.nom}</td>
                                        <td>{personnel.prenom}</td>
                                        <td>{personnel?.bureau?.name}</td>
                                    </tr>
                                ))
                            
                        ):<h1>
                            Pas de personnel
                        </h1>}
                    </tbody>
                </table>
            </div>

            <PersonnelModal
                isOpen={isModalOpen}
                onClose={handleCloseModal}
                onSaveSuccess={handleSubmit}
            />
        </div>
    )
}

export default Personnel;
