import React, { useState } from 'react';
import { LuPlus } from 'react-icons/lu';
import { Link } from 'react-router-dom';
import PersonnelModal from '../components/PersonnelModal';

function Personnel() {
    const [isModalOpen, setIsModalOpen] = useState(false);

    const handleOpenModal = () => {
        setIsModalOpen(true);
    };

    const handleCloseModal = () => {
        setIsModalOpen(false);
    };

    const handleSubmit = (data) => {
        console.log('Form data:', data);
        // Ici, vous pouvez envoyer les données au serveur
        handleCloseModal();
    };

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
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        {/* row 1 */}
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                        </tr>
                        {/* row 2 */}
                        <tr className="hover">
                            <th>2</th>
                            <td>Hart Hagerty</td>
                            <td>Desktop Support Technician</td>
                            <td>Purple</td>
                        </tr>
                        {/* row 3 */}
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <PersonnelModal
                isOpen={isModalOpen} 
                onClose={handleCloseModal} 
                onSubmit={handleSubmit} 
            />
        </div>
    )
}

export default Personnel;
