import React from 'react'
import { LuPlus } from 'react-icons/lu'

function Bureau() {
    return (
        <div>
            <div className="flex items-center justify-end">
                <button onClick={() => document.getElementById('add_bureau').showModal()} className='btn btn-sm bg-primary text-white hover:bg-primary'>
                    <LuPlus />
                    Nouveau bureau
                </button>
            </div>
            <div className="overflow-x-auto">
                <table className="table">
                    {/* head */}
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom du bureau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {/* row 1 */}
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>

                        </tr>
                        {/* row 2 */}
                        <tr className="hover">
                            <th>2</th>
                            <td>Hart Hagerty</td>
                            <td>Desktop Support Technician</td>

                        </tr>
                        {/* row 3 */}
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>

                        </tr>
                    </tbody>
                </table>
            </div>
            {/* You can open the modal using document.getElementById('ID').showModal() method */}
            <dialog id="add_bureau" className="modal">
                <div className="modal-box">
                    <form method="dialog">
                        {/* if there is a button in form, it will close the modal */}
                        <button className="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <div>
                        <h1 className='text-xl font-bold mb-5'>
                            Ajouter un bureau
                        </h1>
                        <form action="" method="post">
                            <div className="form-control mb-3">
                                <label htmlFor="name" className='mb-1'>Nom du bureau</label>
                                <input type="text" id='name' placeholder="Bureau Informatique" class="input input-bordered w-full" />
                            </div>
                        </form>
                    </div>
                    <div className='modal-action'>
                        <form method='dialog'>
                            <button className='btn bg-secondary hover:bg-secondary'>
                                Fermer
                            </button>
                        </form>
                        <button className='btn bg-primary text-white hover:bg-primary'>Enregistrer</button>
                    </div>
                </div>
            </dialog>
        </div>
    )
}

export default Bureau