import React from 'react'
import Categorie from './_Partials/Categorie'
import Role from './_Partials/Role'
import Bureau from './_Partials/Bureau'

function Settings() {
    return (
        <div className='flex flex-grow'>
            <div className="mt-5 w-full">
                <div role="tablist" className="tabs tabs-lifted w-full">
                    <input type="radio" defaultChecked name="my_tabs_2" role="tab" className="tab" aria-label="Catégories" />
                    <div role="tabpanel" className="tab-content bg-base-100 border-base-300 rounded-box p-6">
                        <Categorie />
                    </div>

                    <input
                        type="radio"
                        name="my_tabs_2"
                        role="tab"
                        className="tab"
                        aria-label="Roles"
                    />
                    <div role="tabpanel" className="tab-content bg-base-100 border-base-300 rounded-box p-6">
                        <Role />
                    </div>

                    <input type="radio" name="my_tabs_2" role="tab" className="tab" aria-label="Bureaux" />
                    <div role="tabpanel" className="tab-content bg-base-100 border-base-300 rounded-box p-6">
                        <Bureau />
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Settings